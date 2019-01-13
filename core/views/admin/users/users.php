<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div style="padding-left: 0">
        <p class="create"><a href="/users/create">Add user</a></p>
        <table>
            <tr>
                <th class="header" colspan="6">List of all users</th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Detailed</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($usersList as $usersItem): ?>
                <tr>
                    <td><?= $usersItem['id'] ?></td>
                    <td><?= $usersItem['name'] ?></td>
                    <td><?= $usersItem['surname'] ?></td>
                    <td><a href="/users/detailed/<?= $usersItem['id'] ?>">detailed</a></td>
                    <td><a href="/users/update/<?= $usersItem['id'] ?>">update</a></td>
                    <td><a href="/users/delete/<?= $usersItem['id'] ?>">delete</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php echo $pagination->get(); ?>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>