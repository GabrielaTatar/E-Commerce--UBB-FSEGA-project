<?php
session_start();

if (!isset($_SESSION['loggedin'])) 
{
    header('Location: Index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Pagina de acasa</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        body {
            background-image: url("drugstore.jpg");
            background-size: 1300px ;
            background-repeat: no-repeat;
        }
        h1 {
            text-transform: uppercase;
        }
         divLink {
            text-align: left;
            color: lightgreen;
            font-family: Georgia;
            font-size: 25px;
        }
        div2 {
            text-align: left;
            color: lightgreen;
            font-family: Georgia;
            font-size: 35px;

        }
    </style>
</head>

<body class="loggedin">
    <nav class="navtop">
        <divLink>
            <h1>Home</h1>
            <a href="Store.php"><i class="fas fa-usercircle"></i>Magazin</a></br>
            <a href="Logout.php"><i class="fas fa-sign-outalt"></i>Logout</a>
        </divLink>
    </nav>
    
    <div2 class="content">
        <p>Bine ati revenit, <?= $_SESSION['name'] ?>!</p>
    </div2>
</body>

</html>