<?php
session_start();
include '../config/database.php';

if (!isset($_SESSION['user_name']) || !isset($_SESSION['kodeujian'])) {
    header('Location: ../index.php');
    exit();
}

$_SESSION['exam_active'] = true;
$kodeujian = $_SESSION['kodeujian'];

$result = $conn->query("SELECT timer, kejuruan, ujian_id FROM ujian WHERE kodeujian = '$kodeujian'");
if ($result->num_rows == 0) {
    die("Kode ujian tidak valid!");
}

$ujian = $result->fetch_assoc();
$timer = $ujian['timer']; 
$kejuruan = $ujian['kejuruan']; 
$ujian_id = $ujian['ujian_id'];

$_SESSION['kejuruan'] = $kejuruan;

$conn->query("INSERT INTO sessions (user_name, exam_active, kejuruan) 
              VALUES ('{$_SESSION['user_name']}', 1, '{$kejuruan}')
              ON DUPLICATE KEY UPDATE exam_active = 1, last_updated = NOW()");


$questions = $conn->query("SELECT * FROM soal WHERE ujian_id = $ujian_id");
$questionArray = [];
while ($row = $questions->fetch_assoc()) {
    $questionArray[] = $row;
}

?>
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/styleujian.css">
<script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.all.min.js
"></script>
<link href="
https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.css
" rel="stylesheet">
<style>
    .sidepanel{
        background-color:#ffffffcb;
    }
    .custom-radio {
        transform: scale(1.5);
    }
</style>
<title>Ujian</title>

    <div class="backoverlay" onclick="CloseNav()" id="myOverlay"></div>
    <div class="header">
    <button onclick="OpenNav()" style="color:white; float: left; margin-top: 10px; margin-left: 10px;">&nbsp;☰&nbsp;</button>
    <div id="mysidepanel" class="sidepanel">
            <div style="margin-top: 10px;">
                <a href="javascript:void(0)" onclick="CloseNav()" style="text-decoration: none;">Soal Ujian</a>
                </div>  
                    <div>
                    <div id="question-numbers" style="margin-top: 20px;">
                        <?php foreach ($questionArray as $index => $question): ?>
                            <button type="button" onclick="goToQuestion(<?php echo $index; ?>)">
                                <?php echo $index + 1; ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <img src="../img/disnakertrans302.png" alt="" />
        <p><?php echo $_SESSION['user_name']; ?></p>
    </div>
    <div class="container">
    <div class="tablegrid">
        <div class="question-number">Soal No. <span id="question-number">1</span></div>
        <div class="kejuruan"><?php echo $kejuruan; ?></div>
        <div class="timer" id="timer"></div>
    </div>
    <div class="container2">
        <form method="POST" action="submit_answers.php" id="exam-form">
            <input type="hidden" name="current_question" id="current_question" value="0">
            <?php foreach ($questionArray as $index => $question): ?>
                <div class="question" id="question-<?php echo $index; ?>" style="display: none;">
                    <p><?php echo $question['soal_text']; ?></p>
                    <?php
                    $choices = $conn->query("SELECT * FROM pilihan WHERE soal_id = " . $question['soal_id']);
                    while ($choice = $choices->fetch_assoc()) {
                        echo "<input type='radio' class='custom-radio' name='answers[" . $question['soal_id'] . "]' value='" . $choice['pilihan_id'] . "' onchange='saveAnswer(" . $question['soal_id'] . ", " . $choice['pilihan_id'] . ")'>" . $choice['pilihan_text'] . "<br><br>";   
                    }
                    ?>
                </div>
            <?php endforeach; ?>
    </div>
        <div id="navigation" style="margin-top:20px;">
            <button type="button" id="prev" onclick="prevQuestion()" style="display: none;">Soal Sebelumnya</button>
            <button type="button" id="next" onclick="nextQuestion()" style="float:right;">Soal Berikutnya</button>
            <button type="submit" id="finish" style="display: none; float:right;">Selesai Ujian</button>
        </div>
        </form>
    </div>

<script>
    document.getElementById('finish').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah pengiriman form secara langsung

    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Pastikan semua jawaban sudah benar sebelum menyelesaikan ujian.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Selesaikan',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('exam-form').submit(); // Kirim form jika pengguna mengonfirmasi
        }
    });
});

    function OpenNav() {
        document.getElementById("mysidepanel").style.width = "250px"; // Buka panel
        document.getElementById("myOverlay").style.display = "block"; // Tampilkan overlay
    }

    function CloseNav() {
        document.getElementById("mysidepanel").style.width = "0"; // Tutup panel
        document.getElementById("myOverlay").style.display = "none"; // Sembunyikan overlay
    }


    var questions = <?php echo json_encode($questionArray); ?>;
    var currentQuestion = 0;
    var timerElement = document.getElementById('timer');

    // Fungsi update tampilan waktu
    function formatTime(seconds) {
        var minutes = Math.floor(seconds / 60);
        var remainingSeconds = seconds % 60;
        if (remainingSeconds < 10) {
            remainingSeconds = "0" + remainingSeconds;
        }
        return minutes + ":" + remainingSeconds; // Format waktu ke "mm:ss"
    }

    // Ambil waktu sisa dari localStorage
    var timeLeft = localStorage.getItem('timeLeft') ? parseInt(localStorage.getItem('timeLeft')) : <?php echo $timer; ?>;

    // Fungsi untuk update timer di simpan di localStorage
    var interval = setInterval(function() {
        if (timeLeft <= 0) {
            clearInterval(interval);
            document.getElementById('exam-form').submit(); // auto submit kalau waktu 0
        } else {
            timerElement.innerHTML = formatTime(timeLeft); // ubah tampilan timer
            timeLeft--;
            localStorage.setItem('timeLeft', timeLeft); // Simpan waktu sisa di localStorage
        }
    }, 1000);

    // Tampilkan soal 
    document.getElementById('question-' + currentQuestion).style.display = 'block';

    // Fungsi untuk menyimpan jawaban ke localStorage
    function saveAnswer(questionId, choiceId) {
        var answers = JSON.parse(localStorage.getItem('answers')) || {};
        answers[questionId] = choiceId;
        localStorage.setItem('answers', JSON.stringify(answers));
        var button = document.querySelector('#question-numbers button:nth-child(' + (currentQuestion + 1) + ')');
        if (button) {
            button.classList.add('filled');
        }
    }

    // Fungsi untuk memuat kembali jawaban dari localStorage
    function loadAnswers() {
        var answers = JSON.parse(localStorage.getItem('answers')) || {};
        for (var questionId in answers) {
        var choiceId = answers[questionId];
        var radioBtn = document.querySelector('input[name="answers[' + questionId + ']"][value="' + choiceId + '"]');
        if (radioBtn) {
            radioBtn.checked = true;

            // Perbarui warna tombol soal
            var index = questions.findIndex(q => q.id == questionId);
            if (index !== -1) {
                var button = document.querySelector('#question-numbers button:nth-child(' + (index + 1) + ')');
                if (button) {
                    button.classList.add('filled');
                }
            }
        }
    }
    }

    // Fungsi navigasi ke soal berikut
    function nextQuestion() {
        if (currentQuestion < questions.length - 1) {
            document.getElementById('question-' + currentQuestion).style.display = 'none';
            currentQuestion++;
            document.getElementById('question-' + currentQuestion).style.display = 'block';
            updateNavigation();
            updateQuestionNumber(); 
        }
    }

    // Fungsi navigasi ke soal sebelumnya
    function prevQuestion() {
        if (currentQuestion > 0) {
            document.getElementById('question-' + currentQuestion).style.display = 'none';
            currentQuestion--;
            document.getElementById('question-' + currentQuestion).style.display = 'block';
            updateNavigation();
            updateQuestionNumber(); 
        }
    }

    // Fungsi lompat ke soal berdasarkan angka
    function goToQuestion(questionIndex) {
        document.getElementById('question-' + currentQuestion).style.display = 'none';
        currentQuestion = questionIndex;
        document.getElementById('question-' + currentQuestion).style.display = 'block';
        updateNavigation();
        updateQuestionNumber();
        CloseNav(); 
    }

    // Fungsi update nomor tombol navigasi
    function updateNavigation() {
        document.getElementById('prev').style.display = (currentQuestion === 0) ? 'none' : 'inline';
        document.getElementById('next').style.display = (currentQuestion < questions.length - 1) ? 'inline' : 'none';
        document.getElementById('finish').style.display = (currentQuestion === questions.length - 1) ? 'inline' : 'none';

        var buttons = document.querySelectorAll('#question-numbers button');
        buttons.forEach((btn, index) => {
            btn.classList.remove('active'); 
            if (index === currentQuestion) {
                btn.classList.add('active'); // Tambahkan kelas 'active' ke tombol soal aktif
            }
        });
    }

    function updateQuestionNumber() {
    var questionNumberElement = document.querySelector('th p[style*="float:left;"]');
        if (questionNumberElement) {
            questionNumberElement.textContent = "Soal No. " + (currentQuestion + 1);
        }
    }

    if (timeLeft <= 0) {
        clearInterval(interval);
        document.getElementById('exam-form').submit(); 
        fetch('update_exam_active.php', {
            method: 'POST',
            body: JSON.stringify({
                user_name: "<?php echo $_SESSION['user_name']; ?>"
            }),
            headers: { 'Content-Type': 'application/json' }
        });
    }

    function updateQuestionNumber() {
        document.getElementById('question-number').textContent = currentQuestion + 1;
    }

    document.addEventListener('keydown', function (event) {
    if (event.key === 'ArrowRight') { // Tombol panah kanan
        nextQuestion();
    } else if (event.key === 'ArrowLeft') { // Tombol panah kiri
        prevQuestion();
    }
});
   
    // Fix this later on
    // halaman dimuat, muat jawaban dan soal terakhir
    window.addEventListener('load', function() {
        var savedQuestion = localStorage.getItem('currentQuestion');
        if (savedQuestion) {
            goToQuestion(parseInt(savedQuestion));
        }
        loadAnswers();
        updateQuestionNumber(); 
    });

    // Simpan soal terakhir
    window.addEventListener('beforeunload', function() {
        localStorage.setItem('currentQuestion', currentQuestion);
    });
    //up to this point
</script>
