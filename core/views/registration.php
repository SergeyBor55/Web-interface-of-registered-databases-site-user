<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div class="main">
        <h3>Registration</h3><br>
        <?php
        if ($result) { ?>
            <p>Вы успешно зарегестрировались</p>
        <?php } else { ?>
            <form class="contact" action="#" method="POST">
                <label>Name<br>
                    <input type="text" name="name" placeholder="Jim" value="<?= $name ?>"
                           required="required"></label><br>
                <label>Surname<br>
                    <input type="text" name="surname" placeholder="Smith" value="<?= $surname ?>"
                           required="required"></label><br>
                <label>Date<br>
                    <input type="date" name="date" value="<?= $date ?>" required="required"></label><br>
                <label>Login<br>
                    <input type="login" name="login" placeholder="smith2000" value="<?= $login ?>"
                           required="required"></label><br>
                <label>Password<br>
                    <input type="password" name="password" value="<?= $password ?>" required="required"></label><br>
                <label>Gender<br>
                    <select name="gender" required="required">
                        <option value="1" <?php if ($gender == 1): ?> selected="selected" <?php endif; ?>>Men</option>
                        <option value="0" <?php if ($gender == 0): ?> selected="selected" <?php endif; ?>>Women</option>
                    </select>
                </label><br>
                <input type="submit" name="submit" value="Enter"><br>
            </form>
            <?php
            if (isset($errors) && is_array($errors)) {
                foreach ($errors as $error) {
                    echo "<p class='error'>$error</p><br>";
                }
            }
        } ?>
        <div class="clr"></div>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>