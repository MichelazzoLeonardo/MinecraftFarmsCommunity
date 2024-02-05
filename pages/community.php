<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-16">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../style/style-main.css">
    <?php
    if(!isset($_COOKIE['user'])) {
        setcookie('page', 'community.php', time() + 86400, '/');
        header('Location:login.php');
    }
    ?>
</head>
<body>
<div class="parent-header">
    <div class="header">
        <div class="div-logo">
            <img class="logo" src="../img/background/logo-minecraft.svg" alt="logo-minecraft.svg">
        </div>
        <br>
        <div class="header-buttons">
            <a class='header-button' href='community.php'>HOME</a>
            <?php
            if ($_COOKIE['user'] != 'guest') {
                echo "<a class='header-button' href='myFarms.php'>" . $_COOKIE['user'] . "</a>";
                echo "<a class='header-button' href='logout.php'>LOGOUT</a>";
            }
            if ($_COOKIE['user'] == 'guest')
                echo "<a class='header-button' href='login.php'>LOGIN</a>";
            ?>
        </div>
        <div class="parent-div-search">
            <div class="div-search">
                <form action="community.php" method="post">
                    <input class="search-bar" type="search" name="search" placeholder="search a farm">
                    <input class="search-button" type="submit" value="__">
                </form>
            </div>
        </div>
    </div>
</div>


<div class="parent-container">
    <h1 class="title" style="padding-top: 5%;">COMMUNITY</h1>
    <br><br>

    <?php
    require 'classes/DB.php';

    $conn = DB::getConnection();

    $query = "SELECT name, version, rates, tutorial FROM farm;";
    $farms = $conn->query($query);

    if ($farms->num_rows > 0) {
        while($row = $farms->fetch_assoc()) {
            if ($row['tutorial'] != "")
                $tutorial = "<a class='ref' style='font-size: x-large' href='".$row['tutorial']."' target='_blank'>Tutorial</a>";
            else $tutorial = '';

            echo "
            <div class='container'>
            <p class='name' style='font-weight: bold; font-size: xx-large'>" . $row['name'] . "</p>
            <div class='internal-div'>
                <div class='sub-div'>
                    <p class='text'><b>Versione:</b> " . $row['version'] . "</p>
                    <p class='text'><b>Produzione:</b><br>" . $row['rates'] . "</p>
                    " . $tutorial . "
                </div>
            </div>
            </div>
            <br><br>
            ";
        }
    } else {
        echo "<h3 class='title'>Wow, such empty</h3>";
    }
    ?>
</div>
</body>
</html>
