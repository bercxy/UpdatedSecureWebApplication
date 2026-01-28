<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // TEMP values for demo
    $_SESSION['user_id']  = 1;
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['role']     = $_POST['role'];

    // Redirect based on role
    if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'supervisor') {
        header("Location: pages/admin/view_all_bookings.php");
    } else {
        header("Location: index.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Temporary Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="card" style="max-width: 400px; margin: 80px auto;">
        <h2>Temporary Login (Demo)</h2>

        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="admin_demo" required>
            </div>

            <div class="form-group">
                <label>Role</label>
                <select name="role" required>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="supervisor">Supervisor</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="width:100%;">
                Login
            </button>
        </form>

        <p style="margin-top:10px; font-size:12px; color:#666;">
            Demo-only login. No authentication performed.
        </p>
    </div>
</div>

</body>
</html>
