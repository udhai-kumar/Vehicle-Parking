<?php
$no=$_POST['Vno'];
$model=null;
$type=null;
$name=null;
$phnum=null;
$time=null;
$intime=null; 
$outime=null;
$charges=0;

if(!empty($no)){

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
        $UPDATE ="update vehicle set Outime=CURRENT_TIMESTAMP where Vno='$no' AND `Outime` IS null ";
        $DISPLAY="UPDATE vehicle rt SET TIME = TIMESTAMPDIFF(SECOND,Intime,Outime) WHERE Vno='$no' AND rt.Outime IS NOT null";
    
        $stmt =$conn ->prepare($UPDATE);
        $stmt ->execute();
        $stmt->close();
        $stmt =$conn->prepare($DISPLAY);
        $stmt->execute();
        $stmt->close();
        
$FEES ="SELECT * FROM `vehicle` WHERE Vno='$no' AND `Charges` IS null";
$result=$conn ->query($FEES);

if($result->num_rows >0){
    while($row = $result->fetch_assoc()){
        $time=$row['Time'];
        $model=$row['Vmodel'];
        $type=$row['Vtype'];
        $name=$row['Customer'];
        $phnum=$row['Phno'];
        $intime=$row['Intime'];
        $outime=$row['Outime'];
        
       
        if($time<=10){
            $charges=10;
        }else{
            $n = ceil($time / 10);
                for ($i = 1; $i <= $n; $i++) {
                    $charges+=10;
                }
        }
        
        $CHARGES ="UPDATE `vehicle` SET `Charges`='$charges' WHERE Vno='$no' AND `Charges` IS null ";
$stmt =$conn ->prepare($CHARGES);
$stmt->execute();
$stmt->close();
}
}


    
}



echo"<script>
alert('Checkout Sucessful Pay :$charges');</script>";
echo"YOUR NAME:$name.<br>";
echo"Intime:$intime.<br>";
echo"Outime:$outime.<br>";
header("Refresh:5;url=http://localhost/VEHICLE%20PARKING/index.php",true,307);
  }


else {
    echo"<script>
    alert('ALL FIELDS ARE REQUIRED');
    </script>";
    die();
}

?>
