<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gatepass Software - Login</title>

    <link rel="stylesheet" href="<?= base_url('Assets/css/bootstrap.min.css') ?>">
    <script src="<?= base_url('Assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('Assets/js/bootstrap.bundle.min.js') ?>"></script>

    <style>
        body{
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;

            background:url("https://plus.unsplash.com/premium_photo-1702217998652-b9b795f52d5f?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D") center center no-repeat;
            background-size:cover;
        }

        /* little dark overlay for readability */
        body::before{
            content:"";
            position:absolute;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.4);
        }

        .login-card{
            position:relative;
            width:100%;
            max-width:400px;
            padding:30px;
            border-radius:10px;
            background:white;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .brand{
            font-weight:600;
            color:#007bff;
        }
    </style>
</head>

<body>

<div class="login-card">
    <h4 class="text-center mb-4 brand">Gatepass Software</h4>

    <form action="/ProductionEff/LoginUser" method="post">
        
        <div class="form-group mb-3">
            <label>User Name</label>
            <input type="text" name="UserId" class="form-control"
                   placeholder="Enter User Id" required maxlength="100">
        </div>

        <div class="form-group mb-4">
            <label>Password</label>
            <input type="password" name="Password" class="form-control"
                   placeholder="Enter Password" required maxlength="20">
        </div>

        <button type="submit" class="btn btn-primary btn-block">
            Login
        </button>
    </form>
</div>

</body>
</html>
