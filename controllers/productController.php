<?php

require('../models/productModel.php');

//Product Controllers

function add_product_controller($category, $brand, $title, $price, $desc, $image, $keywords){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->add_product($category, $brand, $title, $price, $desc, $image, $keywords);

}

function delete_product_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->delete_one_product($id);

}

function update_product_controller($id, $category, $brand, $title, $price, $desc, $keywords){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->update_product($id, $category, $brand, $title, $price, $desc, $keywords);

}

function select_all_products_controller(){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_all_products();

}

function select_one_product_controller($id){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->select_one_product($id);

}

function search_product_controller($keywords){
    // create an instance of the Product class
    $product_instance = new Product();
    // call the method from the class
    return $product_instance->search_product($keywords);

}





// Brand Controllers

function add_brand_controller($name){
    // create an instance of the brands class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->add_brand($name);

}

function delete_brand_controller($id){
    // create an instance of the brands class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->delete_one_brand($id);

}

function update_brand_controller($id, $name){
    // create an instance of the brands class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->update_one_brand($id, $name);

}

function select_all_brands_controller(){
    // create an instance of the brands class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->select_all_brands();

}

function select_one_brand_controller($id){
    // create an instance of the brands class
    $brand_instance = new Product();
    // call the method from the class
    return $brand_instance->select_one_brand($id);

}




// Categories Controllers

function add_category_controller($name){
    // create an instance of the category class
    $category_instance = new Product();
    // call the method from the class
    return $category_instance->add_category($name);

}

function delete_category_controller($id){
    // create an instance of the category class
    $category_instance = new Product();
    // call the method from the class
    return $category_instance->delete_one_category($id);

}

function update_category_controller($id, $name){
    // create an instance of the category class
    $category_instance = new Product();
    // call the method from the class
    return $category_instance->update_one_category($id, $name);

}

function select_all_categories_controller(){
    // create an instance of the category class
    $category_instance = new Product();
    // call the method from the class
    return $category_instance->select_all_categories();

}

function select_one_category_controller($id){
    // create an instance of the category class
    $category_instance = new Product();
    // call the method from the class
    return $category_instance->select_one_category($id);

}