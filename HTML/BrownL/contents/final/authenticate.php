<?php
        require "server.php";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
            //Connect to MySQL


        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $result=$conn->query("SELECT * FROM TEventCoordinators WHERE strEmail='" . $_POST['txtEmail'] . "' AND strPassword = '" . $_POST['txtPassword'] . "'");

        if($result){

        if(mysqli_num_rows($result) > 0){
            header('Location: admin.php');
        }
    }else{
            ?>
            <!DOCTYPE html>
<html>
    <head>
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="../../../../css/bulma/css/bulma.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>
    <body>
        
        <div class ="section">
          <div class="container">
            <div class="columns is-centered">
              <div class="column is-one-third">
                <p class="title">Event Coordinator Login</p>
              </div>
            </div>
            <div class="columns is-centered">
              <div class="column is-one-third">
                <form action="authenticate.php" method="POST">
                  <div class="field">
                      
                    <p class="control has-icons-left has-icons-right">
                      <input class="input" name="txtEmail" type="email" placeholder="Email" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                      </span>
                      
                    </p>
                  </div>
                  <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" name="txtPassword" type="password" placeholder="Password" required>
                      <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                      </span>
                    </p>
                  </div>
                  <p class="has-text-danger">Incorrect credentials</p>
                  <div class="field">
                    <p class="control">
                      <input type="submit" name="submit" class="button is-success" value="Login">
                      
                    </p>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>  

</body>
</html>
<?php
        }
        

        ?>