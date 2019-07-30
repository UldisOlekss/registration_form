<?php
require_once 'class/Database.php';
// require_once 'app/userFormHandle.php';
$db = new Database();

if (!empty($_POST)) {
    // if ($_POST['password'] !== $_POST['repeat_password']) {
        
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        echo ($email);
        echo ($password);

        $db->setNewUser($email, $password);
        header("Location: index.php");
    // }
}
/*
if (isset($_POST['login'])) {
    $userHash = getHashByEmail($email);
    if (password_verify($_POST['password'], $userHash)) {
        // loggin success
        $id = getUserIdByEmail($email);
        $_SESSION['user_id'] = $id;
    } else {
        echo 'User not found';
    }
}
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="stylesheets/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Rubik&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/26a0a7a9e4.js"></script>
</head>
<body>
    <?php if (isset($_SESSION['user_id'])): ?>
        <?= 'Hello, user!' ?>
    <?php endif; ?>
    <div class="form-container">
        <h1 class="form-title">Log in</h1>
        <form method="post" name="login">
            <div class="form-content">
                <div class="row">
                    <input type="email" name="email" placeholder="email" required/>
                </div>
                <div class="row">
                    <input type="password" name="password" placeholder="password" required/>
                </div>
            </div>
            <div class="row">
                <input class="button" type="submit" value="login"/>
            </div>
        </form>
    </div>
    <div class="form-container">
        <h1 class="form-title">Register</h1>
        <form method="post" name="register">
            <div class="form-content">
                <div class="row">
                    <input type="text" name="email" placeholder="email" required/>
                </div>
                <div class="row">
                    <input type="password" name="password" placeholder="password" required/>
                </div>
                <div class="row">
                    <input type="password" name="repeat_password" placeholder="repeat password" required/>
                </div>
            </div>
            <div class="row">
                <input class="button" type="submit" value="register"/>
            </div>
        </form>
    </div>
</body>
</html>