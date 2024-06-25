<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
        .alert {
            margin-top: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login Employee</h2>
    <form action="{{route('login-employee')}}" method="POST">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <span class="text-danger">@error('email') {{$message}}@enderror</span>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" value="{{old('password')}}" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <span class="text-danger">@error('password') {{$message}}@enderror</span>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
