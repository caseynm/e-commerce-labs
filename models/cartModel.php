<?php
require('../settings/connection.php');

// inherit the methods from Connection
class Cart extends Connection{

    //Cart Functions
	function add_to_cart($p_id, $ip_add, $c_id, $qty){
		// return true or false
        if(isset($_SESSION['name'])){
            return $this->query
            ("insert into cart (p_id, ip_add, c_id, qty) values ('$p_id', '$ip_add', '$c_id', '$qty')");
        } else {
            return $this->query
		    ("insert into cart (p_id, ip_add, qty) values ('$p_id', '$ip_add', '$qty')");
        }
	}

	function delete_from_cart($p_id, $ip_add, $c_id){
		// return true or false
		if(isset($_SESSION['name'])){
            return $this->query("delete from cart where p_id = '$p_id' and c_id ='$c_id'");
        } else {
            return $this->query("delete from cart where p_id = '$p_id' and ip_add = '$ip_add'");
        }
	}

    function delete_all_from_cart($ip_add, $c_id){
		// return true or false
		if(isset($_SESSION['name'])){
            return $this->query("delete from cart where c_id ='$c_id'");
        } else {
            return $this->query("delete from cart where ip_add = '$ip_add'");
        }
	}

	function update_cart($p_id, $ip_add, $c_id, $qty){
		// return true or false
		if(isset($_SESSION['name'])){
            return $this->query("update cart set qty='$qty' where p_id = '$p_id' and c_id ='$c_id'");
        } else {
            return $this->query("update cart set qty='$qty' where p_id = '$p_id' and ip_add ='$ip_add'");
        }
	}

	function select_from_cart($ip_add, $c_id){
		// return array or false
		return $this->fetch("select * from cart inner join products on cart.p_id = products.product_id 
            where ip_add='$ip_add' or c_id='$c_id'");
	}

    
    function add_payment($amt, $customer_id, $order_id, $currency, $payment_date){
		// return true or false
		return $this->query("insert into payment (amt, customer_id, order_id, currency, payment_date) VALUES ('$amt', '$customer_id', '$order_id', '$currency', '$payment_date')");
	}

    function add_order($customer_id, $invoice_number, $date, $status){
		// return true or false
		return $this->query("insert into orders (customer_id, invoice_no, order_date, order_status) values ('$customer_id', '$invoice_number', '$date', '$status')");
	}

    function add_order_details($order_id,  $p_id, $qty){
        // return true or false
        return $this->query("insert into orderdetails (order_id, product_id, qty) values ('$order_id',  '$p_id', '$qty')  ");

    }

	function select_order($result){
		// return true or false
        return $this->fetch("select * from orders where order_id ='$result'");
    }
}

?>