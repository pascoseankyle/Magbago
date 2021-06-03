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
                <a href="home"><i class="fas fa-home"></i>&nbsp; Home </a>
                <a href="interest"><i class="far fa-star"></i>&nbsp; Your Interests </a>
                </div>
            </div>
            <div class="profile">

                <div class="profile-img">
                @foreach($user as $user)
                   <div class="profile-img-container">
                             @if ($user->img != '')
                            <img src="{{ asset('/storage/img/'.$user->img) }}">
                            @endif
                   </div>
                </div>
                <div class="profile-info">
                    <div class="profile-info-container">
                        <h1>{{ $user->name  }}</h1> 
                        <p> Name</p>
                        <hr>
                        <h2>{{ $user->email }}</h2> 
                        <p> Email</p>
                        <hr>
                        <a href="{{ 'editUser/'.$user->id }} " class="button-edit">edit</a>
                        @endforeach
                        <button class="button-logout" onclick="logout()"> logout </button>
                    </div>
                </div>

            </div>
            <div class="your-posts">
                <h1> Your Posts </h1>
            </div>
            <div class="profile-posts">
                @foreach($posts as $post)
                <div class="profile-post">
                    <div class="profile-post-title">
                          <h1> {{ $post->Title }} </h1> 
                    </div>
                    <hr>
                    <a href="{{ 'delete/'.$post->id }}" style="color:red"> <i class="fas fa-minus-circle"></i> </a>
                    <a href="{{ 'edit/'.$post->id }}">view</a>
                </div>
                @endforeach
            </div>

            <div id="editprofile" class="modal">
                <div class="modal-content">
                    <button onclick="closeEditProfile()"> x </button>
                    <h1> Edit Profile </h1>
                    <input id="userName" placeholder="Name">
                    <input id="userEmail" placeholder="Email">
                    <input id="userPassword" placeholder="Password">
                    <br>
                    <button class="modal-button"> save </button>
                </div>
            </div>

        </div>
    </body> 

<script src="https://kit.fontawesome.com/af9f32f664.js" crossorigin="anonymous"></script>
<script src="/js/app.js"></script>
</html>