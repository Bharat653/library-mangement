<?php
session_start();
require 'connection.php';

if(isset($_GET["approveid"])){
    
    $issue_id = $_GET['approveid'];

    $database = new database;
    $result = $database->getApproval(['status' => '1', 'id' =>$issue_id]);
    // print_r($result);
    // exit();
    header("location:issue_request.php");
    exit();
}
?>