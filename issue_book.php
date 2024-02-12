<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}
require "connection.php";

if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['users'] == "") || ($_REQUEST['issue_book'] == "")) {
        echo "All fields Required";
    } else {
        $result = $database->addissue();
        // print_r("<pre>");
        // print_r($result);
        // exit();

        if ($result) {
            echo "Added successfully";
        } else {
            echo "Not added";
        }
    }
}

$getuserdata = $database->getalldata();
$getall = $database->getbooks();
// print_r("<pre>");
// print_r($getall);
// exit();
?>
<!DOCTYPE html>
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
    <div class="container m-auto">
        <div class="wrapper">
            <div class="title"><span>Issue Book</span></div>
            <form action="issue_book.php" method="post">
                <div class="row">
                    <i class="fas fa-list"></i>
                    <select name="users" class="form-control input-sm" style="padding-left: 3.5rem;
">
                        <option>Choose email id</option>
                        <?php foreach ($getuserdata as $data) : ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['email']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="row">
                    <i class="fas fa-list"></i>
                    <select name="issue_book" class="form-control input-sm" style="padding-left: 3.5rem;
">
                        <option>Choose Book</option>
                        <?php foreach ($getall as $data) : ?>
                            <option value="<?php echo $data['id']; ?>"><?php echo $data['book_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
         

                <div class="row button" style="margin-top: 4rem;
">
                    <input type="submit" value="submit" name="submit">
                </div>
            </form>
        </div>
    </div>
    <?php require_once "bar/script.php"; ?>
</body>

</html>