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
        <div class="ultimate">
            
            <div class="home"> 
               <div class="home-container">
                <h1> <i class="fas fa-user"></i>&nbsp; Profile </h1> 
               </div>
            </div>
            <div class="nav">
                <div class="nav-container">
                </div>
            </div>
            <form method="POST" action="/updatecat" enctype="multipart/form-data">
                @csrf
                <input type="text" name="cat_id" value="{{ $cat->id }}">
                <input type="text" name="cat_name" value="{{ $cat->name }}">
                <button type="submit">submit</button>
            </form>
            <div>
            <div>
        </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>