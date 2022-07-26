<?php
$msg ="";
if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['username'])&&isset($_POST["password"])){
        require "model/userModel.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user = new userModel;
        if($user->checkAdmin($username,$password)){
            session_start();
            $_SESSION["isLogin"] = $username;
            $_SESSION["userID"] = $user ->id;
            header("location:home.php");
        }
        else{
            $msg= "<div class='alert alert-danger'>wrong username or passwprd</div>";
        }
    }
}
?>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
    <title>Admin Control</title>
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="codes/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="codes/shCore.css">
    <link rel="stylesheet" type="text/css" href="codes/demo.css">
    <link rel="stylesheet" href="css/bootstrap-select-country.min.css">
    <style type="text/css" class="init">

    </style>
    <style>select {height: 40px;} .hideit{display:none;}
        a {color:black;}
        a:hover {          text-decoration: none;}
        .animate{animation-name: fade;
            animation-duration: 0.8s;}
        @keyframes fade {
            0%{
                transform: translateY(20px);
                opacity: 0;
            }
            100%{}
        }
    </style>
    <script type="text/javascript" language="javascript" src="js/jquery-3.2.1.slim.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="codes/jquery.dataTables.js">
    </script>
    <script type="text/javascript" language="javascript" src="codes/shCore.js">
    </script>
    <script type="text/javascript" language="javascript" src="codes/demo.js">
    </script>
</head>
<body>
<div class="col-lg-6 col-md-6 col-sm-10" style="margin: auto;margin-top: 50px;">
    <h2 class="text-center">TNZELAT APP</h2>
    <form method="post">
        <div class="form-group">
            <label for="email">User Name:</label>
            <input type="text" class="form-control" placeholder="Enter User Name" name="username">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password">
        </div>
        <?php if($msg != ""){echo $msg;}?>
        <button type="submit" name="submit" class="btn btn-primary " >Log in</button>
    </form>
</div>
<script src="js/popper.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>
<script src="js/bootstrap-select-country.min.js"> </script>
</body>
</html>
