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
                    <button action="{{route('register')}}"class="btn btn-success">Register</button>
                    <button action="{{route('login')}}"class="btn btn-outline-primary" >Login</button>
                </div>
            </div>
        </div>
    </nav>
    <form action="{{route('registered')}}" method="POST" style="margin:20px">
        @csrf
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="">
        
        <label for="" class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
        
        <label for="" class="form-label">Phone Number</label>
        <input type="number" name="tlp" class="form-control" id="">
        
        <label for="" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="">
        
        <label for="" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="">
        
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