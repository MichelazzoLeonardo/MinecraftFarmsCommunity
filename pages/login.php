<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-16">
    <title>Login</title>
    <link rel="icon" href="../img/icon/creeper.png">
    <link rel="stylesheet" type="text/css" href="../style/style-login.css">
</head>
<body>
<div class="parent-header">
    <div class="header">
        <div class="div-logo">
            <img class="logo" src="../img/background/logo-minecraft.svg" alt="logo-minecraft.svg">
        </div>
    </div>
</div>
<div class="container">
    <p class="title" >ACCEDI</p>
    <div class="internal-div">
        <div class="sub-div">
            <form action="checkLogin.php" method="post">
                <input class="input" type="text" name="username" placeholder="username" required autofocus><br>
                <input class="input" type="password" name="pw" placeholder="password" required><br><br>
                <input class="button" type="submit" value="LOGIN">
            </form>
        </div>
    </div>
</div>
<div class="refs-div">
    <a class="ref" href="guest.php">Ospite</a>
    <a class="ref" href="register.php">Registrati</a>
</div>
</body>
</html>