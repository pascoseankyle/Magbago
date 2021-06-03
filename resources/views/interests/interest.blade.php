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
                <h1> Interests </h1> 
               </div>
            </div>
            <div class="nav">
                <div class="nav-container">
                <a href="/home"><i class="fas fa-home"></i> &nbsp; Home </a>
                <a href="/profile"><i class="fas fa-user"></i>&nbsp; Profile </a>
                </div>
            </div>
            <div class="home-posts">
            @foreach($interest as $interest)
                <div class="posts">
                    <div class="posts-container">
                        <div class="posts-img">
                            @if ($interest->Img != '')
                            <img src="{{ asset('/storage/img/'.$interest->Img) }}">
                            @endif
                        </div>

                        <div class="posts-title">
                            <h1>{{ $interest->Title }}</h1>
                            
                            <hr>
                        </div>
                        <div class="interest-button">
                            <a href="{{ 'deleteInterest/'.$interest->id }}"> <i class="fas fa-star-half-alt"></i> </a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>