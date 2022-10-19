<?php

require('../models/customerModel.php');

function add_customer_controller($name, $email, $password, $country, $city, $contact, $image, $role){
    // create an instance of the customer class
    $customer_instance = new Customer();
    // call the method from the class
    return $customer_instance -> add_customer($name, $email, $password, $country, $city, $contact, $image, $role);

}

function login_controller($email){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->login($email);

} 

function delete_customer_controller($id){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->delete_one_customer($id);

}

function update_customer_controller($id, $name, $description, $qty){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->update_one_customer($id, $name, $description, $qty);

}

function select_all_customers_controller(){
    // create an instance of the customer class
    $customer_instance = new customer();
    // call the method from the class
    return $customer_instance->select_all_customers();

}

?>