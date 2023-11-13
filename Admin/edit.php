<?php
    ob_start();
    session_start();
    if(isset($_SESSION['start']) && isset($_SESSION['Username']))
    {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
    </svg>
    <style>
        .col2{
            text-align:end;
            padding:5px;
            padding-right:26px
        }
        @media (max-width: 767px) {
            .row2{
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
            .col2{
                padding-right: 5px;
                width: 125px!important;
                margin-bottom: 10px;
            }
            .row3{
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .col3{
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%!important;
                margin: 0!important;
            }
            .row_1,
            .row_2{
                margin-left: 20px!important;
            }
        }
        @media (min-width: 991px) and (max-width: 1233px) {
            .col3{
                margin-left: 6%!important;
            }
        }

        @media (max-width: 767px){
            .i2{
                padding-left: 10px!important;
                /* margin-left: 55px!important; */
            }
            /* .i1{
                margin-left: 30px!important;

            }

            .i3{
                margin-left: 24px!important;

            }
            .i4{
                margin-left: 35px!important;

            }
            .i5{
                margin-left: 57px!important;

            }
            .i6{
                margin-left: 24px!important;

            }
            .i7{
                margin-left: 57px!important;

            }
            .i8{
                margin-left: 16px!important;

            } */

            .l1{
                width: 100px!important;
                padding-right: 22px!important;
            }

            .l2{
                /* width: 100px!important; */
                /* padding-right: 35px!important; */
                padding-left: 2px!important;
            }
            /* .l2 .control-label{
                width: 100px!important;
            } */

            .lb{
                padding-left: 9px!important;
            }
            .in1{
                margin-left: 0%!important;
            }
            
            .txt1,.l2{
                padding-right: 5%!important;
                width: 33%!important;
                text-align: left!important;
            }
            

        }
    </style>
</head>
<body>
    <?php
            include("navbarr.php");
            include("./connect.php");
            //! Gallery

            if(isset($_GET['Ed']) && $_GET['Ed']=="new_picture")
            {               
                ?>
                <form action="?Ed=new_picture" method="post" enctype="multipart/form-data">
                <div class="container">
                    <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;">Add Picture</h1>
                    <div class="row row1" style="margin-top: 40px;">
                    <?php
                    if(isset($_POST["ADD"]))
                    {
                        $avatar = $_FILES['pic'];
                        $avatarName = $avatar['name'];
                        $avatarSize = $avatar['size'];
                        $avatarType = $avatar['type'];
                        $avatarTmp = $avatar['tmp_name'];
                        
                        $rand = rand(0,10000);
                        $avatar = $rand . '_' . $avatarName;
                        move_uploaded_file($avatarTmp,"../gallery/" . $avatar);
                        
                        $in="INSERT INTO gallery VALUES('$avatar')";
                        $result=mysqli_query($conn,$in) ? "Inserted":"Failed to insert";

                        if($result=="Inserted"){
                            echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                            <div>
                            Inserted 
                            </div>
                        </div>'); 
                        header("refresh:0 ; url=items.php?cho=gallery");     
                        }else{
                            echo('<div class="alert alert-danger d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                            <div>
                            Failed to insert
                            </div>');
                            header("refresh:1; url=edit.php?Ed=new_picture");
                        }
                    }
                ?>
                    </div>
                    <div class="row row2" style="margin-top: 40px;">                      
                        <div class="col-2 col2">
                            <label for="description" class="control-label" style="font-weight: bold;font-size: 18px;">Choose file</label>
                        </div>
                        
                        <div class="col-8">
                            <input type="file" name="pic" class="form-control" autocomplete="off"  required/>
                        </div>
                    </div>
                    <div class="row row3" style="margin-top: 40px;">
                        <div class="col-2 col3" style="margin-left:8%">
                            <input type="submit" value="ADD" name="ADD" class="btn btn-warning" style="margin-top: 20px;color:white;font-weight:bold;padding:12px; width:100px">
                        </div>
                    </div>
                </div>
                </form>
    <?php } 
    //* ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //! Edit Internet

            if($_GET['Ed']=="edit_internet")
                {
                    $mb=$_GET['MB'];
                    ?>
                <form action="?MB=<?php echo($mb) ?> & Ed=edit_internet" method="post">
                    <div class="container"> 
                        <h1 class="text-center fs-3" style="margin-top: 40px; font-weight:bold;font-size: 40px!important;">Edit Internet</h1>
                        <div class="row" style="margin-top: 40px;">
                        <?php
                            $ga_q="SELECT * FROM internet WHERE MB='{$mb}'";
                            $ga_result=mysqli_query($conn,$ga_q);
                            $ga_row = mysqli_fetch_row($ga_result);
                        if(isset($_POST["update"]))
                        {   
                                $MB=$_POST["Speed"];
                                $price=$_POST["Price"];

                                $formErrors  = array();
                                if (empty($_POST["Speed"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Speed cant be empty</div>";
                                }
                                if (empty($_POST["Price"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Price cant be empty</div>";
                                }
                            
                                if(empty($formErrors))
                                    {$in="UPDATE internet SET MB=$MB , Price=$price WHERE MB=$mb";
                                    $RESULT = mysqli_query($conn, $in) ? "Done" : "Failed";

                                    echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>'.
                                        $RESULT.'
                                    </div>');
                                    header("refresh:1; url=items.php?cho=internet");
                                }else{
                                    foreach($formErrors as $err)
                                    {
                                        echo($err);
                                    }
                                }
                                
                           
                            } ?>
                        </div>
                        <div class="row row_1" style="margin-top: 40px;">                      
                            <div class="col-2" style="text-align:end;padding:5px;padding-right:26px">
                                <label for="speed" class="control-label" style="font-weight: bold;font-size: 18px;">Speed</label>
                            </div>
                            
                            <div class="col-8">
                                <input type="text" id="speed" name="Speed" value="<?php echo($ga_row[0]) ?>" class="form-control inp" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row row_2" style="margin-top: 40px;">                      
                            <div class="col-2" style="text-align:end;padding:5px;padding-right:34px">
                                <label for="price" class="control-label" style="font-weight: bold;font-size: 18px;">Price</label>
                            </div>
                            
                            <div class="col-8">
                                <input type="text" id="price" name="Price" value="<?php echo($ga_row[1]) ?>" class="form-control inp" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-8" style="padding:5px;padding-left: 142px;">
                                <input type="submit" value="Update" name="update" class="btn btn-warning" style="margin-top: 20px;height:50px;color:white;font-weight:bold;padding:12px; width:100px">
                            </div>
                        </div>
                    
                    </div>
                </form>
            <?php } ?>
            
            <?php
            //* ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //! Add Internet

            if($_GET['Ed']=="Add_internet")
            {?>
            <form action="" method="post">
            <div class="container"> 
                    <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;">Add Internet</h1>
                    <div class="row" style="margin-top: 40px;">
                    <?php
                    if(isset($_POST["ADD"]))
                    {   
                            $MB=$_POST["Speed"];
                            $price=$_POST["Price"];

                            $formErrors  = array();
                            if (empty($_POST["Speed"])) {
                            $formErrors[] = "<div class='alert alert-danger'>Speed cant be empty</div>";
                            }
                            if (empty($_POST["Price"])) {
                            $formErrors[] = "<div class='alert alert-danger'>Price cant be empty</div>";
                            }
                        
                            if(empty($formErrors))
                                {$in="INSERT INTO internet VALUES($MB , $price)";
                                $RESULT = mysqli_query($conn, $in) ? "INSERTED" : "Failed";

                                echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>'.
                                    $RESULT.'
                                </div>');
                                header("refresh:1; url=items.php?cho=internet");
                            }else{
                                foreach($formErrors as $err)
                                {
                                    echo($err);
                                }
                            }
                            
                    
                    } ?>
                    </div>
                    <div class="row row_1" style="margin-top: 40px;">                      
                        <div class="col-2" style="text-align:end;padding:5px;padding-right:26px">
                            <label for="speed" class="control-label" style="font-weight: bold;font-size: 18px;">Speed</label>
                        </div>
                        
                        <div class="col-8">
                            <input type="text" id="speed" name="Speed" value="" class="form-control inp" autocomplete="off"  required/>
                        </div>
                    </div>

                    <div class="row row_2" style="margin-top: 40px;">                      
                        <div class="col-2" style="text-align:end;padding:5px;padding-right:34px">
                            <label for="price" class="control-label" style="font-weight: bold;font-size: 18px;">Price</label>
                        </div>
                        
                        <div class="col-8">
                            <input type="text" id="price" name="Price" value="" class="form-control inp" autocomplete="off"  required/>
                        </div>
                    </div>

                    <div class="row row_3" style="margin-top: 40px;">                      
                        <div class="col-8 col_add" style="padding:5px;padding-left: 142px;">
                            <input type="submit" value="ADD" name="ADD" class="btn btn-warning" style="margin-top: 20px;height:50px;color:white;font-weight:bold;padding:12px; width:100px">
                        </div>
                    </div>
                
                    </div>
            </form>
                   
            <?php
            }
            //* ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //! Add Items
            
            if($_GET['Ed']=="Add_items")
            {?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="container"> 
                        <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;">Add Items</h1>
                        <div class="row" style="margin-top: 40px;">
                        <?php

                            if(isset($_POST["ADD"]))
                            {   
                                $Name=$_POST["Name"];
                                $Description=$_POST["Description"];
                                $Price=$_POST["Price"];
                                $Status=$_POST["Status"];
                                $NB_Items=$_POST["NB_Items"];

                                $type=$_GET['type'];  //name of categories
                                $cat=$_GET['cat_id']; // id of categories

                                $avatar = $_FILES['pic'];
                                $avatarName = $avatar['name'];
                                $avatarSize = $avatar['size'];
                                $avatarType = $avatar['type'];
                                $avatarTmp = $avatar['tmp_name'];
                                
                                $rand = rand(0,10000);
                                $avatar = $rand . '_' . $avatarName;

                                $formErrors  = array();
                                if (empty($_POST["Name"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Name cant be empty</div>";
                                }
                                if (empty($_POST["Description"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Description cant be empty</div>";
                                }
                                if (empty($_POST["Price"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Price cant be empty</div>";
                                }
                                if (empty($_POST["Status"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Status cant be empty</div>";
                                }
                                if (empty($_POST["NB_Items"])) {
                                $formErrors[] = "<div class='alert alert-danger'>NB_Items cant be empty</div>";
                                }
                            
                                if(empty($formErrors))
                                    {
                                        move_uploaded_file($avatarTmp,"../images/$type/".$avatar);
                                        $in="INSERT INTO items(Name,Description,Price,Add_Date,Status,Picture,Cat_ID,Nb_Items)
                                             VALUES('$Name','$Description',$Price,now(),'$Status','$avatar',$cat,$NB_Items);";

                                        $RESULT = mysqli_query($conn, $in) ? "Done" : "Failed";

                                    echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
                                    <div>'.
                                        $RESULT.'
                                    </div>');
                                    header("refresh:0; url=items.php?cho=items&type=".$type);
                                }else{
                                    foreach($formErrors as $err)
                                    {
                                        echo($err);
                                    }
                                }
                                
                           
                            } ?>

                        </div>
                        <table>
                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:80px">
                                <label for="Name" class="control-label" style="font-weight: bold;font-size: 18px;">Name</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Name" name="Name" value="" class="form-control inp i1" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:34px">
                                <label for="Description" class="control-label" style="font-weight: bold;font-size: 18px;">Description</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Description" name="Description" value="" class="form-control inp i2" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:87px">
                                <label for="price" class="control-label" style="font-weight: bold;font-size: 18px;">Price</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="price" name="Price" value="" class="form-control inp i3" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:77px">
                                <label for="Status" class="control-label" style="font-weight: bold;font-size: 18px;">Status</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Status" name="Status" value="" class="form-control inp i4" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:52px">
                                <label for="NB_Items" class="control-label l1" style="font-weight: bold;font-size: 18px;">NB Items</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="NB_Items" name="NB_Items" value="" class="form-control inp i5" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:89px">
                                <label for="Date" class="control-label" style="font-weight: bold;font-size: 18px;">Date</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Date" name="Date" value="<?php echo(date("d-m-Y")); ?>" class="form-control inp i6" autocomplete="off"  disabled/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:39px">
                                <label for="Categories" class="control-label" style="font-weight: bold;font-size: 18px;">Categories</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Categories" name="Categories" value="<?php echo($_GET['type']); ?>" class="form-control inp i7" disabled/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 col2 l2 txt1" style="padding-right: 35px;">
                                <label for="description" class="control-label" style="font-weight: bold;font-size: 18px;">Choose File</label>
                            </div>
                            
                            <div class="col-8 in1">
                                <input type="file" name="pic" class="form-control i8"   required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-8 col_add lb" style="padding:5px;padding-left: 90px;">
                                <input type="submit" value="ADD" name="ADD" class="btn btn-warning" style="margin-top: 20px;height:50px;color:white;font-weight:bold;padding:12px; width:100px">
                            </div>
                        </div>
                
                    </div>
                    </div>
                </form>
      <?php }

      //* ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //! Edit Items

      if($_GET['Ed']=="Edit_items")
      {?>
        <form action="" method="post" enctype="multipart/form-data">
                    <div class="container"> 
                        <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;">Edit Items</h1>
                        <div class="row" style="margin-top: 40px;">
                        <?php
                            $id=$_GET['item_id']; // id of categories
                            $ga_q="SELECT * FROM items i,categories c WHERE item_ID=$id";
                            $ga_result=mysqli_query($conn,$ga_q);
                            $ga_row = mysqli_fetch_row($ga_result);

                            if(isset($_POST["update"]))
                            {   
                                $Name=$_POST["Name"];
                                $Description=$_POST["Description"];
                                $Price=$_POST["Price"];
                                $Status=$_POST["Status"];
                                $NB_Items=$_POST["NB_Items"];

                                $type=$_GET['type'];  //name of categories
                                $cat=$ga_row[7];

                                $avatar = $_FILES['pic'];
                                $avatarName = $avatar['name'];
                                $avatarSize = $avatar['size'];
                                $avatarType = $avatar['type'];
                                $avatarTmp = $avatar['tmp_name'];
                                
                                $rand = rand(0,10000);
                                $avatar = $rand . '_' . $avatarName;

                                $formErrors  = array();
                                if (empty($_POST["Name"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Name cant be empty</div>";
                                }
                                if (empty($_POST["Description"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Description cant be empty</div>";
                                }
                                if (empty($_POST["Price"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Price cant be empty</div>";
                                }
                                if (empty($_POST["Status"])) {
                                $formErrors[] = "<div class='alert alert-danger'>Status cant be empty</div>";
                                }
                                if (empty($_POST["NB_Items"])) {
                                $formErrors[] = "<div class='alert alert-danger'>NB_Items cant be empty</div>";
                                }
                            
                                if(empty($formErrors))
                                {
                                        $path="../images/$type/$ga_row[6]";
                                        if(!unlink($path))
                                        {
                                            echo('<div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div>
                                                No such file or directory
                                            </div>;');
                               
                                        }else{
                                            echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                            <div>
                                             Picture is deleted 
                                            </div>
                                            </div>');     
                                        }
                                    
                                        move_uploaded_file($avatarTmp,"../images/$type/".$avatar);
                                        $in="UPDATE items SET Name='$Name' , Description='$Description' , Price=$Price , Add_Date=now() , Status='$Status',
                                                              Picture='$avatar' , Cat_ID=$cat , Nb_Items=$NB_Items
                                                              WHERE Item_ID=$id";
                                        $RESULT = mysqli_query($conn, $in) ? "Done" : "Failed";

                                        echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#check-circle-fill"/></svg>
                                        <div>'.
                                            $RESULT.'
                                        </div>');
                                        header("refresh:0; url=items.php?cho=items&type=".$type);
                                }else{
                                    foreach($formErrors as $err)
                                    {
                                        echo($err);
                                    }
                                }
                                
                           
                            } ?>

                        </div>
                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:80px">
                                <label for="Name" class="control-label" style="font-weight: bold;font-size: 18px;">Name</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Name" name="Name" value="<?php echo($ga_row[1]); ?>" class="form-control inp i1" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:34px">
                                <label for="Description" class="control-label" style="font-weight: bold;font-size: 18px;">Description</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Description" name="Description" value="<?php echo($ga_row[2]); ?>" class="form-control inp i2" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:87px">
                                <label for="price" class="control-label" style="font-weight: bold;font-size: 18px;">Price</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="price" name="Price" value="<?php echo($ga_row[3]); ?>" class="form-control inp i3" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:77px">
                                <label for="Status" class="control-label" style="font-weight: bold;font-size: 18px;">Status</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Status" name="Status" value="<?php echo($ga_row[5]); ?>" class="form-control inp i4" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:52px">
                                <label for="NB_Items" class="control-label" style="font-weight: bold;font-size: 18px;">NB Items</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="NB_Items" name="NB_Items" value="<?php echo($ga_row[8]); ?>" class="form-control inp i5" autocomplete="off"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:89px">
                                <label for="Date" class="control-label" style="font-weight: bold;font-size: 18px;">Date</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Date" name="Date" value="<?php echo($ga_row[4]); ?>" class="form-control inp i6" autocomplete="off"  disabled/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 txt1" style="text-align:end;padding:5px;padding-right:39px">
                                <label for="Categories" class="control-label" style="font-weight: bold;font-size: 18px;">Categories</label>
                            </div>
                        
                            <div class="col-8 in1">
                                <input type="text" id="Categories" name="Categories" value="<?php echo($_GET['type']); ?>" class="form-control inp i7" disabled/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-2 col2 l2" style="padding-right: 35px;">
                                <label for="description" class="control-label" style="font-weight: bold;font-size: 18px;">Choose file</label>
                            </div>
                            
                            <div class="col-8 in1">
                                <input type="file" name="pic" class="form-control i8"  required/>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 40px;">                      
                            <div class="col-8 col_add lb" style="padding:5px;padding-left: 90px;">
                                <input type="submit" value="Update" name="update" class="btn btn-warning" style="margin-top: 20px;height:50px;color:white;font-weight:bold;padding:12px; width:100px">
                            </div>
                        </div>
                
                    </div>
                    </div>
                </form>
    <?php  }
        ?>
</body>
</html>


<?php
}
ob_end_flush();

?>