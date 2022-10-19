<?php

require('../settings/connection.php');

// inherit the methods from Connection
class Customer extends Connection{

	function add_customer($name, $email, $password, $country, $city, $contact, $image, $role){
		// return true or false
		return $this->query("insert into customer(
            customer_name, customer_email, customer_pass, customer_country,customer_city, customer_contact, customer_image, user_role) 
            values('$name', '$email', '$password', '$country', '$city', '$contact', '$image', '$role')");
	}

    function login($email){
		// return associative array or false
		return $this->fetchOne("select * from customer where customer_email='$email'");
    }

    function delete_one_customer($id){
		// return true or false
		return $this->query("delete from customer where id = '$id'");
	}

	function update_one_customer($id, $name, $description, $qty){
		// return true or false
		return $this->query("update customer set customer_name='$name', description='$description', qty='$qty' where id = '$id'");
	}

	function select_all_customers(){
		// return array or false
		return $this->fetch("select * from customer");
	}

}

?>