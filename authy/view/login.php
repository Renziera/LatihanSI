<?php
    redirectIfAuthenticated();
    require "layouts/header.php";
?>

<h1>Form Login</h1>
    <form action="index.php?action=login" method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input class="btn" type="submit" name="login" value="login">
            <?php if(isset($_GET['msg'])): ?>
                <?php echo "<p>".base64_decode($_GET['msg'])."</p>"; ?>
            <?php endif; ?>
    </form>

<?php
    require "layouts/footer.php";
?>