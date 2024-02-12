<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}

require "connection.php";

$getall = $database->getbooks();
// print_r("<pre>");
// print_r($getall);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bGlicmFyeXxlbnwwfHwwfHx8MA%3D%3D');
        }
    </style>
</head>

<body>
    <!-- <h1 style="color: white;">Users Panel</h1> -->
    <?php require_once "bar/userupperbar.php" ?>

    <div>
        <table class="table table-green" style="width: 58%;
    margin: 70px auto;
    background-color: white;
    border-radius: 4px;">
            <thead>
                <!-- <tr>
                    <th scope="col">Book Name</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Picture</th>
                </tr> -->
            </thead>
            <tbody>
                <?php
                foreach ($getall as $data) {
                    // print_r($data);
                    // exit();
                    echo "<tr>";
                    echo "<td><img src='./images/" . $data['picture'] . "' style='height:90px;'></td>";
                    echo "<td>" . $data['book_name']    . "</td>";
                    echo "<td>" . $data['author_name']    . "</td>";
                    echo "<td>" . $data['price']    . "</td>";

                    echo "<td><button class='btn btn-warning' onclick=\"window.location.href='request_data.php?requestid=" . $data['id'] . "'\">Request</button></td>";
 
                  
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>