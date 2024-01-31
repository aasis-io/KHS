<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="form-container">
        <h2>Login</h2>
        <form action="" novalidate>
            <div class="input-content">
                <div class="label-container">
                    <label for="email">Email</label>
                </div>
                <input type="text" name="email" placeholder="Enter your e-mail" class="inputs" required />
            </div>
            <div class="input-content">
                <div class="label-container">
                    <label for="password">Password</label>
                </div>
                <input type="password" name="password" placeholder="Enter your password" class="inputs" id="passwordField" required />
                <i class="fa-solid fa-eye-slash" id="password-hidden"></i>
                <i class="fa-solid fa-eye hide" id="password-shown"></i>

            </div>
            <button type="submit">Sign In</button>
        </form>
        <p>Not Registered? <a href="register.php">Sign Up Here</a></p>
    </div>

    <script src="https://kit.fontawesome.com/1f2d50e34f.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>