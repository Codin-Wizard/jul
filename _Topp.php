<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="stilark.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

    <div class="menu material-icons-round" id="menu">menu</div>

    <div class="side-menu" id="side-menu">
        <div class="menu-content">
            <?php
            if ($_SESSION["Rolle"] == "A")
                echo "<a href='./_logout.php'>
                <div class='menu-item login-button' id='login-button'>Logout</div>
            </a>";
            else
                echo "<a href='./login.php'>
                <div class='menu-item login-button' id='login-button'>Login</div>
            </a>";
            ?>
            <a href="./visVinnere.php"><div class="menu-item">Vinnere</div></a>
        </div>
    </div>

    <div class="falling-snow"></div>