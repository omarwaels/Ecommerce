

<?php
    use Illuminate\Support\Facades\Http;
    $data = Http::get('https://dummyjson.com/products/'.$id)->json();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        li{
            font-weight: 600;
        }
    </style>
</head>
<body>

</body>
</html>



<div class="container mt-4">
    <div class="row">
        <div class="col-4">
            <img src={{url($data['images'][0])}} alt="s" style="width: 100%;">
        </div>
        <div class="col-6">
            <ul class="ms-5">

                <li>category :{{ $data['category']}}</li>
                <li>description :{{ $data['description']}}</li>
                <li>title :{{ $data['title']}}</li>



                <li>price :{{ $data['price']}}</li>
                <li>brand :{{ $data['brand']}}</li>

            </ul>


        </div>

    </div>
</div>


