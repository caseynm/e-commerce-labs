<?php

require('../settings/connection.php');

// inherit the methods from Connection
class Product extends Connection{

	//Product Functions
	function add_product($category, $brand, $title, $price, $desc, $image, $keywords){
		// return true or false
		return $this->query
		("insert into products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) values
			('$category', '$brand', '$title', '$price', '$desc', '$image', '$keywords')");
	}

	function delete_one_product($id){
		// return true or false
		return $this->query("delete from products where product_id = '$id'");
	}

	function update_product($id, $category, $brand, $title, $price, $desc, $keywords){
		// return true or false
		return $this->query("update products set product_cat='$category', product_brand='$brand', product_title='$title',product_price='$price', 
			product_desc='$desc', product_keywords='$keywords' where product_id = '$id'");
	}

	function select_all_products(){
		// return array or false
		return $this->fetch("select * from products");
	}

	function select_one_product($id){
		// return associative array or false
		return $this->fetchOne("select * from products where product_id='$id'");
	}

	function search_product($keywords){
		// return associative array or false
		return $this->fetch("select * from products where product_title LIKE '%$keywords%' or product_keywords LIKE '%$keywords%'");
	}



	//Brand Functions
	function add_brand($name){
		// return true or false
		return $this->query("insert into brands(brand_name) values('$name')");
	}

	function delete_one_brand($id){
		// return true or false
		return $this->query("delete from brands where brand_id = '$id'");
	}

	function update_one_brand($id, $name){
		// return true or false
		return $this->query("update brands set brand_name='$name' where brand_id = '$id'");
	}

	function select_all_brands(){
		// return array or false
		return $this->fetch("select * from brands");
	}

	function select_one_brand($id){
		// return associative array or false
		return $this->fetchOne("select * from brands where brand_id='$id'");
	}


	//Categories Functions
	function add_category($name){
		// return true or false
		return $this->query("insert into categories(cat_name) values('$name')");
	}

	function delete_one_category($id){
		// return true or false
		return $this->query("delete from categories where cat_id = '$id'");
	}

	function update_one_category($id, $name){
		// return true or false
		return $this->query("update categories set cat_name='$name' where cat_id = '$id'");
	}

	function select_all_categories(){
		// return array or false
		return $this->fetch("select * from categories");
	}

	function select_one_category($id){
		// return associative array or false
		return $this->fetchOne("select * from categories where cat_id='$id'");
	}


}

?>