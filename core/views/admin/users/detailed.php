<?php include_once 'core/views/admin/header_admin.php'; ?>
    <div style="padding-left: 0">
        <table>
            <tr>
                <th class="header" colspan="2">Information about users</th>
            </tr>
            <tr>
                <td>ID</td>
                <td><?= $user['id'] ?></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><?= $user['name'] ?></td>
            </tr>
            <tr>
                <td>Surname</td>
                <td><?= $user['surname'] ?></td>
            </tr>
            <tr>
                <td>Login</td>
                <td><?= $user['login'] ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><?= $user['password'] ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?= ($user['gender'] == 1) ? 'Men' : 'Women' ?></td>
            </tr>
            <tr>
                <td>Date</td>
                <td><?= $user['date'] ?></td>
            </tr>
        </table>
    </div>
<?php include_once 'core/views/admin/footer_admin.php'; ?>