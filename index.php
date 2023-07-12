<?php
$no=null;
$model=null;
$type=null;
$name=null;
$phnum=null;


if(isset($_POST['search'])){
    $id = $_POST['search'];
    
    $connect = mysqli_connect("localhost", "root", "","parking");
    
    $query = "SELECT * FROM `vehicle` WHERE Vno = '$id' AND `Outime` IS null";
    
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $no = $row['Vno'];
        $model = $row['Vmodel'];
        $type = $row['Vtype'];
        $name = $row['Customer'];
        $phnum=$row['Phno'];
      }  
    }
    
   
    else {
        echo "<script>
        alert('vehicle not found');
        </script>";
           $no="";
           $model="";
           $type="";
           $name="";
           $phnum="";
    }
    
    
    mysqli_free_result($result);
    mysqli_close($connect);
    
}


else{
     $no="";
     $model="";
     $type="";
     $name="";
     $phnum="";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    body {
        background: url(https://png.pngtree.com/background/20220731/original/pngtree-smart-car-parking-banner-picture-image_1906845.jpg);
        height: 100vh;
        width: 100vw;
        background-repeat:no-repeat;
        background-size:cover;
    }


    .container {

        display: flex;
        width: 500px;
        height: 600px;
        margin-top:25px;
        border-radius: 5px;
        box-shadow: inset 2px 2px 2px;
        flex-direction: column;
        background-color: #7FDBFF;
        padding:5px;
    }
    
    .form-group{
        width:60%;

    }

#display{
    padding:5px;
}
.btn-inline{
    padding:5px;
}
.input-group{
    width: 250px;
    padding:10px;
}

</style>

<body>

    <center>
        <div class="container">
            <div>
                <h1>Parking Management</h1>
            </div>
            <div class="row">
                <form name="info" method="post" action="in.php">
                <div class="form-group">
                    <p>Vehicle No</p>
                    <input type="text" class="form-control" name="Vno" placeholder="Vehicle No" value="<?php echo $no;?>"/>
                </div>
                <div class="form-group">
                    <p>Vehicle Model</p>
                    <input type="text" class="form-control"  name="Vmodel" placeholder="Vehicle Model" value="<?php echo $model;?>" />
                </div>
                <div class="form-group">
                    <p>Vehicle type</p>
                    <input type="text" class="form-control"  name="Vtype" placeholder="Vehicle Type" value="<?php echo $type;?>" />
                </div> 
                <div class="form-group">
                    <p>Customer Name</p>
                    <input type="text" class="form-control" name="Customer" placeholder="Name" value="<?php echo $name;?>"/>
                </div>
                <div class="form-group">
                    <p>Phone Number</p>
                    <input type="text" class="form-control"  name="Phnumber" placeholder="+91-XXXX-XXX-XXX" value="<?php echo $phnum;?>"/>
                </div>
                    <div class="btn-inline">
                        <button type="submit" class="btn btn-success" name="">CheckIn</button>                     
                        <button type="submit" class="btn btn-danger" formaction="out.php" formmethod="post" name="">Checkout</button>
                    </div>
                    <a class="btn btn-primary" id="display" href="display.php" role="button">Display List</a>

                </form>
               <div>
                    <form action="<?=$_SERVER['PHP_SELF']?>" method="post"> 
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter the Vehicle no" id="txtSearch" name="search"/>
                        <div class="input-group-btn" >
                        <button class="btn btn-primary" type="submit" >
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </div>
                    </div>
                    
                </div>
</form>


            
            </div>

        </div>
    </center>


</body>

</html>




