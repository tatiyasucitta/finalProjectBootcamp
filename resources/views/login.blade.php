<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/register.css')}}>

</head>
<body>
    <nav class="navbar">
        <div class="container-fluid" >
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="display: flex; justify-content:space-between; align-items:center;">
                <h5 class="pt">PT Meksiko</h5>
                <div class="right">
                    <a href="{{route('register')}}"class="btn btn-outline-success">Register</a>
                    <a href="{{route('login')}}"class="btn btn-primary" >Login</a>
                </div>
            </div>
        </div>
    </nav>    
    <form action="{{route('logined')}}" method="POST" style="margin:20px">
        @csrf
        <label for="" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
        
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="">
        
        @if ($errors->any())
        <li class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </li>
        @endif
        @if(session()->has('success'))
            <p class="alert alert-success"> {{ session()->get('success') }}</p>
        @endif

        <button value="submit" type="submit" class="btn btn-primary" style="margin-top:10px">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>