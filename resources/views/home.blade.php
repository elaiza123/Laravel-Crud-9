<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/resources/resources/css/style.css">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel</title>
</head>
<body style="background-color: 	rgb(191, 64, 127)">
  <div style="font-size: 100px;color: red;text-align: center;background-color: aqua;"> Elaiza May Loretche Laravel Crud </div>
  @auth
  <p>Congrats you are logged in.</p>
  <form action="/logout" method="POST">
    @csrf
    <button>Log out</button>
  </form>

  <div class="reg" style="border: 3px solid rgb(0, 0, 0);background-color: burlywood;">
    <h2 style="text-align: center">Create a New Post</h2>
    <form style="align-content: center" action="/create-post" method="POST">
      @csrf
      <input type="text" name="title" placeholder="post title">
      <textarea name="body" placeholder="body content..."></textarea>
      <button>Save Post</button>
    </form>
  </div>

  <div style="border: 3px solid black;">
    <h2 style="text-align: center;color: aquamarine;">All Posts</h2>
    @foreach($posts as $post)
    <div style="background-color: rgb(224, 176, 255); padding: 10px; margin: 10px;">
      <h3>{{$post['title']}} by {{$post->user->name}}</h3>
      {{$post['body']}}
      <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
      <form action="/delete-post/{{$post->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button>Delete</button>
      </form>
    </div>
    @endforeach
  </div>

  @else
  <div>
    <div style="border: 3px solid yellow;display: flex;justify-content: center;align-items: baseline;gap: 10px;padding: 100px;background-color: gainsboro;">
    <h2>Register</h2>
    <form action="/register" method="POST">
      @csrf
      <input name="name" type="text" placeholder="name">
      <input name="email" type="text" placeholder="email">
      <input name="password" type="password" placeholder="password">
      <button>Register</button>
    </form>
  </div>
  <div style="border: 3px solid yellow;display: flex;justify-content: center;align-items: baseline;gap: 10px;padding: 100px;background-color: gainsboro;">
    <h2>Login</h2>
    <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>Log in</button>
    </form>
  </div>
  @endauth
</div>

  
</body>
</html>