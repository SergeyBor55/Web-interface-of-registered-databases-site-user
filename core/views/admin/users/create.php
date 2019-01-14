<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div class="main">
        <?php
        if (isset($errors) && is_array($errors)) {
            foreach ($errors as $error) {
                echo "<p class='error'>$error</p><br>";
            }
        } ?>
        <h3>Add user</h3><br>
        <form class="contact" action="#" method="POST">
            <label>Name<br>
                <input type="text" name="name" placeholder="Jim" value="<?= $options['name'] ?>" required="required"></label><br>
            <label>Surname<br>
                <input type="text" name="surname" placeholder="Smith" value="<?= $options['surname'] ?>"
                       required="required"></label><br>
            <label>Date<br>
                <input type="date" name="date" value="<?= $options['date'] ?>" required="required"></label><br>
            <label>Login<br>
                <input type="login" name="login" placeholder="smith2000" value="<?= $options['login'] ?>"
                       required="required"></label><br>
            <label>Password<br>
                <input type="password" name="password" value="<?= $options['password'] ?>" required="required"></label><br>
            <label>Gender<br>
                <select name="gender" required="required">
                    <option value="1" <?php if ($options['gender'] == 1): ?> selected="selected" <?php endif; ?>>Men</option>
                    <option value="0" <?php if ($options['gender'] == 0): ?> selected="selected" <?php endif; ?>>Women</option>
                </select>
            </label><br>
            <input type="submit" name="submit" value="Enter"><br>
        </form>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>
