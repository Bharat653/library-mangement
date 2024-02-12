<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}
require 'connection.php';



$getall = $database->getbooks();
// print_r("<pre>");
// print_r($getall);
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | CodingLab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <?php require_once "bar/upperbar.php"; ?>
    <div>
        <div>
            <table class="table table-green">
                <thead>
                    <tr>
                        <th scope="col">Book Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Author Name</th>
                        <th scope="col">SBN Number</th>
                        <th scope="col">Price</th>
                        <th scope="col">Picture</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($getall as $data) {
                        echo "<tr>";
                        echo "<td>" . $data['book_name']    ."</td>";
                        echo "<td>" . $data['category_name'] ."</td>";
                        echo "<td>" . $data['author_name']    ."</td>";
                        echo "<td>" . $data['sbn_number']    ."</td>";
                        echo "<td>" . $data['price']    ."</td>";
                        echo "<td><img src='./images/" . $data['picture'] . "' style='height:90px;'></td>";

                        echo "<td><button class='btn btn-danger' onclick=\"window.location.href='delete/delete2.php?deleteid=" . $data['id'] . "'\">Delete</button></td>";

                        echo "<td><button class='btn btn-success' onclick=\"window.location.href='edit.php?editid=" . $data['id'] . "'\">Edit</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php require_once "bar/script.php"; ?>
</body>

</html>