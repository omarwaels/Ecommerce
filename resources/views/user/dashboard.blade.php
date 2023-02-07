<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @if(!isset($_SESSION["user"]))
    <h1>redirect</h1>
    <script>window.location = "/login";</script>

    @else
    <div>
        <a href={{url('home')}} ><i style="font-size: 20px ; margin: 20px" class="fa-solid fa-arrow-left">&nbsp;&nbsp;&nbsp;B A C K</i></a>
    </div>
    <h1 style="text-align: center ; margin-bottom: 25px;color: goldenrod">Hello :  "{{$_SESSION["user"][0]->userName}}", Your name has gold color </h1>
    <table class="table table-striped">
        <thead>
            <td>User name</td>
            <td>ID</td>
            <td>Email</td>

            <td>Role</td>
            <td>Operation</td>
          </thead>
          <tbody>
            @foreach ($usersInfo as $userInfo)

            <tr >
                @if ($userInfo->id == $_SESSION["user"][0]->id)
                <td style="color: goldenrod">{{ $userInfo->userName }}</td>
                @else
                <td >{{ $userInfo->userName }}</td>
                @endif
                <td>{{ $userInfo->id }}</td>
                <td>{{ $userInfo->userEmail }}</td>

                    @if ($userInfo->userRole == 0 )
                    <td>User</td>
                    @elseif ($userInfo->userRole == 1)
                    <td>Admin</td>
                    @elseif ($userInfo->userRole == 2)
                    <td>Moderator</td>
                    @elseif ($userInfo->userRole == 3)
                    <td>Owner</td>
                    @endif

                    <td>

                        <a href={{url('RankUp?id='.$userInfo->id)}} type="button" class="btn btn-success">Rank UP</a>
                        <a href={{url('RankDown?id='.$userInfo->id)}} type="button" class="btn btn-secondary">Rank Down</a>
                        <a href={{url('Remove?id='.$userInfo->id)}} type="button" class="btn btn-danger">Remove</a>
                    </td>

            </tr>
            @endforeach


          </tbody>
    </table>
        @if (isset($result))
            <h1 style="text-align: center ; margin-top: 50px">{{$result}}</h1>
        @endif
    @endif


</body>
</html>
