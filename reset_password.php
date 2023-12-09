<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <h2>Password Reset</h2>

    <form action="rest_password_logic.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Reset Password</button>
    </form>

    <form action="rest_password_logic.php" method="post">
        <label for="re-password">re-password:</label>
        <input type="password" id="re-password" name="re-password" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
