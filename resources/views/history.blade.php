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
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                    <a class="nav-link" aria-current="page" href="{{route('viewcart')}}">Cart</a>
                    <a class="navbar-brand" aria-current="page" href="{{route('history')}}">Facture History</a>
                </ul>
                <form class="d-flex" role="search" method="POST">
                    @csrf
                    <button action="{{route('logout')}}"class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    @php
        $a=0;
    @endphp
    @for($i = 0 ; $i < count($fakturs) ; $i++)
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">{{$a+1}}</th>
                            <td>
                                <a href="{{route('detailinvoice', $fakturs[$i]->id)}}">
                                    <h5> Order Invoice:   {{$fakturs[$i]->invoice}}</h5>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @php 
                $a++;
            @endphp
    @endfor
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>