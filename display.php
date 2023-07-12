<?php

$dsn = 'mysql:host=localhost;dbname=parking';
$username = 'root';
$password = '';

try{
    
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $ex) {

    echo 'Not Connected '.$ex->getMessage();
}

$tableContent = '';
$start = '';
$selectStmt = $con->prepare('SELECT * FROM vehicle');
$selectStmt->execute();
$users = $selectStmt->fetchAll();

foreach ($users as $user)
{
    $tableContent = $tableContent.'<tr>'.
            '<td>'.$user['Vno'].'</td>'
            .'<td>'.$user['Vmodel'].'</td>'
            .'<td>'.$user['Vtype'].'</td>'
            .'<td>'.$user['Customer'].'</td>'
            .'<td>'.$user['Phno'].'</td>'
            .'<td>'.$user['Intime'].'</td>'
            .'<td>'.$user['Outime'].'</td>'
            .'<td>'.$user['Time'].'</td>'
            .'<td>'.$user['Charges'].'</td>';
}

if(isset($_POST['search']))
{
$start = $_POST['start'];

if($start=="Outime"){
$tableContent = '';
$selectStmt = $con->prepare("SELECT * FROM vehicle WHERE `Charges` IS NOT NULL");
$selectStmt->execute();
$users = $selectStmt->fetchAll();

foreach ($users as $user)
{
    $tableContent = $tableContent.'<tr>'.
            '<td>'.$user['Vno'].'</td>'
            .'<td>'.$user['Vmodel'].'</td>'
            .'<td>'.$user['Vtype'].'</td>'
            .'<td>'.$user['Customer'].'</td>'
            .'<td>'.$user['Phno'].'</td>'
            .'<td>'.$user['Intime'].'</td>'
            .'<td>'.$user['Outime'].'</td>'
            .'<td>'.$user['Time'].'</td>'
            .'<td>'.$user['Charges'].'</td>';
}
    
}
elseif($start=="Intime"){

$tableContent = '';
$selectStmt = $con->prepare("SELECT * FROM vehicle WHERE `Outime` IS NULL");
$selectStmt->execute();
$users = $selectStmt->fetchAll();

foreach ($users as $user)
{
    $tableContent = $tableContent.'<tr>'.
            '<td>'.$user['Vno'].'</td>'
            .'<td>'.$user['Vmodel'].'</td>'
            .'<td>'.$user['Vtype'].'</td>'
            .'<td>'.$user['Customer'].'</td>'
            .'<td>'.$user['Phno'].'</td>'
            .'<td>'.$user['Intime'].'</td>'
            .'<td>'.$user['Outime'].'</td>'
            .'<td>'.$user['Time'].'</td>'
            .'<td>'.$user['Charges'].'</td>';
}
    
}
else{
    $tableContent = '';
$start = '';
$selectStmt = $con->prepare('SELECT * FROM vehicle');
$selectStmt->execute();
$users = $selectStmt->fetchAll();

foreach ($users as $user)
{
    $tableContent = $tableContent.'<tr>'.
            '<td>'.$user['Vno'].'</td>'
            .'<td>'.$user['Vmodel'].'</td>'
            .'<td>'.$user['Vtype'].'</td>'
            .'<td>'.$user['Customer'].'</td>'
            .'<td>'.$user['Phno'].'</td>'
            .'<td>'.$user['Intime'].'</td>'
            .'<td>'.$user['Outime'].'</td>'
            .'<td>'.$user['Time'].'</td>'
            .'<td>'.$user['Charges'].'</td>';
}
}

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Search & Display Using Selected Values</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
          <style>
            body{
                background-color:#9df9ef;
            }
           
           .table {
            background-color:yellow;
           }
           
          </style> 
    </head>
    <body>
        <div class="container">
        <form action="display.php" method="POST">
            <!-- 
For The First Time The Table Will Be Populated With All Data
But When You Choose An Option From The Select Options And Click The Find Button, The Table Will Be Populated With specific Data 
             -->
            <select name="start">
                <option value="" selected>All</option>
                <option value="Outime" <?php if($start == 'Outime'){echo 'selected';}?>>Checkout</option>
                <option value="Intime"  <?php if($start == 'Intime'){echo 'selected';}?>>CheckIn</option>
            </select>
            
            <input type="submit" class="btn btn-danger" name="search" value="Find">
            <a href="index.php"  class="btn btn-primary" role="button"> Back</a>

            <table class="table table-hover ">
                <tr>
                    <td>Vehicl No</td>
                    <td>Vehicle Model</td>
                    <td>Vehicle Type</td>
                    <td>Customer Name</td>
                    <td>Contact Number</td>
                    <td>Intime</td>
                    <td>Outime</td>
                    <td>Parking Time </td>
                    <td>Charges</td>
                </tr>
                
                <?php
                
                echo $tableContent;
                
                ?>
                
            </table>
            
        </form>
    </div>  
    </body>    
</html>
