<?php

require('../models/cartModel.php');

//Cart Controllers

function add_to_cart_controller($p_id, $ip_add, $c_id, $qty){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->add_to_cart($p_id, $ip_add, $c_id, $qty);

}

function delete_from_cart_controller($p_id, $ip_add, $c_id){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->delete_from_cart($p_id, $ip_add, $c_id);

}

function delete_all_from_cart_controller($ip_add, $c_id){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->delete_all_from_cart($ip_add, $c_id);

}

function update_cart_controller($p_id, $ip_add, $c_id, $qty){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->update_cart($p_id, $ip_add, $c_id, $qty);

}

function select_from_cart_controller($ip_add, $c_id){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->select_from_cart($ip_add, $c_id);

}

function add_payment_controller($amt, $customer_id, $order_id, $currency, $payment_date){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->add_payment($amt, $customer_id, $order_id, $currency, $payment_date);
}

function add_order_controller($customer_id, $invoice_number, $date, $status){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->add_order($customer_id, $invoice_number, $date, $status);
}

function add_order_details_controller($order_id,  $p_id, $qty){
    // create an instance of the Cart class
    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->add_order_details($order_id,  $p_id, $qty);
}

function select_order_controller($result){

    $cart_instance = new Cart();
    // call the method from the class
    return $cart_instance->select_order($result);
}
