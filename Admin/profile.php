<?php
ob_start();
session_start();
include("./connect.php");


if(isset($_SESSION['start']) && isset($_SESSION['Username'])){
        $q = "SELECT * FROM admin";
        $result = mysqli_query($conn, $q);
        $row = mysqli_fetch_array($result);
        $display=$_GET["do"];
        
if(isset($_POST["update"]))
{
    $display="null";
    $name=$_POST["name"];
    $pass=$_POST["pass"];
    $gmail=$_POST["gmail"];
    $phone_nb=$_POST["phone_nb"];

    $formErrors = array();
    if (empty($_POST["name"])) {
    $formErrors[] = "<div class='alert alert-danger'>name cant be empty</div>";
    }
    if (empty($_POST["pass"])) {
    $formErrors[] = "<div class='alert alert-danger'>password cant be empty</div>";
    }
    if (empty($_POST["gmail"])) {
    $formErrors[] = "<div class='alert alert-danger'>Gmail cant be empty</div>";
    }
    if (empty($_POST["phone_nb"])) {
    $formErrors[] = "<div class='alert alert-danger'>Phone Number cant be empty</div>";
    }



    if(empty($formErrors)) {
        $result="UPDATE admin set UserName='$name' , Password='$pass' , Gmail='$gmail' , Phone_Nb='$phone_nb'" ;
        $RESULT = mysqli_query($conn, $result) ? "Done" : "Failed";

        $m = "<div class='alert alert-success'>{$RESULT}</div>";
        header("refresh:0; url=profile.php?do=profile");
    }


}



        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="./css/style_profile.css">
            <title>Profile</title>
        </head>
        <body>
        <form action="" method="post" class="forr">
            <nav class="navbar na">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php" ">
                    <i class="fa-solid fa-arrow-left" style="color: white; font-size: 32px; margin-left:10px;"></i>
                </a>
            </div>
            </nav>
            <h1 class="text-center fs-3" style="margin-top: 40px; font-weight:bold;font-size: 40px!important;">Profile</h1>
            <div class="container">

                <div class="row" style="margin-top: 50px;">
                <?php
                if(isset($formErrors))
                   { foreach ($formErrors as $err) {
                    echo $err;}
                   }
                   if(isset($m))
                    {echo($m);}?>
                <?php
                        if($display=="profile")
                {?>
                    <div class="col-sm-2 ">
                    </div>
                    <div class="col-sm-1 ">
                        <label for="description" class="control-label" style="font-weight: bold;font-size: 18px;">Username</label>
                    </div>
                    
                    <div class="col-8">
                        <input type="text" id="description" name="name" class="form-control inp" placeholder="Username" required value="<?php echo($row[0]);?>"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-2 ">
                    </div>
                    <div class="col-sm-1 ">
                        <label for="description2" class="control-label" style="font-weight: bold;font-size: 18px;">Password</label>
                    </div>
                    
                    <div class="col-8">
                        <input type="password" id="description2" name="pass" class="form-control inp" placeholder="Password" required value="<?php echo($row[1]);?>"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-2 ">
                    </div>
                    <div class="col-sm-1 ">
                        <label for="description3" class="control-label" style="font-weight: bold;font-size: 18px;" >Gmail</label>
                    </div>
                    
                    <div class="col-8">
                        <input type="gmail" required id="description3" name="gmail" class="form-control inp" placeholder="Gmail"  value="<?php echo($row[2]);?>"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-2 ">
                    </div>
                    <div class="col-sm-1 ">
                        <label for="description4" class="control-label" style="font-weight: bold;font-size: 18px;">Phone Nb</label>
                    </div>
                    
                    <div class="col-8">
                        <input type="text" id="description4" name="phone_nb" class="form-control inp form-control-warning" placeholder="+(961)" required value="<?php echo($row[3]);?>"/>
                    </div>
                </div>

                <div class="row" style="margin-top: 40px;">
                    <div class="col-sm-2 ">
                    </div>
                    <div class="col-2">
                        <input type="submit" value="UPDATE" name="update" class="btn btn-warning" style="font-weight: bold;color:white;"/>
                    </div>
                </div>
            </div>
    <?php }?>
        </form>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
        </html>
    
<?php
} 
ob_end_flush();
?>