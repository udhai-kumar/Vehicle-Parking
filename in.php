<?php

$no=$_POST['Vno'];
$model=$_POST['Vmodel'];
$type=$_POST['Vtype'];
$name =$_POST['Customer'];
$phnum=$_POST['Phnumber'];


if(!empty($no)&&!empty($model)&&!empty($type)&&!empty($name)&&!empty($phnum)){

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "parking";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $INSERT ="INSERT into vehicle (Vno,Vmodel,Vtype,Customer,Phno)values(?,?,?,?,?)";

$stmt =$conn ->prepare($INSERT);
$stmt->bind_param("sssss",$no,$model,$type,$name,$phnum);
$stmt ->execute();
$stmt->close();
$conn->close();
echo"<script>
alert('have a nice day');
</script>";
//header("Refresh:5;url=http://localhost/VEHICLE%20PARKING/park.php",true,307);

header('location:http://localhost/VEHICLE%20PARKING/index.php',true,307);
}

}
else{
    echo"<script>
    alert('ALL FIELDS ARE REQUIRED');
    </script>";
    die();
   //header('location:http://localhost/VEHICLE%20PARKING/park.php',true,307);

}

?>