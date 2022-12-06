<?php
require_once "ShoppingCart.php"; 
?>


<HTML>

<HEAD>
    <TITLE>Magazin online </TITLE>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style>
        div1 {
            text-align: center;
            color: mediumslateblue;
            text-decoration:  underline;
            text-transform: uppercase;
            font-family: Georgia;
            font-size: 35px;
        }

        body {
            background-color: lavender	;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

      
    </style>
</HEAD>

<BODY>
    <div id="product-grid">
        <p style="text-align:right;"><strong><a href="logout.php"><button type="button">Logout</a></button></strong></p>
        
        <div1 class="txt-headinglabel">
            <div class="txt-heading-label">PRODUSELE MAGAZINULUI NOSTRU</div>
        </div1>

        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                    <th style="text-align:center;" width="10%">Imagine</th>
                    <th style="text-align:center;" width="20%">Nume</th>
                    <th style="text-align:center;" width="10%">Categorie</th>
                    <th style="text-align:center;" width="30%">Descriere</th>
                    <th style="text-align:center;" width="10%">Stare</th>
                    <th style="text-align:center;" width="10%">Pret</th>
                    <th style="text-align:center;" width="10%">Cantitate</th>
                </tr>

                <?php
                $shoppingCart = new ShoppingCart();
                $query = "SELECT * FROM produse";
                $product_array = $shoppingCart->getAllProduct($query);
                if (!empty($product_array)) 
                {
                    foreach ($product_array as $key => $value) 
                    {
                ?>

                        <tr>
                            <div2 class="product-item">
                                <form method="post" action="Cos.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
                                    <div class="product-image">
                                        <th style="text-align:center;"><img src="<?php echo $product_array[$key]["imagine"]; ?>" width="60px"> 
                                    </div>
                                    <div>
                                        <th style="text-align:center;"><strong><?php echo $product_array[$key]["nume"]; ?></strong></th>
                                    </div>
                                    <div>
                                        <th style="text-align:center;"><?php echo $product_array[$key]["categorie"]; ?></th>
                                    </div>
                                    <div>
                                        <th style="text-align:center;"> <?php echo $product_array[$key]["descriere"]; ?></th>
                                    </div>
                                    <div>
                                        <th style="text-align:center;"><?php echo $product_array[$key]["stare"]; ?></th>
                                    </div>
                                    <div class="product-price">
                                        <th style="text-align:center;"><?php echo "$" . $product_array[$key]["pret"]; ?>
                                    </div>
                                    </th>
                                    <div>
                                        <th style="text-align:center;"><input type="text" name="cantitate" value="1" size="2" /></th>
                                        <th style="text-align:center;"><input type="submit" value="Adauga in cos" class="btnAddAction" /></th>
                                    </div>
                                </form>
                            </div2>
                    <?php
                    }
                }
                    ?>
    </div>
    </tbody>
    </table>

    <?php
                
        $shoppingCartForCategories = new ShoppingCart();

        $category_array = $shoppingCartForCategories->getAllCategories();
        if (!empty($category_array)) 
        {
        foreach ($category_array as $category_key => $category_value) 
        {
    ?>

                
<div class="txt-headinglabel" style="text-align:center;">
            <div1 class="txt-heading-label"><?php echo $category_array[$category_key]["categorie"]?></div1>
        </div>
    <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
                <tr>
                    <th style="text-align:center;" width="10%">Imagine</th>
                    <th style="text-align:center;" width="20%">Nume</th>
                    <th style="text-align:center;" width="10%">Categorie</th>
                    <th style="text-align:center;" width="30%">Descriere</th>
                    <th style="text-align:center;" width="10%">Stare</th>
                    <th style="text-align:center;" width="10%">Pret</th>
                    <th style="text-align:center;" width="10%">Cantitate</th>
                </tr>

                <?php
                $shoppingCart = new ShoppingCart();
                $product_array = $shoppingCart->getAllProductByCategory($category_array[$category_key]["categorie"]);
                if (!empty($product_array)) 
                {
                    foreach ($product_array as $key => $value) 
                    {
                ?>

                        <tr>
                            <div2 class="product-item">
                                <form method="post" action="Cos.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
                                    <div class="product-image">
                                        <th style="text-align:center;"><img src="<?php echo $product_array[$key]["imagine"]; ?>" width="60px"> 
                                    </div>
                                    <div>
                                        <th style="text-align:center;"><strong><?php echo $product_array[$key]["nume"]; ?></strong></th>
                                    </div>
                                    <div>
                                        <th style="text-align:center;"><?php echo $product_array[$key]["categorie"]; ?></th>
                                    </div>
                                    <div>
                                        <th style="text-align:center;"> <?php echo $product_array[$key]["descriere"]; ?></th>
                                    </div>
                                    <div>
                                        <th style="text-align:center;"><?php echo $product_array[$key]["stare"]; ?></th>
                                    </div>
                                    <div class="product-price">
                                        <th style="text-align:center;"><?php echo "$" . $product_array[$key]["pret"]; ?>
                                    </div>
                                    </th>
                                    <div>
                                        <th style="text-align:center;"><input type="text" name="cantitate" value="1" size="2" /></th>
                                        <th style="text-align:center;"><input type="submit" value="Adauga in cos" class="btnAddAction" /></th>
                                    </div>
                                </form>
                            </div2>
                    <?php
                    }
                }
                    ?>
    </div>
    </tbody>
    </table>
    <?php
                    }
                }
                    ?>

</BODY>

</HTML>