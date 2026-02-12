<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php if(isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

    <form method="post" action="<?php echo site_url('LoginUser/authenticate'); ?>">


        <label>Username</label>
        <input type="text" name="username" required><br><br>

        <label>Password</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
