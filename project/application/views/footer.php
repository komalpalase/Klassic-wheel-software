<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="<?= base_url('Assets/css/bootstrap.min.css') ?>">

<style>
    .footer{
        background:#ffffff;
        padding:12px 24px;
        box-shadow:0 -2px 10px rgba(0,0,0,0.08);
        font-size:14px;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .footer a{
        color:#0d6efd;
        font-weight:600;
        text-decoration:none;
    }

    .footer a:hover{
        text-decoration:underline;
    }
</style>
</head>

<body>

<footer class="footer">
    <div>
        © <?= date('Y') ?> Klassic Wheels Ltd.
    </div>

    <div>
        Website :
        <a href="https://klassicwheels.com" target="_blank">
            klassicwheels.com
        </a>
    </div>
</footer>

</body>
</html>
