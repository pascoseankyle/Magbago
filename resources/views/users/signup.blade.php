<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Magbago</title>
        <link href="/css/app.css" rel="stylesheet">
        <link rel="icon" href="favicon.png" type="image" sizes="16x16">
    </head>

    <body class="welcome-body">
        <div class="signup">
            <h1> Add New Account </h1>
            <hr>
            <form action="signup" method="POST" enctype="multipart/form-data">
                @csrf
                <input id="name" name="name" type="text" placeholder="Name" required>
                <input id="email" name="email" type="text" placeholder="Email" required>
                <input id="password" name="password" type="password" placeholder="Password" required>
                <input type="file" id="img" name="img">
                <button type="submit" class="signup-button">Sign in</button>
                <button onclick="login()" type="button" class="back">login</button>
            </form>
        </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>