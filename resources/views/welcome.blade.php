<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/adminhome.css')}}>
    <title>PT Meksiko</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="justify-content:space-between">
                <ul class="navbar-nav">
                    <a class="navbar-brand" aria-current="page" href="/">Home</a>
                    <a class="nav-link" aria-current="page" href="{{route('viewcart')}}">Cart</a>
                </ul>
                <form class="d-flex" role="search" method="POST">
                    @csrf
                    <button action="{{route('logout')}}"class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    @if(Session::has('success'))
        <p class="alert alert-success" style="margin:2rem;">{{Session::get('success')}}</p>
    @endif
    <div class="cardall">
        @foreach($items as $barang)
            @if($barang->stock == 0)
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{asset('/storage/images/products/'.$barang->image)}}" class="card-img-top"  alt="">
                        <h5 class="card-title">{{$barang->name}}</h5>
                        <h6 class="card-text">{{$barang->category->categoryName}}</h6>
                        <p class="card-price">Rp. {{$barang->price}},00</p>
                        <button type="button" class="btn btn-secondary" disabled>OUT OF STOCK</button>

                    </div>
                </div>
            @else
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <img src="{{asset('/storage/images/products/'.$barang->image)}}" class="card-img-top"  alt="">
                        <h5 class="card-title">{{$barang->name}}</h5>
                        <h6 class="card-text">{{$barang->category->categoryName}}</h6>
                        <p class="card-price">Rp. {{$barang->price}},00</p>
                        <p class="card-price">stok: {{$barang->stock}}</p>
                        <div class="cart">
                            <div class="action">
                                <form  action="{{route('cartadd', $barang->id)}}" method="post">
                                    <input type="number" value="1" min="1" max="{{$barang->stock}}" name="quantity" class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                                    style="width: 50px"/>
                                    @csrf
                                    <button type="submit" class="btn btn-success">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>