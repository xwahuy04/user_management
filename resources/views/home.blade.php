<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Document</title>
 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
 <div class="container mt-5">
     @include('messages')
     <h1>Welcome {{$user->first_name. ' ' .$user->last_name }} to Home Page</h1>

     <div class="card" style="width: 400px">
      <img src="{{ asset('images/'.$user->image ) }}" alt="" class="card-img-top" style="width: 100%; height: 200px;">
      <div class="card-body">
       <h4 class="card-title"> {{$user->first_name. ' ' .$user->last_name }}</h4>
       <p class="card-text"> Email : {{$user->email }}</p>
       <p class="card-text"> Phone : {{$user->phone }}</p>
       <a href="{{ url('contact/list') }}" class="btn btn-primary">See Contact</a>
       <a href="{{ url('logout') }}" class="btn btn-primary">Logout</a>
      </div>
     </div>
 </div>
</body>
</html>