<h1>User Accounts</h1>
<table>
    <thead>
        <tr><th scope="col">Username</th><th scope="col">Full Name</th></tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['full_name']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
