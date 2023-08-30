<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href={{asset('css/cart.css')}}>
    <title>Document</title>
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
    
    @php
        $i =0
    @endphp
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item"><h4>Item</h4></li>
        <li class="list-group-item"><h4>Quantity</h4></li>
        <li class="list-group-item"><h4>Price</h4></li>
    </ul>
        @foreach($items as $barang)
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <div class="descprice">
                        <div class="desc">
                            <h5 class="card-title">{{$barang->item[$i]->name}}</h5>
                            <img src="{{asset('/storage/images/products/'.$barang->item[$i]->image)}}" class="card-img-top"  alt="">
                        </div>
                        <p class="card-price">Rp.{{$barang->item[$i]->price}}.000,00</p>
                    </div>
                </li>
                <li class="list-group-item"><p class="card-title">X {{$barang->quantity}}</p></li>
                <li class="list-group-item"><h5>Rp.{{$barang->item[$i]->price*$barang->quantity}}.000,00</h5></li>
            </ul>
            @php
                $i++
            @endphp
        @endforeach
    </div>
    <div class="total">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success">
                <h4>
                    Total:
                </h4>
                @php
                    $total=0;
                    $a=0
                @endphp
                
                @foreach($items as $barang)
                    @php
                        $total += $barang->item[$a]->price*$barang->quantity
                    @endphp
                    @php 
                        $a++
                    @endphp
                @endforeach
                <h4 class="total">
                    Rp.{{$total}}.000,00
                </h4>
            </li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>