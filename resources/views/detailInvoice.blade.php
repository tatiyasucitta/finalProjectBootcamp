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
<nav class="navbar bg-primary" data-bs-theme="dark">
        <a class="text" href="{{route('history')}}">
            <h5 >
                < Back
            </h5>
        </a>
    </nav>
    @if(Session::has('success'))
        <p class="alert alert-success" style="margin:2rem;">{{Session::get('success')}}</p>
    @endif
    <br>
    <h4>
        facture detail of invoice = {{$invoice}}
    </h4>
    <br>
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item"><h4>Item</h4></li>
        <li class="list-group-item"><h4>Quantity</h4></li>
        <li class="list-group-item"><h4>Price</h4></li>
    </ul>  
        @for($i = 0 ; $i< count($items) ; $i++)
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item">
                    <div class="descprice">
                        <div class="desc">
                            <h5 class="card-title">{{$items[$i]->item[0]->name}}</h5>
                            <img src="{{asset('/storage/images/products/'.$items[$i]->item[0]->image)}}" class="card-img-top"  alt="">
                        </div>
                        <p class="card-price">Rp.{{$items[$i]->item[0]->price}}.000,00</p>
                    </div>
                </li>
                <li class="list-group-item"><p class="card-title">X {{$items[$i]->quantity}}</p></li>
                <li class="list-group-item"><p>Rp.{{$items[$i]->item[0]->price*$items[$i]->quantity}}.000,00</p></li>
            </ul>
        @endfor
    </div>
    <div class="total">
        <ul class="list-group">
            <li class="list-group-item list-group-item-success">
                <h4>
                    Total:
                </h4>
                <h4 class="total">
                    Rp.{{$total}}.000,00
                </h4>
            </li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>