<?php
    if($loginStatus){
        header("Location: ?page=dashboard");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
</head>
<body>
    <h1>Mari kita login</h1>
    <form action="?action=login" method="post">
        <input type="text" name="user">
        <input type="password" name="pass">
        <input type="submit" value="Login" name="login">
    </form>
    <?php if(isset($_GET['msg'])) echo $_GET['msg']; ?>
</body>
</html>