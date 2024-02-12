<?php

class database
{
    private $db;
    private $_FILES;
    function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $this->db = new PDO("mysql:host=$servername;dbname=Practice", $username, $password);
            // set the PDO error mode to exception
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    function admindata()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = $this->db->prepare("INSERT INTO `users`(`email`, `password`) VALUES (?,?)");
        $result = $query->execute([$email, $password]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getdata($data)
    {

        $admin = isset($data['admin']) ? $data['admin'] : 1;

        $query = $this->db->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND admin = ?");
        $query->execute([$data['email'], $data['password'], $admin]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return $result;
        }
        return 0;
    }

    function getUserdata($data)
    {

        $admin = isset($data['admin']) ? $data['admin'] : 0;

        $query = $this->db->prepare("SELECT * FROM users WHERE email = ? AND password = ? AND admin = ?");
        $query->execute([$data['email'], $data['password'], $admin]);

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return $result;
        }
        return 0;
    }

    function getalldata()
    {

        $query = $this->db->prepare("select * from users");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) > 0) {
            return $result;
        }
        return 0;
    }

    function updateedit($data)
    {
        $query = $this->db->prepare("update users set email = :email, password =:password where id =:id");
        return $query->execute($data);
    }

    function getedit($data)
    {
        $query = $this->db->prepare("select * from users where id = :id");
        $query->execute($data);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function category()
    {
        $category = $_POST['category'];
        $query = $this->db->prepare("INSERT INTO `category`(`category_name`) VALUES (?)");
        $result = $query->execute([$category]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getcategory()
    {

        $query = $this->db->prepare("select * from category");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        }
        return 0;
    }

    function author()
    {
        $author = $_POST['author'];
        $query = $this->db->prepare("INSERT INTO `author`(`author_name`) VALUES (?)");
        $result = $query->execute([$author]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function getauthor()
    {
        $query = $this->db->prepare("select * from author");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function books()
    {
        $book = $_POST['book_name'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $sbn = $_POST['sbn'];
        $price = $_POST['price'];
        $picture = $_FILES['picture']['name'];

        $query = $this->db->prepare("INSERT INTO `book`(`book_name`,`category_id`,`author_id`,`sbn_number`,`price`,`picture`) VALUES (?,?,?,?,?,?)");
        $result = $query->execute([$book, $category, $author, $sbn, $price, $picture]);

        if ($result) {
            $filename = $_FILES["picture"]["name"]; 
            $tempname = $_FILES["picture"]["tmp_name"];
            $folder = "images/" . $filename;
            echo $folder;
            move_uploaded_file($tempname, $folder);
            return true;
        } else {
            return false;
        }
    }

    function getbooks()
    {
        $query = $this->db->prepare("select books.*,
        COALESCE(category.category_name) AS category_name, 
        COALESCE(author.author_name) AS author_name from book as books inner join category on category.id = books.category_id inner join author on author.id = books.author_id   ");
        $query->execute();

        $result =  $query->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return 0;
        }
    }

    function issuebook(){
        $query = $this->db->prepare("select * from issue inner join book on book.id = issue.book_id inner join users on users.id = issue.users_id  ");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if(count($result) > 0) {
            return $result;
        }
        else {
            return 0;
        }
    }

    function addissue(){

        $issue_book = $_POST['issue_book'];
        $user = $_POST['users'];
 
        $query = $this->db->prepare("INSERT INTO `issue`(`book_id`,`users_id`) VALUES (?,?)");
        $result = $query->execute([$issue_book,$user]);


        if ($result) {
            return true;
        } else {
            return false;
        }
    }

 

    function getbookname($id){
        $query = $this->db->prepare("select * from book where id=:id ");
        $query->execute($id);

        $result = $query->fetch(PDO::FETCH_ASSOC);

        if(count($result) > 0) {
            return $result;
        }
        else {
            return 0;
        }
    }


}
$database = new Database();
