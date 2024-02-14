<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header("location:login.php");
}

require "connection.php";
if (isset($_GET["requestid"])) {

    $req_id = $_GET['requestid'];
    $database = new database;
    $namebook =  $database->getbookname(["id" => $_GET["requestid"]]);

    //   print_r("<pre>");
    //     print_r($namebook);
    //     exit();

}
// if(isset($_POST["session['auth"])){
//         $sess = $_POST["session['auth"];
//         print_r($sess);
//         exit();
// }
if (isset($_REQUEST['submit'])) {
    if (($_REQUEST['issue_book'] == "") || ($_REQUEST['users'] == "") ) {
        echo "All fields Required";
    } else {
        $result = $database->addissue();

        if ($result) {
            echo "Added successfully";
        } else {
            echo "Not added";
        }
    }
}
 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request_data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Request_data</span></div>
            <form action="request_data.php" method="post">
                <div class="row">
                    <i class="fas fa-at"></i>
                    <input type="text" placeholder="Book Name" value=" <?php echo $namebook['id'] ?>" name="issue_book" required>

                </div>
                <div class="row">
                    <i class="fas fa-at"></i>
                    <input type="text" placeholder="user_email" value="<?php echo $_SESSION["auth"][0]["id"] ?>" name="users" required>
                </div>
                <div class="row button">
                    <input type="submit" value="Send Request" name="submit"> 
                </div>
            </form>
        </div>
    </div>
    <?php require_once "bar/script.php"; ?>
</body>

</html>