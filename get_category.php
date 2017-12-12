<?php

    require_once('define_variable.php');

    function get_category(){
        $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
        $query = "select categoryname from category";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);
        
        $ans = "";

        $ans .= "<option selected value='all'>Tất cả</option>";        

        while($row != null){
            $ans .= "<option value='" .$row['categoryname'] ."'>" .$row['categoryname'] ."</option>";
            $row = mysqli_fetch_array($result);
        }

        // echo $query;
        return $ans;
    }
?>



<?php

    // require_once('define_variable.php');

    // function get_category(){
    //     $link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");
    //     $query = "select * from category";
    //     $result = mysqli_query($link, $query);
    //     $row = mysqli_fetch_array($result);
        
    //     $ans = "";

    //     while($row != null){
    //         $url = generateUrlCategory($row['id']);
    //         $ans .= "<a href='" .$url ."'>" ."<li>" .$row['categoryname'] ."</li></a>";
            
    //         $row = mysqli_fetch_array($result);
    //     }
    //     return $ans;
    // }

    // function generateUrlCategory($categoryID){
    //     $url = $_SERVER['PHP_SELF'] ."?" .$_SERVER['QUERY_STRING'];
    //     if(strstr($url, "&searchCategory=") == true){
    //         $url = str_replace(strstr($url, "&searchCategory="), "&searchCategory=" .$categoryID, $url);            
    //     }else{
    //         $url .= "&searchCategory=" .$categoryID;
    //     }return $url;
    // }
?>