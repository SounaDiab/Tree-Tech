<?php
include("connect.php");

//data for internet
$q = "SELECT * FROM internet";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_all($result);


//data for Accessories
$acc = "SELECT * FROM items i,categories c WHERE i.Cat_ID=c.Id and i.Cat_ID=1";
$r_acc = mysqli_query($conn, $acc);
$i_acc = mysqli_fetch_all($r_acc);

//data for Phones
$pho = "SELECT * FROM items i,categories c WHERE i.Cat_ID=c.Id and i.Cat_ID=2";
$r_pho = mysqli_query($conn, $pho);
$i_pho = mysqli_fetch_all($r_pho);


//data for Laptops
$lap = "SELECT * FROM items i,categories c WHERE i.Cat_ID=c.Id and i.Cat_ID=3";
$r_lap = mysqli_query($conn, $lap);
$i_lap = mysqli_fetch_all($r_lap);

$gal = "SELECT * FROM gallery";
$r_gal = mysqli_query($conn, $gal);
$i_gal = mysqli_fetch_all($r_gal);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tree Tech</title>
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <form class="form" action="./details_card.php" method="get">
    <div class="landing">
        <div class="container">
            <div class="circle_tirkoise"></div>
            <div class="circle_orange"></div>
            <div class="circle_purple"></div>
            <div class="content_img">
                <div class="content">
                    <div class="text">
                        <div class="text_header"><span>T</span>ree <span>T</span>ech</div>
                        <div class="text_content">
                            <span class="s1">GREAT TECH GREAT BUSINESS</span>
                            <div class="s2">
                                Internet installation, immediate sale <br>
                                and maintenance of cellular devices,<br>
                                sales and recharging of lines, installing <br>
                                and maintaining Cameras
                            </div>
                        </div>
                    </div>
                </div>
                <img class="image" src="images/img3.png" />
            </div>
            <div class="navbar">
                <div class="logo">
                    <a href="./Admin/index.php"><img src="images/img2.png" alt="Tree Tech" class="img_logo"></a>
                </div>
                <div class="nav">
                    <ul class="ul">
                        <li class="categories">
                            Categories
                            <ul class="category">
                                <li class="internet"><a href="#internet">Internet</a></li>
                                <li class="accessories"><a href="#accessories">Accessories</a></li>
                                <li class="phone"><a href="#phone">Phone</a></li>
                                <li class="laptop"><a href="#laptop">Laptops</a></li>
                            </ul>
                        </li>
                        <li class="gallery"><a href="#gallery">Gallery</a></li>
                        <li class="about"><a href="#about">About</a></li>
                        <li class="contact"><a href="#contact">Contact</a></li>
                    </ul>
                    <!-- todo navbar button for small window -->
                    <button class="toggle-menu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--! //////////////////////////////////////////////////////////////////////////////////// -->
    <!-- Gallery -->
    <div class="to">
        <h3 class="title" id="gallery"><span>G</span>ALLERY</h3>
        <div class="galleryy">
            <div class="container">
                <div class="slide">
                    <?php foreach($i_gal as $res){?>
                        <div class="item" style="background-image: url(./gallery/<?php echo $res[0] ?>);"></div>
                    <?php }?>
                </div>
                <div class="buttons">
                    <button id="prev"><i class="fa-solid fa-angle-left"></i></button>
                    <button id="next"><i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <!--! //////////////////////////////////////////////////////////////////////////////////// -->
        <!-- Categories -->

        <div class="categoriess">
            <div class="container">
                <h3 class="title"><span>C</span>ategories</h3>
                <!-- Internet -->
                <div class="internett">
                    <fieldset>
                        <legend class="title" id="internet"><span>I</span>nternet</legend>
                        <div class="net">
                            <div class="speed">
                                <h4 class="net_title">Speed</h4>
                                <ul>
                                <?php
                                foreach ($row as $rows)
                                { ?>

                                <li><?php echo $rows[0]; ?> MB</li>

                                <?php } ?>
                                </ul>
                            </div>
                            <div class="price">
                                <h4 class="net_title">Price</h4>
                                <ul>
                                <?php
                                foreach ($row as $rows)
                                { ?>

                                <li>$<?php echo $rows[1]; ?></li>

                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </fieldset>
                </div>
                    <!--@ //////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Accessories -->
                <div class="accessoriess" >
                    <h3 class="title" id="accessories"><span>A</span>ccessories</h3>
                    <div class="container">
                        <!-- <button class="prev prev-accessories"><i class="fa-solid fa-angle-left"></i></button> -->
                        <div class="child child-accessories">
                            <!--!? ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                        <?php 
                        foreach ($i_acc as $res)
                            {?>
                            <div class="card card-accessories">  <!-- card-->
                                <figure class="product-card">
                                    <img src="images/accessories/<?php echo $res[6]?>" alt="Face mask" class="product-card__image" />
                                    <figcaption class="product-card__caption">
                                        <header class="product-card__header">
                                            <h2 class="product-card__title"><?php echo $res[1]?></h2>
                                            <div class="product-card__items">
                                                <p class="product-card__subtitle"><?php echo $res[2]?></p>
                                            </div>
                                        </header>
                                        <footer class="product-card__footer">
                                            <span class="product-card__price"><?php echo "$".$res[3]?></span>
                                            <button class="product-card__button">
                                                <span class="product-items"><?php echo $res[8]?></span>
                                            </button>
                                        </footer>
                                        <click class="parent_btn">
                                            <a href="details_card.php?ID=<?php echo $res[0] ?>"><div class="btn">View</div></a>
                                        </click>
                                    </figcaption>
                                </figure>
                            </div>
                            <?php } ?>
        
                            <!--? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
        
                        </div>
                        <!-- <button class="next next-accessories"><i class="fa-solid fa-angle-right"></i></button> -->
                    </div>
                    <div class="buttons">
                        <button id="prev-accessories"><i class="fa-solid fa-angle-left"></i></button>
                        <button id="next-accessories"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
                    <!--@ //////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Phones -->
                <div class="phonet">
                    <h3 class="title" id="phone"><span>P</span>hone</h3>
                    <div class="container">
                        <!-- <button class="prev prev-phone"><i class="fa-solid fa-angle-left"></i></button> -->
                        <div class="child child-phone">
                        <!--!? ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                        <?php 
                        foreach ($i_pho as $res)
                            {?>
                            <div class="card card-phone">  <!-- card-->
                                <figure class="product-card">
                                    <img src="images/phone/<?php echo $res[6]?>" alt="Face mask" class="product-card__image" />
                                    <figcaption class="product-card__caption">
                                        <header class="product-card__header">
                                            <h2 class="product-card__title"><?php echo $res[1]?></h2>
                                            <p class="product-card__subtitle"><?php echo $res[2]?></p>
                                        </header>
                                        <footer class="product-card__footer">
                                            <span class="product-card__price"><?php echo "$".$res[3]?></span>
                                            <button class="product-card__button">
                                                <span class="product-items"><?php echo $res[8]?></span>
                                            </button>
                                        </footer>
                                        <click class="parent_btn">
                                            <a href="details_card.php?ID=<?php echo $res[0] ?>"><div class="btn">View</div></a>
                                        </click>
                                    </figcaption>
                                </figure>
                            </div>
                            <?php } ?>

                            <!--? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                        </div>
                        <!-- <button class="next next-phone"><i class="fa-solid fa-angle-right"></i></button> -->
                    </div>
                    <div class="buttons">
                        <button id="prev-phone"><i class="fa-solid fa-angle-left"></i></button>
                        <button id="next-phone"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                </div>
                    <!--@ //////////////////////////////////////////////////////////////////////////////////// -->
                <!-- Laptops -->
                <div class="laptops">
                    <h3 class="title" id="laptop"><span>L</span>aptop</h3>
                        <div class="container">
                            <!-- <button class="prev prev-laptop"><i class="fa-solid fa-angle-left"></i></button> -->
                            <div class="child child-laptop">
                            <!--!? ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            <?php 
                        foreach ($i_lap as $res)
                            {?>
                            <div class="card card-laptop">  <!-- card-->
                                <figure class="product-card">
                                    <img src="images/laptop/<?php echo $res[6]?>" alt="Face mask" class="product-card__image" />
                                    <figcaption class="product-card__caption">
                                        <header class="product-card__header">
                                            <h2 class="product-card__title"><?php echo $res[1]?></h2>
                                            <p class="product-card__subtitle"><?php echo $res[2]?></p>
                                        </header>
                                        <footer class="product-card__footer">
                                            <span class="product-card__price"><?php echo "$".$res[3]?></span>
                                            <button class="product-card__button">
                                                <span class="product-items"><?php echo $res[8]?></span>
                                            </button>
                                        </footer>
                                        <click class="parent_btn">
                                            <a href="details_card.php?ID=<?php echo $res[0] ?>"><div class="btn">View</div></a>
                                        </click>
                                    </figcaption>
                                </figure>
                            </div>
                            <?php } ?>

            
                                <!--? ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
                            </div>
                            <!-- <button class="next next-laptop"><i class="fa-solid fa-angle-right"></i></button> -->
                        </div>
                        <div class="buttons">
                            <button id="prev-laptop"><i class="fa-solid fa-angle-left"></i></button>
                            <button id="next-laptop"><i class="fa-solid fa-angle-right"></i></button>
                        </div>
                </div>
                <!-- @ //////////////////////////////////////////////////////////////////////////////////////-->
            </div>
        </div>
        <!--! //////////////////////////////////////////////////////////////////////////////////// -->
        <!-- Start About -->
        <div class="aboutt" id="about">
            <div class="container">
                <h3 class="title"><span>A</span>bout</h3>
                <p>Less is more work</p>
                <div class="about-content">
                    <div class="image">
                        <img src="images\about.jpg" alt="">
                    </div>
                    <div class="text">
                        <p>
                            Sell New/Used Mobile Phones with best price, private cell mission is very simple:<br>
                            &nbsp;&nbsp;-&nbsp;Make our customers feel happy<br>
                            &nbsp;&nbsp;-&nbsp;Sell all kinds of mobile phone, laptop
                        </p>
                        <hr>
                        <p>
                            Installing and maintaining <span class="cam">CAMERAS <img src="./images/camera/camera.png"> </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End About -->

        <!--! //////////////////////////////////////////////////////////////////////////////////// -->

        <!-- Start Contact -->
        <?php
            $ss="SELECT * FROM admin;";
            $query=mysqli_query($conn,$ss);
            $r_profile=mysqli_fetch_array($query);
        ?>
        <div class="contactt" id="contact">
            <div class="container">
                <h3 class="title"><span>C</span>ontact</h3>
                <p>We are born to create</p>
                <div class="info">
                    <p class="label">Feel free to drop us a line at:</p>
                    <a href="mailto:<?php echo($r_profile[2]); ?>?subject=Contact" class="link"><?php echo($r_profile[2]); ?></a>
                    <div class="social">
                        Find Us On Social Networks
                        <a href="https://instagram.com/treetech3?igshid=MzRlODBiNWFlZA=="><i class="fab fa-instagram"></i></a>
                        <a href="http://wa.me/961<?php echo($r_profile[3]); ?>"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100000015840420&mibextid=ZbWKwL"><i class="fab fa-facebook"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact -->

        <!--! //////////////////////////////////////////////////////////////////////////////////// -->

        <!-- Start Footer -->
        <div class="footer">
            <div class="container">
                <div class="chield">
                    <div class="icon">
                        <img src="images/logo.ico" alt="">
                    </div>
                    <div class="second">
                        <div class="text">
                            <h2>Contact Me</h2>
                        </div>
                        <div class="phone-number">
                            <p id="ph_nb"></p>
                        </div>
                        <div class="text">
                            <h2>WE ARE SOCIAL</h2>
                        </div>
                        <div class="media">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-whatsapp"></i>
                            <i class="fab fa-instagram"></i>
                        </div>
                    </div>
                    <div class="third">
                        <div class="text">
                            <h2>Designed by</h2>
                        </div>
                        <div class="author">
                            <p class="hassan">
                                Hassan Diab
                            </p>
                            <p class="number"><a href="http://wa.me/96171294053">71 - 294 053</a></p>
                        </div>
                        <div class="author">
                            <p class="ali">
                                Ali Diab
                            </p>
                            <p class="number"><a href="http://wa.me/96178960057">78 - 960 057</a></p>
                        </div>
                    </div>
                </div>
                <div class="final">
                    <p class="copyright">
                        &copy; 2023 
                        <span>Tree Tech </span>
                        All Right Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>

        </form>
    <!-- End Footer -->
    <script>
        var x = '<?php echo($nb = $r_profile[3]); ?>'
        x = x.split("");
        x = x[0] + x[1]+ " - " + x[2] + x[3] + " " + x[4] + x[5] + " " + x[6] + x[7];
        document.getElementById("ph_nb").innerHTML = x;
    </script>
    <script src="./JQuery/jquery-3.6.4.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>