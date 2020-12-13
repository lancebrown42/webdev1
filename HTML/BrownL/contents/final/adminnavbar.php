<?php echo '<nav class="navbar has-background-grey-light">
        	<div class="container navbar-menu">
        		
        	<div class="navbar-brand navbar-start">
		        Lance Brown <br>
		        IT-117-400 <br>
        	</div>
            <a href="showgolfers.php" class="navbar-item is-hoverable">Golfer Management</button></a>
            <a href="CorporateSponsorMain.php" class="navbar-item is-hoverable">Corporate Sponsorship Management</a>
            ';
            // if($_GET['A'] && $_GET['A'] == 1){
            //     echo '<a href="?A=0" class="navbar-item is-hoverable is-danger">Logout</a>';
            // }else{
                echo '<a href="Final.php" class="navbar-item is-hoverable is-success">Logout</a>';
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