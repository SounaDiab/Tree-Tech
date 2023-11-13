<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/details_card.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
    <?php 
        include("connect.php");

        if(isset($_GET["ID"])){
            $card = "SELECT i.*,c.Name FROM items i,categories c WHERE i.Item_ID=".$_GET["ID"]." AND i.Cat_ID=c.id";
            $r_card = mysqli_query($conn, $card);
            $i_card = mysqli_fetch_all($r_card); 

            foreach ($i_card as $res)
            {?>
            
        <div class="blurr">
            <div class="details_cardd" id="details_cardd">
                <div class="nav_cardd">
                    <div class="info">Info</div>
                    <div class="Exit"><a href="index.php"><img src="./images/Exit.ico" alt="Exit" width="40px" height="40px"></a></div>
                </div>
                <div class="body_card">

                    <div class="name_card"><?php echo $res[1];?></div>

                    <div class="image">
                        <img src="images/<?php echo $res[9]?>/<?php echo $res[6]?>" alt="Tree Tech">
                    </div>
                    
                    <div class="p_description pi">
                        <div class="Description_card N">Description</div>
                        <textarea  class="result_c" cols="30" rows="1" disabled><?php echo $res[2];?></textarea>
                    </div>

                    <div class="p_price pi">
                        <div class="price_card N">Price</div>
                        <div class="result_c"><?php echo $res[3];?></div>
                    </div>

                    <div class="p_status pi">
                        <div class="status_card N">Status</div>
                        <div class="result_c"><?php echo $res[5];?></div>
                    </div>

                    <div class="p_nb_items pi">
                        <div class="nb_items_card N">Nb_items</div>
                        <div class="result_c"><?php echo $res[8];?></div>
                    </div>

                    <div class="p_date pi">
                        <div class="date_card N">Date</div>
                        <div class="result_c"><?php echo $res[4];?></div>
                    </div>
                </div>
            </div>
            <div class="picture">
                <img src="images/<?php echo $res[9]?>/<?php echo $res[6]?>" alt="Tree Tech">
            </div>
        </div>

    <?php }}?>

    </form>
</body>
</html>