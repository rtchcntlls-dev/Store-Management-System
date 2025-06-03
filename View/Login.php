<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/Style.css">
    <title>Store Portal</title>
</head>
<body>
    <div class="container">
        <div>
            <img src="Assets/logo.png" alt="logo" style="width:80px;">
            <h3>Store Portal</h3>
        </div>
        <form action="" method="POST" >
            <?php if (!empty($errors['general'])): ?>
                    <div class="" style="text-align:center;background-color:darkred;">
                        <span style="color:white;"><?php echo $errors['general']; ?></span>
                        <a style="margin-left:100px;padding:5px 10px;border:1px solid white;color:white;" href="">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
            <?php endif; ?> 
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user); ?>" autofocus>
                <?php if (!empty($errors['username'])): ?>
                    <p class="text-danger"><?php echo $errors['username']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo htmlspecialchars($password); ?>">
                <?php if (!empty($errors['password'])): ?>
                    <p class="text-danger"><?php echo $errors['password']; ?></p>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
                <div class="text-center my-2">
                    <hr> or <hr>
                </div>
                <button name="new" type="submit" class="btn btn-secondary">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
