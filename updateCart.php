<?php
    session_start();
    $i = 0;
    while(true){
        if(isset($_GET['bookid' .$i]) && isset($_GET['quantity' .$i])){
            $_SESSION['cart'][$_GET['bookid' .$i]] = $_GET['quantity' .$i];
            $i ++;
        }else break;
    }
    echo "<script>window.location.replace('shoppingCart.php');</script>";    
?>