<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href={{asset('css/additem.css')}}> --}}
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                    <a class="navbar-brand" aria-current="page" href="{{route('createitem')}}" style="display:flex; padding:0px;margin:0px 10px 0px 10px; align-items:center;">Add</a>
                    <a class="nav-link" aria-current="page" href="{{route('createcategory')}}">create category</a>
                </ul>
            </div>
        </div>
    </nav>  
    <form action="{{route('updated', $item->id)}}" method="POST" style="margin:20px" enctype="multipart/ form-data">
        @csrf
        @method('patch')
        <label for="" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="" value="{{$item->name}}">
        
        <label for="" class="form-label">Category</label>
        <select name="category_id"class="form-select" aria-label="Default select example">
            <option selected value="{{$item->category_id}}">{{$item->category->categoryName}}</option>
            @foreach($cat as $cats)
                <option value="{{$cats->id}}">{{$cats->categoryName}}</option>
            @endforeach
        </select>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="formFile" name="image">
        </div>
        <label for="" class="form-label">Price</label>
        <input type="number" name="price" class="form-control" id="" value="{{$item->price}}">

        <label for="" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control" id="" value="{{$item->stock}}">

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