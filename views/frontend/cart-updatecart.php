<?php
use App\Libraries\Cart;

$arr_qty = $_POST['qty'];
foreach($arr_qty as $id => $qty)
{
    Cart::updateCart($id, $qty);
}
print_r($qty);
?>