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
        <div class="welcome-left">
            <div class="welcome-top"> <h1> Best Post </h1> <hr> </div>
            <div class="welcome-l-container">
                @foreach($post as $post)
                <div class="best-posts">
                    @if ($post->Img != '')
                        <img src="{{ asset('/storage/img/'.$post->Img) }}">
                    @endif
                    <i class="fas fa-star"></i> {{ $post->allInterests }}
                    <div class="best-post-title"> <h1> {{ $post->Title }} </h1>  
                    </div>
                    <div class="best-post-button"> <button onclick="openModal({{ $post }})"> view </button>                   
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="welcome-right">
            <div class="welcome-r-container">
                <div class="welcome-r-card">
                    <form action="login" method="Post"> 
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input id="email" name="email" type="text" placeholder="Email" autocomplete="off">
                        <input id="password" name="password" type="password" placeholder="Password" autocomplete="off">
                        <button class="button-login" type="submit"> Login </button>
                        <hr>
                        <button onclick="signup()" class="button-signup" type="button"> Sign Up </button>
                    </form>
                </div>
            </div>  
        </div>
        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <button onclick="closeModal()" class="close"> x </button>
                <hr>
                <label for="title">Title</label>
                <h1 id="title" name="title"> Title </h1>
                <hr>
                <label for="owner">Creator</label>
                <h2 id="owner"> Owner </h2>
                <hr>
                <label for="description">Description</label>
                <div class="overflow">
                    <p id="description"> Description </p>
                </div>
            </div>
        </div> 
    
    </div>
    </body>

    <script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>
</html>