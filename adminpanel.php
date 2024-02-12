<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}
require 'connection.php';


if(isset($_REQUEST['submit'])) {

    if(($_REQUEST['email'] == "") || ($_REQUEST['password'] == "")) {
        echo "All fields required";
    }
    else{
        // $database = new database();
        $result = $database->admindata();
        if($result) {
            echo "added succesfully";
        }
        else {
            echo "failed to added";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <section class="vh-100" style="background-color: #9A616D;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="adminpanel.php" method="post">
                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0">Admin Panel</span>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" id="email" name="email" class="form-control form-control-lg" />
                                            <label class="form-label">Enter Your email</label>
                                        </div>
                                        <div class="form-outline mb-4 password-container">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                            <label class="form-label">Password</label>
                                            <!-- <i class="toggle-password fas fa-eye-slash"></i> -->
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        // JavaScript to show the alert after a successful login
        <?php
        if ($isLogged) {
            echo 'document.getElementById("loginAlert").style.display = "block";';
        }
        ?>
    </script>

</body>

</html>