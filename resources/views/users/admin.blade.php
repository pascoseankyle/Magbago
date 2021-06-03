<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Magbago</title>
        <link href="/css/app.css" rel="stylesheet">
        <link rel="icon" href="favicon.png" type="image" sizes="16x16">
    </head>
    @if($type != 2)
     <h1> NOT AUTHORIZED </h1> 
    @else
    <body class="welcome-body">
        <div class="ultimate">
            
            <div class="home"> 
               <div class="home-container">
                <h1> <i class="fas fa-user"></i>&nbsp; Profile </h1> 
               </div>
            </div>
            <div class="nav">
                <div class="nav-container">
                <div>
            <a href="welcome" class="logout">logout</a>
            </div>
                </div>
            </div>
            <div class="card">
                <h1> Create New Category </h1>
            
                <form method="POST" action="addcat">
                @csrf
                    <input type="text" name="name" placeholder="add new category">
                    <button type="submit">submit</button>
                </form>
            </div>
            <div>
            <div class="cat-list">
            Categories
                @foreach($category as $category)
                    <div class="cat-posts">
                        <h2>{{ $category->name }}</h2>
                        <a class="cat-edit" href="{{ 'editcat/'.$category->id }}">edit</a>
                        <a class="cat-delete" href="{{ 'delcat/'.$category->id }}">delete</a>
                        <br>
                        <hr>
                    </div>
                @endforeach
            </div>
            <div>

        </div>
    </body> 
    @endif

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>