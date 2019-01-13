<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div class="main">
        <h3>Authentication</h3><br>
        <form class="contact" action="#" method="POST">
            <label>Login<br>
                <input type="text" name="login" placeholder="smith2000" value="<?= $login ?>"
                       required="required"></label><br>
            <label>Password<br>
                <input type="password" name="password" value="<?= $password ?>"></label><br>
            <input type="submit" name="submit" value="Enter"><br>
        </form>
        <?php
        if (isset($errors) && is_array($errors)) {
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p><br>";
            }
        } ?>
        <div class="clr"></div>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>