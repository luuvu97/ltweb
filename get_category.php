<?php

    require_once('define_variable.php');

    function get_category(){
        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        $query = "select categoryname from category";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        
        $ans = "";

        $ans .= "<option selected value='all'>All</option>";        

        while($row != null){
            $ans .= "<option value='" .$row['categoryname'] ."'>" .$row['categoryname'] ."</option>";
            $row = mysqli_fetch_array($result);
        }

        return $ans;
    }
?>