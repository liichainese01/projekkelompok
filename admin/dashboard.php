<div class="card-container" style="margin-top: 100px; margin-left:20px;">
    <div class="card" style="cursor: pointer;" onclick="location.href='?page=session'">
        <div class="icon"><ion-icon name="person-outline"></ion-icon></div>
        <div class="details">
            <h3>0</h3>
            <p>Sedang Ujian</p>
        </div>
    </div>
    <div class="card">
        <div class="icon"><ion-icon name="checkmark-done-outline"></ion-icon></div>
        <div class="details">
            <h3><?php echo $completedExams; ?></h3>
            <p>Selesai Ujian</p>
        </div>
    </div>
    <div class="card">
        <div class="icon"><ion-icon name="briefcase-outline"></ion-icon></div>
        <div class="details">
            <h3><?php echo $totalKejuruan; ?></h3>
            <p>Total Kejuruan</p>
        </div>
    </div>
</div>    
<div class="chart-flex">
    <div class="chart-container">
        <span class="icon"><ion-icon name="bar-chart-outline"></ion-icon></span>
        <span class="title">Dashboard</span> <hr>
        <span class="icon"><ion-icon name="time-outline"></ion-icon></span>
        <span class="title">Sabtu - 12 - 2024</span> 
        <p style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>  
        <br><hr>
        <span class="icon"><ion-icon name="time-outline"></ion-icon></span> 
        <span class="title">Sabtu - 12 - 2024</span> 
        <p style="margin-top: 10px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>  
        
    </div>
    <div class="chart-container">
        <canvas id="donutChart"></canvas>
    </div>
</div>
