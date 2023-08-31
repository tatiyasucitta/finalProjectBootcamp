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
        <a class="text" href="{{route('viewcart')}}">
            <h5 >
                < Back
            </h5>
        </a>
    </nav>
    <form action="{{route('save')}}" method="POST" style="margin:20px" enctype="multipart/form-data">
        @csrf
        <h2>
            Check Out Form
        </h2>
        <label for="" class="form-label">Alamat Pengiriman</label>
        <input type="text" name="address" class="form-control" id="">
        
        <label for="" class="form-label">Kode Pos</label>
        <input type="number" name="postal" class="form-control" id="">
        <br>
        <h5>Invoice</h5>
        @if($items)
            {{$invoice}}
        @endif
        <br>
        
        @if ($errors->any())
            <li class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </li>
        @endif
        @if(session()->has('success'))
            <p class="alert alert-success"> {{ session()->get('success') }}</p>
        @endif
        
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item" style="background-color: rgb(230, 230, 137);"><h4>Item</h4></li>
            <li class="list-group-item" style="background-color: rgb(230, 230, 137);"><h4>Quantity</h4></li>
            <li class="list-group-item" style="background-color: rgb(230, 230, 137);"><h4>Price</h4></li>
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
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
</body>
</html>