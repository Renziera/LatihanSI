<?php
    redirectIfAuthenticated();
    require "layouts/header.php";
?>

<h1>Form Registrasi</h1>
<form action="index.php?action=register" method="POST">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password">
    <input class="btn" type="submit" name="register" value="register">
        <?php if(isset($_GET['errors'])): ?>
        <?php $errorsArray = unserialize(urldecode(base64_decode($_GET['errors']))); ?>
            <?php foreach($errorsArray as $error): ?>
                <?php echo "<p>$error</p>"; ?>
            <?php endforeach; ?>
        <?php endif; ?>
</form>

<?php
    require "layouts/footer.php";
?>