<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Magbago</title>
        <link href="/css/app.css" rel="stylesheet">
        <!-- <link rel="icon" href="/img/magbago logo.png" type="image" sizes="16x16"> -->
    </head>

    <body class="welcome-body">
        <div class="ultimate">

            <div class="home"> 
               <div class="home-container">
                <h1> Home </h1> 
               </div>
            </div>
            <div class="nav">
                <div class="nav-container">
                <a href="profile"> <i class="fas fa-user"></i>&nbsp; Profile </a>
                <a href="interest"><i class="far fa-star"></i>&nbsp; Your Interests </a>
                </div>
            </div>
            <div class="home-posts">
            @foreach($posts as $post)
                <div class="posts" >
                    <div class="posts-container">
                        <div class="posts-img">
                            @if ($post->Img != '')
                            <img src="{{ asset('/storage/img/'.$post->Img) }}">
                            @endif
                        </div>
                        <div class="posts-title">
                            <h1>{{ $post->Title }}</h1>
                            <hr>
                        </div>
                        <div class="interest-button">
                            <button onclick="viewPost({{ $post }})"> view </button>
                            <a href="{{ 'interested/'.$post->id }}"><i class="fas fa-star"></i></a> 
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="add-post-button">
                <button onclick="create()"><i class="fas fa-lightbulb"></i>&nbsp; Add Something Interesting </button>
            </div>
            <div class="select-label">
                <h1> Select category </h1>
                <form class="select-category" action="" method="">
                @csrf
                    <select name="category" id="category">
                        <option value="scientific-technological">scientific-technological</option>
                        <option value="sociopolitical">sociopolitical</option>
                    </select>
                    <button class="select-button" type="submit"> select </button>
                </form>
            </div>
        </div>

        <div id="view" class="modal">
                <div class="modal-content">
                    <button onclick="closePost()"> x </button>
                    <h1> View Post </h1>
                    <hr>
                    <label> title </label>
                    <h1 id="viewTitle" name="viewTitle">a</h1>
                    <hr>
                    <label> description </label>
                    <br>
                    <p class="p" id="viewDesc"  name="viewDesc" placeholder="Description"></p>
                    <img>
                </div> 
            </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>