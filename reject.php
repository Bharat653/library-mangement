<?php
session_start();
require 'connection.php';

if(isset($_GET["rejectid"])){
    
    $id = $_GET['rejectid'];
    $database = new database;
    $result = $database->getApproval(['status' => '0', 'id' =>$id]);
    header("location:issue_request.php");
    exit();
}

?>