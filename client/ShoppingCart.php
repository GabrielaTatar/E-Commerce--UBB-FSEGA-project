<?php
require_once "DBController.php";
class ShoppingCart extends DBController
{
    //Se returneaza produsele
    function getAllProduct()
    {
        $query = "SELECT * FROM produse";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getAllProductByCategory($Category)
    {
        $query = "SELECT * FROM produse where categorie=?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $Category
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }


    function getAllCategories()
    {
        $query = "SELECT DISTINCT categorie FROM produse";

        $productResult = $this->getDBResult($query);
        return $productResult;
    }
    

    //Se trimit produsele din cosul unui client
    function getMemberCartItem($member_id)
    {
        $query = "SELECT produse.*, cos.id as cart_id , cos.cantitate FROM produse, cos WHERE produse.id = cos.produsID AND cos.clientID = ?";
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );

        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    //Se returneaza toate produsele  
    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM produse WHERE id=?";

        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );

        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    //Se returneaza toate produsele din cos dupa un anumit client si produs
    function getCartItemByProduct($product_id, $member_id)
    {
        $query = "SELECT * FROM cos WHERE produsID = ? AND clientID = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    //Se adauga in cos
    function addToCart($product_id, $quantity, $member_id)
    {
        $query = "INSERT INTO cos (produsID, cantitate, clientID) VALUES (?, ?, ?)";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );

        $this->updateDB($query, $params);
    }

    //Se modifica cosul dupa un anumit id de cos
    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE cos SET cantitate = ? WHERE id= ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        $this->updateDB($query, $params);
    }

    //Se sterge din cos dupa un anumit id, un singur item
    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM cos WHERE produsID = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );

        $this->updateDB($query, $params);
    }

    //Se goloseste tot cosul 
    function emptyCart($member_id)
    {
        $query = "DELETE FROM cos WHERE clientID = ?";

        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $member_id
            )
        );

        $this->updateDB($query, $params);
    }
}
