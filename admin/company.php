<?php

session_start();

if(empty($_SESSION['id_admin'])) {
	header("Location: index.php");
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

    <title>Companies List</title>

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
          <a class="navbar-brand" style="font-size: 24px; color: #053a5a; line-height: 42px;" href="index.php">TMSL Recruitment System</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
          <ul class="nav navbar-nav navbar-right">
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
    <p style="font-size: 34px; color: white; text-align: center; line-height: 73px;">Admin Panel</p>
  </div>
  <br>

    <div class="container">
      <div class="row">
        <div class="col-md-12" align="center">
          <div class="list-group" align="center" style="width: 50%; border: 1px solid #053a5a; border-radius: 5px;">
            <a href="dashboard.php" class="list-group-item" style="font-size: 20px;">Dashboard</a>
            <a href="user.php" class="list-group-item" style="font-size: 20px;">Users</a>
            <a href="company.php" class="list-group-item active" style="font-size: 20px;">Company</a>
            <a href="job-posts.php" class="list-group-item" style="font-size: 20px;">Job Posts</a>
          </div>
        </div>
        <br>
          <div class="col-md-12" align="center" style="font-size: 22px;" id="print">
        <?php
          $sql = "SELECT * FROM company";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            echo '<h3>Total Number of Companies: ' . $result->num_rows . '</h3>'; 
          }
        ?>
        <br>
          <table class="table">
            <thead>
              <th style="font-size: 22px; color: #053a5a; width: 4%">Sr.No</th>
              <th style="font-size: 22px; color: #053a5a; width: 20%">Company Name</th>
              <th style="font-size: 22px; color: #053a5a; width: 15%">Head Office</th>
              <th style="font-size: 22px; color: #053a5a; width: 20%">Contact Number</th>
              <th style="font-size: 22px; color: #053a5a; width: 16%">Company Type</th>
              <th style="font-size: 22px; color: #053a5a; width: 15%">Action</th>
            </thead>
            <tbody>
              <?php
                $sql = "SELECT * FROM company";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                  $i = 0;
                  while($row = $result->fetch_assoc()) {
                    ?>
                      <tr>
                        <td style="font-size: 20px;"><?php echo ++$i; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['companyname']; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['headofficecity']; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['contactno']; ?></td>
                        <td style="font-size: 20px;"><?php echo $row['companytype']; ?></td>
                        <td style="font-size: 20px;"><a href="delete-company.php?id=<?php echo $row['id_company']; ?>">Delete</a></td>
                      </tr>
                    <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><br>
  <div align="center">
  <button onclick="printDiv('print')" style="background-color: #053a5a; width: 120px; height: 50px; padding-left: 10px; padding-right: 10px; font-size: 22px; color:white; border-color: transparent; border-radius: 5px;">Print</button>
</div>

    <br><br>

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

    <script type="text/javascript">
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
  </font>
  </body>
</html>