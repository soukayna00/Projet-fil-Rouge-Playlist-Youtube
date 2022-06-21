<?php

  // Include database file
  include 'users.php';

  $customerObj = new users();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $customerObj->insertData($_POST);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

<div class="card text-center" style="padding:15px;">

</div><br> 

<div class="container">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h4>Insert Data</h4>
                </div>
                <div class="card-body bg-light">
                  <form action="add.php" method="POST">
                    <div class="form-group">
                      <label for="name">username:</label>
                      <input type="text" class="form-control" name="username" placeholder="Enter username" required="">
                    </div>
                    <div class="form-group">
                      <label for="password">password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter password" required="">
                    </div>
                    <div class="form-group">
                      <label for="created_at">Created_at:</label>
                      <input type="date" class="form-control" name="created_at" placeholder="Enter the date" required="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>