<?php

class ProductsModel extends DBModel
{

    public function getProducts()
    {
        $q = "SELECT * FROM	`products`";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addProductToCart() {
        // session_destroy();
        $quantity = 1;
        $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        $parts = parse_url($url);

        if(!empty($parts['query'])) {
            parse_str($parts['query'], $query);
        }

        if(!empty($query['action']) && $query['action'] == 'add') {
            $q = "SELECT * FROM products WHERE ID='" . $query['ID'] . "'";
            $result = $this->db()->query($q);
            $productByID = $result->fetch_all(MYSQLI_ASSOC);
            $itemArray = array($productByID[0]["ID"]=>array('name'=>$productByID[0]["ProductName"], 'ID'=>$productByID[0]["ID"], 'quantity'=>$quantity, 'price'=>$productByID[0]["ProductPrice"], 'image'=>$productByID[0]["ProductImage"]));
            $productExist = false;

            if(!empty($_SESSION["cart_item"])) {
                // check if product exist already in the cart
                foreach ($_SESSION["cart_item"] as $item) {
                    if($productByID[0]["ID"] === $item["ID"]) {
                        $productExist = true;
                        break;
                    }
                }
                if($productExist) {
                    // if product already exist in cart update quantity
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByID[0]["ID"] == $v["ID"]) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $quantity;
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray); // add product to existing cart
                }
            } else {
                $_SESSION["cart_item"] = $itemArray; // add product to existing cart
            }
        }
    }

    public function displayProducts()
    {
        $dataArray = $this->getProducts();
        $this->addProductToCart();

        $productHtml = '';

        if (is_array($dataArray)) {
            $productHtml .= '<div class=" row row-cols-1 row-cols-md-3 g-3 gx-3">' . '';

            // datele din tabel  
            foreach ($dataArray as $product) {
                $array = array_values($product);
                $productHtml .= '
                <form method="post" action="products?action=add&ID=' . $array[0] . '">
                    <div class=" card d-flex mt-5 mx-5">
                        <img class="center-block card-img-top w-50 p-2 " src="' . $array[5] . '"alt="Product Image">
                        <div class="card-body ">
                            <h5 class="card-title">' . $array[1] . '</h5>
                            <p class="card-text">' . $array[2] . '</p>
                            <p class="card-text"><small class="text-muted">PRICE : $' . $array[3] . '</small></p>
                            <input type="submit" value="Add to Cart"/>
                        </div>
                    </div>
                </form>';
            }
            $productHtml .= '</div>';
        }
        return $productHtml;
    }
}