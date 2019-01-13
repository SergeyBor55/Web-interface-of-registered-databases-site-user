<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div class="main">
        <?php
        if (isset($errors) && is_array($errors)) {
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p><br>";
            }
        } ?>
        <h3>Edit user data</h3><br>
        <form class="contact" action="#" method="post">
            <label>Name<br>
                <input type="text" name="name" required="required" value="<?= $user['name'] ?>"></label><br>
            <label>Surname<br>
                <input type="text" name="surname" required="required" value="<?= $user['surname'] ?>"></label><br>
            <label>Login<br>
                <input type="text" name="login" required="required" value="<?= $user['login'] ?>"></label><br>
            <label>Password<br>
                <input type="password" name="password" required="required"></label><br>
            <label>Date<br>
                <input type="date" name="date" required="required" value="<?= $user['date'] ?>"></label><br>
            <label>Gender<br>
                <select name="gender" required="required">
                    <option value="1" <?php if ($user['gender'] == 1): ?> selected="selected" <?php endif; ?>>Men
                    </option>
                    <option value="0" <?php if ($user['gender'] == 0): ?> selected="selected" <?php endif; ?>>Women
                    </option>
                </select>
            </label><br>
            <input type="submit" name="submit" value="Отправить"><br>
        </form>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>