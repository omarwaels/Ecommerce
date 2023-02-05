<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{url('css/profile.css')}}>
    <title>Document</title>
</head>
<body>
    <div>
        <a href={{url('home')}} ><i style="font-size: 20px ; margin: 20px ;color:rgb(234, 234, 234)" class="fa-solid fa-arrow-left">&nbsp;&nbsp;&nbsp;B A C K</i></a>
    </div>
    <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
        <div class="card p-4">
            <div class=" image d-flex flex-column justify-content-center align-items-center">
                <img src={{url('images/unknown.jpg')}} alt="photo" style="width:200px; height: 120px ">
                <span class="name mt-3">{{$_SESSION["user"][0]->userName}}</span>
                <span class="idd">{{$_SESSION["user"][0]->userEmail}}</span>
                <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                    <span class="idd1">Oxc4c16a645_b21a</span>
                    <span><i class="fa fa-copy"></i></span>
                </div>
                <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                    <span class="number">1069 <span class="follow">Followers</span></span> </div> <div class=" d-flex mt-2"> <button class="btn1 btn-dark">Edit Profile</button> </div> <div class="text mt-3">   </div> <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span> <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span> </div> <div class=" px-2 rounded mt-4 date "> <span class="join">Joined May,2021</span> </div> </div> </div>
</div>
</body>
</html>
