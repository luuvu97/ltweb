<?php
declare(strict_types = 1);
include_once("config.php");
?>

<?php

$dbConn=mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die ("Không kết nối được MySQL database: ");

mysqli_set_charset($dbConn,"utf8");

function dbQuery($sql)
{
    global $dbConn;
	$result = mysqli_query($dbConn, $sql);
	return $result;
}

function dbAffectedRows()
{
	global $dbConn;

	return mysqli_affected_rows($dbConn);
}

function dbFetchArray($result, $resultType = MYSQLI_NUM) {
	return mysqli_fetch_array($result, $resultType);
}

function dbFetchAssoc($result)
{
	return mysqli_fetch_assoc($result);
}

function dbFetchAll($result, $resultType = MYSQLI_ASSOC){
    return mysqli_fetch_all($result,$resultType);
}

function dbFetchRow($result)
{
	return mysqli_fetch_row($result);
}

function dbFreeResult($result)
{
	return mysqli_free_result($result);
}

function dbNumRows($result)
{
	return mysqli_num_rows($result);
}

function dbSelect($dbName)
{
	return mysqli_select_db($dbName);
}

function dbInsertId()
{
	return mysqli_insert_id();
}


function dbSelectAll($table){
    trim($table);
    $sql = "SELECT * FROM ".$table;
    $result = dbQuery($sql);
    if(dbNumRows($result) >=0){
        $row = dbFetchAll($result);
    }
    return $row;
}

function dbCount($table){
    $sql = "SELECT * FROM ".$table;
    $result = dbQuery($sql);
    return dbNumRows($result);
}
?>
