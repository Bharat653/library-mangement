<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}
require 'connection.php';

if (isset($_POST['update'])) {

    $id =  $_POST['id'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $database = new database;
    $result = $database->updateedit([
        'id' => $id,
        'email' => $email,
        'password' => $password,
    ]);
    if ($result) {
        echo "Updation successfully";
    } else {
        echo "Not working";
    }
}

if (isset($_REQUEST['submit'])) {

    if (($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")) {
        echo "All fields required";
    } else {
        // $database = new database();
        $result = $database->admindata();
        if ($result) {
            echo "added succesfully";
        } else {
            echo "failed to added";
        }
    }
}
$database = new database;
$getuserdata = $database->getalldata();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
</head>

<body background="">


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
        <div class="container">

            <div class="wrapper">
                <div class="title"><span>DashBoard (Admin)</span></div>
                <form action="dashboard.php" method="post">
                    <!-- <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">dashboard(Admin)</span>
                    </div> -->
                    <div class="form-outline mb-4">
                        <input type="text" id="email" name="email" class="form-control form-control-lg" />
                        <label class="form-label">Enter Your email</label>
                    </div>
                    <div class="form-outline mb-4 password-container">
                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                        <label class="form-label">Password</label>

                    </div>
                    <div class="pt-1 mb-4">
                        <input type="submit" id="done" value="submit" class="btn btn-dark btn-sm" name="submit">
                    </div>

                    <div id="loginAlert" class="alert alert-success" style="display: none;">
                        Login successful!
                    </div>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                </form>
            </div>
        </div>
        <?php require_once "bar/script.php"; ?>
    </body>
    </html>

    <div>
        <div>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($getuserdata as $alldata) {
                        echo "<tr>";
                        echo "<td>" . $alldata['email']    . "</td>";
                        echo "<td>" . $alldata['password']    . "</td>";
                        echo "<td><button class='btn btn-danger' onclick=\"window.location.href='delete/delete1.php?deleteid=" . $alldata['id'] . "'\">Delete</button></td>";

                        echo "<td><button class='btn btn-success' onclick=\"window.location.href='edit.php?editid=" . $alldata['id'] . "'\">Edit</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        </form>
    </div>
    <?php require_once "bar/script.php"; ?>
</body>

</html>