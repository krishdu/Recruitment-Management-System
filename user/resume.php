<?php

session_start();

if(empty($_SESSION['id_user'])) {
  header("Location: ../index.php");
  exit();
}

require_once("../db.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Resume</title>

    <link rel="icon" href="../img/favicon.png" type="image/x-icon"/>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>
    
      <font face="calibri">
  <section>
    <div class="container">
      <div class="row">
        <header>
          <nav class="navbar navbar-default" style="margin-bottom: 0; height: 80px; background-color: white; border-color: transparent;">
            <div class="container-fluid">

              <div class="navbar-header">
                <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="../index.php">TMSL Recruitment System</a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                <ul class="nav navbar-nav navbar-right">
                <li style="padding-right: 25px;"><a href="dashboard.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Dashboard</a></li>
                  <li style="padding-right: 25px;"><a href="profile.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Profile</a></li>
                  <li style="padding-right: 25px;"><a href="../logout.php" style="font-size: 24px; color: #053a5a; line-height: 42px;">Logout</a></li>
                </ul>
              </div>

            </div>

          </nav>
        </header>
      </div>
    </div>
  </section>

      <div style="background-color: #053a5a; height: 80px;">
    <p style="font-size: 34px; color: white; text-align: center; line-height: 75px;">Upload / Download Resume</p>
  </div>

    <div class="container" align="center">      
      <div class="row">
        <br><br><br>
        <div>
          <a href="resume-upload.php" class="btn btn-success" style="background-color: yellow; border:2px solid black; border-radius: 5px; padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 13px; color: black; font-size: 20px; text-decoration: none;">Upload Resume</a>
        </div>
        <br><br>
        <?php
        $sql = "SELECT resume FROM users WHERE id_user='$_SESSION[id_user]' AND resume IS NOT NULL";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          ?>
        <div>
          <a href="../uploads/resume/<?php echo $row['resume']; ?>" style="background-color: aqua; border:2px solid black; border-radius: 5px; padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 13px; color: black; font-size: 20px; text-decoration: none;" download="Resume">Download Resume</a>
        </div>
        <?php } ?>
      </div>
    </div>

    <br><br><br>

<footer id="footer" style="background-color: #053a5a; height: 80px;">

    <p style="color:white; font-size: 20px; line-height: 80px; text-align: center;"> 
    Copyright &copy; 2020-2021 <a href="index.php" style="color:white;">TMSL Recruitment System </a>
    </p>

    <div align="center" style="background-color: #053a5a; margin-top: -1.4%; height: 55px;">
    <a href="https://www.facebook.com/tigkolkata" target="_blank"><img src="../img/facebook.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
    <a href="https://twitter.com/tiukolkata" target="_blank"><img src="../img/twitter.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>
    <a href="https://www.youtube.com/user/technoindiagroup" target="_blank"><img src="../img/youtube.png" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 5px;" /></a>

    </div>

  </footer>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </font>
  </body>
</html>