<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}
require 'connection.php';


if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['book_name'] == "") || ($_REQUEST['category'] == "") || ($_REQUEST['author'] == "") || ($_REQUEST['sbn'] == "") || ($_REQUEST['price'] == "")) {
        echo "All fields Required";
    } else {
        $result = $database->books();
        // print_r("<pre>");
        // print_r($result);

        if ($result) {
            echo "Added successfully";
        } else {
            echo "Not added";
        }
    }
}
// $database = new database;


$authordata = $database->getauthor();
$categorydata = $database->getcategory();

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

    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Add book</span></div>
            <form action="book.php" method="post" enctype="multipart/form-data" >
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row"  >
                            <i class="fas fa-book"></i>
                            <input type="text" name="book_name" placeholder="Book Name" required>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-list"></i>
                            <select name="category" class="form-control input-sm" style="padding-left: 3.5rem" >
                                <option>Choose category</option>
                                <?php foreach ($categorydata as $data) : ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['category_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-at"></i>
                            <select name="author" class="form-control input-sm" style="padding-left: 3.5rem">
                                <option>Choose author</option>
                                <?php foreach ($authordata as $data) : ?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['author_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <input type="text" name="author" placeholder="Author" required> -->
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fa-brands fa-pinterest"></i>
                            <input type="text" name="sbn" placeholder="SBN number" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-image"></i>
                            <input type="file" name="picture" placeholder="Book picture" >
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="row">
                            <i class="fas fa-rupee-sign"></i>
                            <input type="text" name="price" placeholder="Price" required>
                        </div>
                    </div>
                </div>

                <div class="row button">
                    <input type="submit" value="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
    <?php require_once "bar/script.php"; ?>
</body>

</html>