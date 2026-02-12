<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link rel="stylesheet" href="<?= base_url('Assets/css/bootstrap.min.css') ?>">
<script src="<?= base_url('Assets/js/bootstrap.bundle.min.js') ?>"></script>

<style>
    .topbar{
        padding:12px 24px;
        background:linear-gradient(135deg, #0d6efd, #4dabf7);
        color:white;
        display:flex;
        align-items:center;
        justify-content:space-between;
        box-shadow:0 4px 12px rgba(0,0,0,0.15);
    }

    .left-section{
        display:flex;
        align-items:center;
        gap:12px;
    }

    .logo{
        background:white;
        padding:4px;
        border-radius:8px;
    }

    .info-text{
        font-size:13px;
        line-height:1.2;
        opacity:0.95;
    }

    .title{
        font-size:20px;
        font-weight:700;
        letter-spacing:0.5px;
    }

    .right-section{
        font-size:14px;
    }

    .username{
        font-weight:700;
        background:rgba(255,255,255,0.2);
        padding:5px 10px;
        border-radius:20px;
        margin-left:6px;
    }
</style>
</head>

<body>

<div class="topbar">

    <!-- Left -->
    <div class="left-section">
        <img src="<?= base_url('Assets/Klassic_Logo.png') ?>" 
             height="38" 
             class="logo"
             alt="Gatepass">

        <div class="info-text">
            <div>
    Company : <?= isset($_SESSION['sCompanyName']) ? $_SESSION['sCompanyName'] : '' ?>
</div>

<div>
    Site : <?= isset($_SESSION['sSiteName']) ? $_SESSION['sSiteName'] : '' ?>
</div>

   </div>
    </div>

    <!-- Center -->
    <div class="title">
        Gatepass Management System
    </div>

    <!-- Right -->
    <div class="right-section">
        User :
        <span class="username">
            <?= isset($_SESSION) ? $_SESSION['sUserName'] : '' ?>
        </span>
    </div>

</div>

</body>
</html>
