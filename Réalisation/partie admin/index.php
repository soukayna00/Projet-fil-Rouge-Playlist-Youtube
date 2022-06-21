<?php
  
  // Include database file
  include 'users.php';

  $customerObj = new users();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $customerObj->deleteRecord($deleteId);
  }
     
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<img src="img/logo.png" alt="">
<br><br>

  <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
      } 
 
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
    }
  ?>
  <br>
  <h2>View Records
    <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>username</th>
        <th>password</th>
        <th>created_at</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $customers = $customerObj->displayData(); 
          foreach ($customers as $customer) {
        ?>
        <tr>
          <td><?php echo $customer['id'] ?></td>
          <td><?php echo $customer['username'] ?></td>
          <td><?php echo $customer['password'] ?></td>
          <td><?php echo $customer['created_at'] ?></td>
          <td>
         
              
            <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $customer['id'] ?>" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash text-white" aria-hidden="true"></i>
            </a></button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>