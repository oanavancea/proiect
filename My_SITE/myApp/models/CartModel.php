<?php

class CartModel extends DBModel{

    public function removeProduct() {
        if(!empty($_SESSION["cart_item"])) {
            $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            $parts = parse_url($url);

            if(!empty($parts['query'])) {
                parse_str($parts['query'], $query);

                if(!empty($query['action'] && $query['action'] === 'remove')) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                        if($query['ID'] == $v["ID"])
                            unset($_SESSION["cart_item"][$k]);				
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
            }
        }
    }


    public function displayCart (){
        $this->removeProduct();

        $cartHtml = '';

        if(isset($_SESSION["cart_item"])){
            $total_quantity = 0;
            $total_price = 0;

            $cartHtml .= '
            <div id="shopping-cart">
            <div class="txt-heading text-center mt-3 fw-semibold">Shopping Cart</div>
            <table class="mx-5" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">ID</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
            </tr>	
            ';

            foreach ($_SESSION["cart_item"] as $item){
                $item_price = $item["quantity"] * $item["price"];
                $cartHtml .= '
                    <tr>
                        <td><img style="width:10%" src=" ' . $item["image"] . '" class="cart-item-image" />' . $item["name"] . '</td>
                        <td>' . $item["ID"] . '</td>
                        <td style="text-align:right;">' . $item["quantity"] . '</td>
                        <td  style="text-align:right;"> $' . $item["price"] . '</td>
                        <td  style="text-align:right;"> $' . number_format($item_price,2) . '</td>
                        <td style="text-align:center;"><a href="cart?action=remove&ID=' . $item["ID"] . '" class="btnRemoveAction"><img src="myApp/img/icon-delete.png" alt="Remove Item" /></a></td>
                    </tr> ' . 
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["price"]*$item["quantity"]);

            }

            $cartHtml .= '
            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right">' . $total_quantity . '</td>
                <td align="right" colspan="2"><strong> $' . number_format($total_price, 2) . '</strong></td>
                <td></td>
            </tr>
            </tbody>
            </table>
            </div>';
        } else {
            $cartHtml .= '<div class="no-records text-center mt-3 fw-semibold">Your Cart is Empty!</div>';
        }
        return $cartHtml;

    }


}