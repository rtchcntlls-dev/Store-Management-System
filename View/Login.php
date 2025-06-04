<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="Assets/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/Style.css">
    <title>Store Portal</title>
</head>
<body>
    <div class="container">
        <div class=" d-flex justify-content-center align-items-center vh-100">
            <div>   
                <img src="Assets/LoginImage.jpg" alt="" class="img-fluid" style="width: 500px">
            </div>
            <form action="" method="POST" class="col-md-3 m-5" >
                <div class="text-center mb-3">
                    <img src="Assets/logo.jpg" alt="logo" style="width:50px;">
                    <h4 class="fw-bold">Store Portal</h4>
                    <p class="text-muted form-text">Hi there! Log in to manage your store and check updates.</p>
                </div>
                <?php if (!empty($errors['general'])): ?>
                    <div class="text-white text-center mb-3 bg-danger p-1">
                        <span><?php echo $errors['general']; ?></span>
                        <a href="" class="text-white">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                <?php endif; ?> 
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo htmlspecialchars($user); ?>" autofocus>
                    <?php if (!empty($errors['username'])): ?>
                        <p class="text-danger" style="font-size: 12px;"><?php echo $errors['username']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo htmlspecialchars($password); ?>">
                    <?php if (!empty($errors['password'])): ?>
                        <p class="text-danger" style="font-size: 12px;"><?php echo $errors['password']; ?></p>
                    <?php endif; ?>
                </div>
                <div class="">
                    <button type="submit" name="login" class="btn btn-success w-100 mb-2">Login</button>
                    <div class="text-center ">
                        <hr class="m-0 p-0"> or <hr class="m-0 p-0">
                    </div>
                    <button name="new" type="submit" class="btn btn-primary w-100 mt-2">Register</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
