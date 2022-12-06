<?php
require_once "ShoppingCart.php";
session_start();

// Dacă utilizatorul nu este conectat redirecționează la pagina de autentificare ...
if (!isset($_SESSION['loggedin'])) 
{
    header('Location: Index.html');
    exit;
}

//Pentru membrii inregistrati
$member_id = $_SESSION['id'];
$shoppingCart = new ShoppingCart();
if (!empty($_GET["action"])) 
{
    switch ($_GET["action"]) 
    {
        case "add":
            if (!empty($_POST["cantitate"])) 
            {

                $productResult = $shoppingCart->getProductByCode($_GET["id"]);

                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);

                if (!empty($cartResult)) 
                {
                    // Modificare cantitate in cos
                    $newQuantity = $cartResult[0]["cantitate"] + $_POST["cantitate"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } 
                else 
                {
                    // Adaugare in tabelul cos
                    $shoppingCart->addToCart($productResult[0]["id"], $_POST["cantitate"], $member_id);
                }
            }
            break;

        case "remove":
            // Sterg o singura inregistrare
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;

        case "empty":
            // Sterg tot cosul
            $shoppingCart->emptyCart($member_id);
            break;
    }
}
?>


<HTML>

<HEAD>
    <TITLE>Cos</TITLE>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style>
        divtitlu {
            text-align: center;
            color: mediumslateblue;
            text-decoration:  underline;
            text-transform: uppercase;
            font-family: Georgia;
            font-size: 35px;
        }

        divimg{
            position: absolute;
            top: 300px;
            right: 0;
            width: 100px;
            height: 100px;
            border: 3px solid #F0F0F0;

        }

        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
        }

        body {
            background-image: url("backgroundCos.jpeg");
            background-size: 1300px 600px;
            background-repeat: no-repeat;        }

        divlink{
            text-align: right;
            color: rgb(244, 50, 205);
            text-decoration: underline;
            font-family: Georgia;
            font-size: 25px; 
            position: absolute;
            top: 300px;
            left: 0;
            width: 250px;
            height: 100px;
            border: 3px solid #F0F0F0;
        }
    </style>
</HEAD>

<BODY>
    <div id="shopping-cart">
        <divtitlu class="txt-heading">
            <div class="txt-heading-label">Cos Cumparaturi</div> 
        </divtitlu>
        <?php
        $cartItem = $shoppingCart->getMemberCartItem($member_id);
        if (!empty($cartItem)) 
        {
            $item_total = 0;
        ?>
            <table cellpadding="10" cellspacing="1" style="width:100%">
                <tbody>
                    <tr>
                        <th style="text-align: center;"><strong>Nume</strong></th>
                        <th style="text-align: center;"><strong>Categorie</strong></th>
                        <th style="text-align: center;"><strong>Stare</strong></th>
                        <th style="text-align: center;"><strong>Cantitate</strong></th>
                        <th style="text-align: center;"><strong>Pret</strong></th>
                        <th style="text-align: center;"><strong>Stergere produs</strong></th>
                    </tr>
                    <?php
                    foreach ($cartItem as $item) {
                    ?>
                        <tr>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><strong><?php echo $item["nume"]; ?></strong></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $item["categorie"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $item["stare"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo $item["cantitate"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo "$" . $item["pret"]; ?></td>
                            <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><a href="Cos.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="icon-delete" width="20" height="20" title="Remove Item" /></a></td>
                         </tr>
                    <?php
                        $item_total += ($item["pret"] * $item["cantitate"]);
                    }
                    ?>
                    <tr>
                        <td colspan="4" text-align=right><strong>Total:</strong></td>
                        <td style="text-align: center; border-bottom: #F0F0F0 1px solid;"><?php echo "$" . $item_total; ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php
        }
        ?>
    </div>
    <divimg><a id="btnEmpty" href="cos.php?action=empty"><img src="empty-cart.png" alt="empty-cart" width="100" height="100" title="Empty Cart"/></a></divimg>
    <divlink>
        <a href="Store.php">Revenire la produse</a></br>
        <a href="Logout.php">Logout</a>
    </divlink>
    <?php //require_once "product-list.php"; 
    ?>

</BODY>

</HTML>