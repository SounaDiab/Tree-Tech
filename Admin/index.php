<?php
    ob_start();
    include("./connect.php");
    session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="image/logo2.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<script src="../JQuery/jquery-3.6.4.min.js"></script>
<body>
    
<?php

    if(isset($_POST["verificatoin_login"]))
    {
        $username=$_POST['input_username'];
        $pass=$_POST['input_password'];
        $q = "SELECT * FROM admin Where UserName='$username' AND Password='$pass' ";
        $result = mysqli_query($conn, $q);
        $row = mysqli_fetch_all($result);

        $count = mysqli_num_rows($result);

        if($count>=1){
            $_SESSION["Username"]=$username;
            ?>
            <script>
                $(document).ready(function()
                {
                    document.getElementById("get_started").disabled=false;
                    $("#get_started").css("opacity","1");
                    $(".category").slideUp();
                });
        </script>
<?php
        }
        else{
 ?>
            <script>
                $(document).ready(function()
                {
                    $(".category").slideDown();
                    document.getElementById("l_u").style.color="red";
                    document.getElementById("l_p").style.color="red";
                    // $(".button_setting").css("color","red");
                    document.getElementById("l_u").focus();
                });
            </script>
<?php
        }
    }
        if(isset($_SESSION['Username']))
        {
?>
            <script>
                $(document).ready(function(){
                    document.getElementById("get_started").disabled=false;
                    $("#get_started").css("opacity","1");
                });
            </script>       
<?php
            if(isset($_SESSION['start']))
            {
?>
                <script>
                    $(document).ready(function(){
                        document.getElementById("link_gallery").href="items.php?cho=gallery";
                        document.getElementById("links_gallery").href="items.php?cho=gallery";
                        document.getElementById("link_internet").href="items.php?cho=internet";
                        document.getElementById("links_internet").href="items.php?cho=internet";
                        document.getElementById("link_accessories").href="items.php?type=accessories&cho=items";
                        document.getElementById("links_accessories").href="items.php?type=accessories&cho=items";
                        document.getElementById("link_phone").href="items.php?type=phone&cho=items";
                        document.getElementById("links_phone").href="items.php?type=phone&cho=items";
                        document.getElementById("link_laptop").href="items.php?type=laptop&cho=items";
                        document.getElementById("links_laptop").href="items.php?type=laptop&cho=items";
                        document.getElementById("button_setting").disabled=false;
                    });
                </script>
<?php
            }
 ?>
<?php
        }
        
?>
<?php
    if(isset($_POST["Get_Started"]))
    {
        $_SESSION['start']="start";///////********************************* */
        ?>
    
        <script>
            $(document).ready(function(){
                document.getElementById("link_gallery").href="items.php?cho=gallery";
                document.getElementById("links_gallery").href="items.php?cho=gallery";
                document.getElementById("link_internet").href="items.php?cho=internet";
                document.getElementById("links_internet").href="items.php?cho=internet";
                document.getElementById("link_accessories").href="items.php?type=accessories&cho=items";
                document.getElementById("links_accessories").href="items.php?type=accessories&cho=items";
                document.getElementById("link_phone").href="items.php?type=phone&cho=items";
                document.getElementById("links_phone").href="items.php?type=phone&cho=items";
                document.getElementById("link_laptop").href="items.php?type=laptop&cho=items";
                document.getElementById("links_laptop").href="items.php?type=laptop&cho=items";
                document.getElementById("button_setting").disabled=false;
            });
        </script>
<?php
    }  


    if(isset($_POST["logout"]))
    {
        include("logout.php");
    }
?>
    




<form action="./index.php" method="post" class="l">
    <div class="AdminLanding">
        <div class="Content">
            <div class="HeaderCopy">
                <div class="TreeTech">
                    <span>T</span>
                    <span>ree</span>
                    <span></span>
                    <span>T</span>
                    <span>ech</span>
                </div>
                <div class="Tree">
                    <span>GREAT TECH GREAT BUSINESS<br/></span>
                    <span>Internet installation, immediate sale <br/>and maintenance of cellular devices, <br/>sales and recharging of lines</span>
                </div>
            </div>
            <div class="PrimaryLarge" >
                <input type="submit" value="Get Started" id="get_started" disabled name="Get_Started">
            </div>
        </div>
        <div class="MockCreative">
            <div class="MobileMockup">
                <div class="Mask"></div>
                <div class="Circle"></div>
                <div class="Mockup">
                    <img class="Img31" src="image/screen3.png" />
                    <div class="MobileIphoneX">
                        <img class="IphoneX" src="image/iPhone cadre.jpg" />
                    </div>
                </div>
            </div>
            <div class="Card1">
                <img class="User3" src="image/avatar1.jpg" />
                <div class="Content">
                    <div class="Heading"></div>
                    <div class="Paragraph"></div>
                </div>
            </div>
            <div class="Card2">
                <img class="UserImage" src="image/avatar2.jpg" />
                <div class="Content">
                    <div class="Header"></div>
                    <div class="Paragraph"></div>
                </div>
            </div>
        </div>
        <div class="Navbar">
            <div class="Header5">
                <div class="back">
                    <a href="../index.php"><i class="fa-solid fa-circle-arrow-left"></i></a>
                </div>
                <div class="LeftNavItems">
                    <div class="HeaderMenuDefault">
                        <a href="" id="link_gallery">
                            <div class="Label">Gallery</div>
                        </a>
                    </div>
                    <div class="MenuItemDefault">
                        <a href="" id="link_internet">
                            <div class="Label">Internet</div>
                        </a>
                    </div>
                    <div class="MenuItemDefault">
                        <a href="" id="link_accessories">
                            <div class="Label">Accessories</div>
                        </a>
                    </div>
                    <div class="MenuItemDefault">
                        <a href="" id="link_phone">
                            <div class="Label">Phone</div>
                        </a>
                    </div>
                    <div class="MenuItemDefault">
                        <a href="" id="link_laptop">
                            <div class="Label">Laptop</div>
                        </a>
                    </div>
                </div>
                <div class="LeftNav">
                    <div class="header_menu">
                        <div class="HeaderMenu">
                            <a href="" id="links_gallery">
                                <div class="Label">Gallery</div>
                            </a>
                        </div>
                        <i class="fa-solid fa-caret-down btn_down"></i>
                        <i class="fa-solid fa-caret-up btn_up"></i>
                    </div>
                    <div class="slider">
                        <div class="MenuItem">
                                <a href="" id="links_internet">
                                    <div class="Label">Internet</div>
                                </a>
                        </div>
                        <div class="MenuItem">
                            <a href="" id="links_accessories">
                                <div class="Label">Accessories</div>
                            </a>
                        </div>
                        <div class="MenuItem">
                            <a href="" id="links_phone">
                                <div class="Label">Phone</div>
                            </a>
                        </div>
                        <div class="MenuItem">
                            <a href="" id="links_laptop">
                                <div class="Label">Laptop</div>
                            </a>
                        </div>
                        <div class="MenuItem">
                            <a href="../index.php" id="links_laptop">
                                <div class="Label">User</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="Logo">
                    <img class="Img11" src="image/img2.png" />
                    <div class="TreeTech">Tree Tech</div>
                </div>
                <div class="RightNav">
                    <div class="SecondaryMedium">
                        <div class="Login">
                            <ul class="ul">
                                <li class="categories">
                                    Login                    
                                </li>

                                <ul class="category" hidden>
                                    <li><input type="text" placeholder="Username" autocomplete="off" name="input_username" id="l_u"></li>
                                    <li><input type="password" placeholder="Password" autocomplete="off" name="input_password" id="l_p"></li>
                                    <li><input type="submit" value="Login" name="verificatoin_login"></li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <div class="PrimaryMedium">
                        <div class="SignUp">
                            <ul class="setting">
                                <input type="button" value="Setting" class="button_setting" disabled id="button_setting">
                                <ul class="setting_hidden" hidden>
                                    <li><input type="submit" value="Logout" id="logout" name="logout"></li>
                                    <li><a href="./profile.php?do=profile" style="text-decoration: none;"><input type="button" value="Profile"></a></li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</form>    
</body>

<script src="./js/main.js"></script>

</html>

<?php
    ob_end_flush();

?>