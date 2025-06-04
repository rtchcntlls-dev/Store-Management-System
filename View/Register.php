<?php
    require_once "../Config/Database.php";
    require_once "../Controller/RegisterController.php";

    $controller = new RegisterController($connection);
    $response = $controller->handleRequest();
    $data = $response['data'];
    $errors = $response['errors'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../Assets/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/Style.css">
    <title>Store Admin Registration</title>
</head>
<body>
    <div>
    <div class="logo">
                <img src="public/img/logo.png" alt="logo" style="width:80px;">
                <h2>Register New Admin</h2>
            </div>
            <form action="" method="post">
                <div class="input-group">
                    <label for="fullname">Full Name</label>
                    <div class="input">
                        <input type="text" name="fullname" value="<?php echo htmlspecialchars($data['fullname']); ?>">
                    </div>
                    <?php if (isset($errors['fullname'])): ?>
                        <p class="error"><?php echo $errors['fullname']; ?></p>
                    <?php endif; ?>
                </div>

                <div class="input-group" style="display:flex; gap:10px;">
                    <div>
                        <label for="username">Username</label>
                        <div class="input">
                            <input type="text" name="username" value="<?php echo htmlspecialchars($data['username']); ?>">
                        </div>
                        <?php if (isset($errors['username'])): ?>
                            <p class="error"><?php echo $errors['username']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email">Email</label>
                        <div class="input">
                            <input type="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>">
                        </div>
                        <?php if (isset($errors['email'])): ?>
                            <p class="error"><?php echo $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="input-group" style="display:flex; gap:10px;">
                    <div>
                        <label for="password">Password</label>
                        <div class="input">
                            <input type="password" name="password" value="<?php echo htmlspecialchars($data['password']); ?>">
                        </div>
                        <?php if (isset($errors['password'])): ?>
                            <p class="error"><?php echo $errors['password']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="confirm">Confirm Password</label>
                        <div class="input">
                            <input type="password" name="confirm" value="<?php echo htmlspecialchars($data['confirm']); ?>">
                        </div>
                        <?php if (isset($errors['confirmPassword'])): ?>
                            <p class="error"><?php echo $errors['confirmPassword']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="btn">
                    <div>
                        <button name="register" type="submit" style="background-color:#31b25e;">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>