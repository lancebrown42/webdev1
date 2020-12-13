<?php echo '<nav class="navbar has-background-grey-light">
        	<div class="container navbar-menu">
        		
        	<div class="navbar-brand navbar-start">
		        Lance Brown <br>
		        IT-117-400 <br>
        	</div>
            <a href="Final.php" class = "navbar-item is-hoverable">Home</a>
            <a href="addgolfer.php" class="navbar-item is-hoverable">Add Golfer</button></a>
            <a href="showgolfers.php" class="navbar-item is-hoverable">Show Golfers</button></a>
            <a href="donate.php" class="navbar-item is-hoverable">Donate Now</button></a>
            <a href="golferstats.php" class="navbar-item is-hoverable">Golfer Statistics</button></a>
            <a href="teamstats.php" class="navbar-item is-hoverable">Team Statistics</button></a>';
            // if($_GET['A'] && $_GET['A'] == 1){
            //     echo '<a href="?A=0" class="navbar-item is-hoverable is-danger">Logout</a>';
            // }else{
                echo '<a href="login.php" class="navbar-item is-hoverable is-success">Login</a>';
            // }

            echo'
            <div class="navbar-end"/>
            <a role="button" class="navbar-burger navbar-end" aria-label="menu" aria-expanded="false">
  				<span aria-hidden="true"></span>
  				<span aria-hidden="true"></span>
 				<span aria-hidden="true"></span>

			</a>
        	</div>
        </nav>' ?>