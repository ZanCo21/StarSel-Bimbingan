<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link rel="stylesheet" href="assets/css/login/login_style.css">
</head>
<body>
    <form class="container" method="POST" action="login">
		@csrf
        <div class="group-input">
            <p class="title-input">Hello Again</p>
            <span class="desk-input">Welcome back you've been missed</span>
            <div class="inputan">
                <!-- <box-icon name='envelope'></box-icon> -->
                <iconify-icon class="icon" icon="ic:outline-email"></iconify-icon>
                <input class="input-field" name="email" type="email" placeholder="Email" required>
            </div>
            <div class="inputan">
                <iconify-icon class="icon" icon="mdi:lock"></iconify-icon>
                <input class="input-field" name="password" type="password" placeholder="Password" required>
            </div>
            <span class="link">forgot password ?</span>
            <button type="submit" class="btn-submit">Sign In</button>
        </div>
        <div class="group-img">
            <div class="img-parent">
                <img src="assets/images/login/login.png" width="600" alt="welcome ilustration">
            </div>
        </div>
    </form>
</body>
</html>

