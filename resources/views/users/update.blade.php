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
                <h1> Edit Post </h1> 
               </div>
            </div>
            
            <div class="form">
                <div class="form-create">
                    <form method="POST" action=" /updateuser " enctype="multipart/form-data">
                        @csrf
                       
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <label>name</label>
                        <input type="text" name="userName" value="{{ $user->name }}">
                        <label>email</label>
                        <input type="text" name="userEmail" value="{{ $user->email }}">
                        <label>password</label>
                        <input type="text" name="userPassword" value="{{ $user->password }}">

                        <input type="file" id="img" name="img">

                        <button type="submit" class="modal-button"> save </button>
                        <a href="../profile"> back</a>
                    </form>
                </div>
            </div>
            
        </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>