<?php
    session_start();
    if(isset($_GET['bookid']) == false || isset($_GET['quantity']) == false){
        echo "<script>alert('Wrong request')</script>";
    }else{
        $bookid = $_GET['bookid'];
        $quantity = $_GET['quantity'];
    
        if(isset($_SESSION['cart']) == false){
            $_SESSION['cart'] = array();
        }
        //use bookid as a key
        if(isset($_SESSION['cart'][$bookid]) == true){
            $_SESSION['cart'][$bookid] += $quantity;
        }else{
            $_SESSION['cart'][$bookid] = $quantity;
        }

        echo "<script>alert('Add complete')</script>";
    }

    echo "<script>window.history.back()</script>";    
?>