<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div class="main">
        <h3 class="delete">Delete user №<?= $id ?></h3>
        <p>Do you want to delete a user?</p>
        <form method="POST">
            <input type="submit" name="submit" value="Delete">
        </form>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>