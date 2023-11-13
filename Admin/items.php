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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <title>Items</title>
            <link rel="shortcut icon" href="image/item.ico" type="image/x-icon">
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
                /* Gallery */
                th{
                    font-size: 24px;
                    text-align:center;
                }
                .name input{
                    border: none;
                    outline: none;
                }
                .name input:focus,
                .name:hover input{
                    background-color: #ececec;
                }
                @media (max-width: 767px) {
                    th{
                        font-size: 20px!important;
                    }
                    td.name{
                        overflow: auto;
                        max-width: 80px;
                    }
                    .clss{
                        width: 70px!important;
                    }
                }

                /* Internet */
                @media (max-width: 767px) {
                    .tb{
                        width: 100%!important;
                    }
                    .bt{
                        display: flex;
                        padding-left: 0!important;
                    }
                    .bt a{
                        width: 80px!important;
                    }
                    .bt button{
                        width: 80px!important;
                    }
                    .btn_add{
                        flex: none!important;
                    }
                }

                /*items*/
                @media(max-width:767px){
                    th{
                        font-size: 20px!important;
                    }
                    td .items{
                        overflow: auto;
                        max-width: 82px;
                    }
                    .media1{
                        display: none!important;
                    }

                    .media2{
                        display: block!important;
                    }
                    table:not(:last-of-type){
                        margin-bottom: 20%;
                    }
                }
            </style>
        </head>
        <body>
        <?php
            include("navbarr.php");
            include("./connect.php");
            if(isset($_GET['cho']) && $_GET['cho']=="gallery")
            {
                $ga_q="SELECT * FROM gallery";
                $ga_result=mysqli_query($conn,$ga_q);
                $ga_row = mysqli_fetch_all($ga_result);
                ?>
            <form action="" method="post">
            <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;">Gallery</h1>
                <div class="container" style="margin-top: 30px;">
                    <div id="status"><?php 
                        if(isset($_POST["delete_gallery"]))
                        {
                            $x=$_POST["delete_gallery"];
                            $ga="DELETE FROM gallery WHERE name_picture='{$x}'";
                            $ga_r=mysqli_query($conn,$ga);
                            $path="../gallery/$x";
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
                                   success 
                                </div>
                              </div>');     
                              header("refresh:0 ; url=items.php?cho=gallery");                      
                             }
                        }
                 
                    
                    
                    ?></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Picture</th>
                                <th scope="col">Nb</th>
                                <th scope="col">Name</th>
                                <th scope="col">Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=0;
                                foreach($ga_row as $rows)
                                {?>
                                    <tr>
                                        <td class="pic" scope="col" style="vertical-align:middle;"><img src="../gallery/<?php echo($rows[0]);?>" width="60px" height="60px"  alt="" style="border-radius: 50%;"></td>
                                        <td class="num" scope="col" style="vertical-align:middle;"><?php echo($i); ?></td>
                                        <td class="name" scope="col" style="vertical-align:middle;"><div class="clss" style="overflow: auto; width: 250px;"><?php echo($rows[0]); ?></div></td>
                                        <td scope="col">
                                            <button name="delete_gallery" class="btn btn-danger"  value="<?php echo($rows[0]) ?>" style="margin: 5px; width: 100px; height:50px">Delete</button>
                                        </td>
                                    </tr>
                                <?php
                                $i++;
                                }?>
                        </tbody>
                    </table>
                    <a href="edit.php?Ed=new_picture"  class="btn btn-warning" style="margin-top: 20px; ;margin-bottom: 40px;height:50px;color:white;font-weight:bold;padding:12px">Add Picture</a>

                </div>
            </form>
        <?php }

        if($_GET["cho"]=="internet")
        {
            $ga_q="SELECT * FROM internet";
            $ga_result=mysqli_query($conn,$ga_q);
            $ga_row = mysqli_fetch_all($ga_result);
        ?>
        <form action="" method="post">

            <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;">Internet</h1>
            <div class="container" style="margin-top: 30px;">    
                    <div id="status"><?php 
                        if(isset($_POST["delete_internet"]))
                        {
                            $x=$_POST["delete_internet"];
                            $ga="DELETE FROM internet WHERE MB={$x}";
                            $ga_r=mysqli_query($conn,$ga) ? "Success": "Failed";

                            if($ga_r=="Failed")
                            {
                            
                                echo('<div class="alert alert-danger d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                <div>
                                    Can not Continue
                                </div>;');
                                header("refresh:0 ; url=items.php?cho=internet");                      
                            
                            }else{
                                echo('<div class="alert alert-success d-flex align-items-center" role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                <div>
                                    Success 
                                </div>
                            </div>');     
                            header("refresh:0 ; url=items.php?cho=internet");                      
                            }
                        }
                
                    ?>
                    </div>
                <div class="row">
                    <div class="col-3">
                    </div>
                    <div style="display: flex; justify-content: space-evenly; align-items: center;margin-top:40px">
                        <table class="table table-hover tb" style="width: 600px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="font-size: 24px;">Speed</th>
                                    <th scope="col" style="font-size: 24px;">Price</th>
                                    <th scope="col" style="font-size: 24px;text-align: center;">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                        foreach($ga_row as $rows)
                                        {?>
                                            <tr>
                                                <td scope="col-2" style="vertical-align:middle;"><?php echo($rows[0]." MB"); ?></td>
                                                <td scope="col-2" style="vertical-align:middle;"><?php echo($rows[1]." $"); ?></td>
                                                <td class="bt" scope="col-6" style="padding-left: 110px;">
                                                <a href="edit.php?MB=<?php echo($rows[0]); ?>&Ed=edit_internet"  class="btn btn-success" style="margin: 5px; width: 100px; height:50px;padding-top: 12px;">Edit</a>
                                                <button name="delete_internet" class="btn btn-danger"  value="<?php echo($rows[0]); ?>" style="margin: 5px; width: 100px; height:50px">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                        }?>
                                </tbody>
                        </table>
                    </div>

                <div class="row">
                    <div class="col-3">

                    </div>

                    <div class="col btn_add" style="padding-left: 27px;">
                        <a href="edit.php?Ed=Add_internet"  class="btn btn-warning" style="margin-top: 20px;width:100px;height:50px;color:white;font-weight:bold;padding:12px">Add</a>
                    </div>
                </div>
            </div>
        </form>
        <?php
        }
        if($_GET['cho']=="items"){
            if($_GET['type']=="phone"){
                $f="SELECT * FROM items i,categories c WHERE i.Cat_ID=c.Id AND i.Cat_ID=2";
                $res=mysqli_query($conn,$f);
                $r_row=mysqli_fetch_all($res);
                $c_id=2;
                
            }

            if($_GET['type']=="laptop"){
                $f="SELECT * FROM items i,categories c WHERE i.Cat_ID=c.Id AND i.Cat_ID=3";
                $res=mysqli_query($conn,$f);
                $r_row=mysqli_fetch_all($res);
                $c_id=3;
            }

            if($_GET['type']=="accessories"){
                $f="SELECT * FROM items i,categories c WHERE i.Cat_ID=c.Id AND i.Cat_ID=1";
                $res=mysqli_query($conn,$f);
                $r_row=mysqli_fetch_all($res);
                $c_id=1;
            }
            $type=$_GET['type'];
            
            ?>
            
            <form action=""  method="post">
                    <h1 class="text-center" style="margin-top: 40px; font-weight:bold;font-size: 40px;"><?php echo($type); ?></h1>
                    <div class="container" style="margin-top: 30px;"> 
                    <div id="status"><?php 
                        if(isset($_POST["delete_items"]))
                        {
                            $x=$_POST["delete_items"];
                            $ga="DELETE FROM items WHERE Picture='$x'";
                            $ga_r=mysqli_query($conn,$ga);
                            $path="../images/$type/$x";
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
                                   success 
                                </div>
                              </div>');     
                              header("refresh:2 ; url=items.php?cho=items&type=$type");                      
                             }
                        }?>
                        </div>

                        <div class="row media1" style="margin-top:40px;display:block">
                            <table class="table table-hover tb">
                                <thead>
                                    <tr>
                                        <th scope="col" style="font-size: 24px;">Picture</th>
                                        <th scope="col" style="font-size: 24px;">Name</th>
                                        <th scope="col" style="font-size: 24px;">Description</th>
                                        <th scope="col" style="font-size: 24px;">Price</th>
                                        <th scope="col" style="font-size: 24px;">Status</th>
                                        <th scope="col" style="font-size: 24px;">NB items</th>
                                        <th scope="col" style="font-size: 24px;">Date</th>
                                        <th scope="col" style="font-size: 24px;text-align:center">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            foreach($r_row as $rows)
                                            {?>
                                                <tr>
                                                    <td class="pic" scope="col" style="vertical-align:middle;"><img src="../images/<?php echo($_GET['type']);?>/<?php echo($rows[6]);?>" width="60px" height="60px"  alt="" style="border-radius: 50%;"></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[1]); ?>     </itemsiv></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[2]); ?>     </div></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[3]."$"); ?> </div></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[5]); ?>     </div></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[8]); ?>     </div></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[4]); ?>     </div></td>
                                                    <td class="bt" scope="col-6" style="padding-left: 110px;">
                                                        <a href="edit.php?Ed=Edit_items&type=<?php echo($type); ?>&item_id=<?php echo($rows[0]); ?>"  class="btn btn-success" style="margin: 5px; width: 100px; height:50px;padding-top: 12px;">Edit</a>
                                                        <button name="delete_items" class="btn btn-danger"  value="<?php echo($rows[6]); ?>" style="margin: 5px; width: 100px; height:50px">Delete</button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }?>
                                    </tbody>
                            </table>
                        </div>
                        <?php
                            foreach($r_row as $rows)
                            {?>
                        <div class="row media2" style="margin-top:49px;display:none">
                            <table class="table table-hover tb">
                                    <tbody>
                                                <tr>
                                                    <th scope="col" style="font-size: 24px;">Picture</th>
                                                    <th scope="col" style="font-size: 24px;">Name</th>
                                                </tr>
                                                <tr>
                                                    <td class="pic" scope="col" style="vertical-align:middle;"><img src="../images/<?php echo($_GET['type']);?>/<?php echo($rows[6]);?>" width="60px" height="60px"  alt="" style="border-radius: 50%;"></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[1]); ?>     </itemsiv></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col" style="font-size: 24px;">Description</th>
                                                    <th scope="col" style="font-size: 24px;">Price</th>
                                                </tr>
                                                <tr>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[2]); ?>     </div></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[3]."$"); ?> </div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col" style="font-size: 24px;">Status</th>
                                                    <th scope="col" style="font-size: 24px;">NB items</th>
                                                </tr>
                                                <tr>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[5]); ?>     </div></td>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[8]); ?>     </div></td>
                                                </tr>
                                                <tr>
                                                    <th scope="col" style="font-size: 24px;">Date</th>
                                                    <th scope="col" style="font-size: 24px;">Control</th>
                                                </tr>
                                                <tr>
                                                    <td scope="col" style="vertical-align:middle;"> <div class="items"><?php echo($rows[4]); ?>     </div></td>
                                                    <td class="bt" scope="col-6" style="padding-left: 110px;">
                                                        <div style="display: flex;">
                                                            <a href="edit.php?Ed=Edit_items&type=<?php echo($type); ?>&item_id=<?php echo($rows[0]); ?>"  class="btn btn-success" style="margin-bottom: 5px; width: 100px; height:50px;padding-top: 12px;">Edit</a><br>
                                                            <button name="delete_items" class="btn btn-danger"  value="<?php echo($rows[6]); ?>" style="width: 100px; height:50px;margin-left:5%;">Delete</button>
                                                        </div>
                                                        
                                                    </td>
                                                </tr>
                                            <?php
                                            }?>
                                    </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col btn_add" style="padding-left: 27px;">
                                <a href="edit.php?Ed=Add_items&type=<?php echo($type); ?>&cat_id=<?php echo($c_id); ?>"  class="btn btn-warning" style="margin-top: 20px;width:100px;height:50px;color:white;font-weight:bold;padding:12px">Add</a>
                            </div>
                        </div> 
                    </div>

                </form>
            
<?php       }
        ?>
        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </html>

<?php
    }
    ob_end_flush();

?>

