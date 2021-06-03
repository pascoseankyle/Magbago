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
                <h1> Create </h1> 
                </div>
            </div>
            <div class="nav">
                <div class="nav-container">
                    <a href="/home"> Home </a>
                    <a href="/profile"> Profile </a>
                    <a href="/interest"> Your Interests </a>
                </div>
            </div>
            <div class="form">
                <div class="form-create">
                    <h1> Create Post! </h1>
                    <hr>
                    <form action="add" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="Title" type="text" placeholder="Post Title" autocomplete="off" required>                    
                        <input name="Description" type="text" placeholder="Description" autocomplete="off" required>
                        <input name="img" type="file">                   
                        <label> Category </label>
                        <select id="category" name="Category">
                        @foreach($cat as $cat)
                            <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                        @endforeach
                        </select>
                        <button type="submit"> post! </button>
                    </form>
                </div>
            </div>

        </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>