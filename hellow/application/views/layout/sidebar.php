<style>
    .sidebar {
        width: 220px;
        background-color: #34495e;
        min-height: 100vh;
        padding-top: 20px;
    }

    .sidebar a {
        display: block;
        color: white;
        padding: 12px 20px;
        text-decoration: none;
    }

    .sidebar a:hover {
        background-color: #1abc9c;
    }

    .submenu {
        padding-left: 20px;
        font-size: 14px;
    }
</style>

<div class="sidebar">

    <a href="<?php echo base_url('index.php/LoginUser/dashboard'); ?>">🏠 Dashboard</a>

    <a href="#">📁 Master</a>
    <div class="submenu">
        <!-- <a href="#"> Item Master</a> -->
         <a href="<?php echo base_url('index.php/ItemMaster'); ?>"> Item Master</a>
        <a href="#"> Company Master</a>
        <a href="#"> Department Master</a>
        <a href="#"> Product Master</a>
        <a href="#"> Machine Master</a>
        <a href="#"> Operation Master</a>
        <a href="#"> Operator Master</a>
    </div>

    <!-- <a href="#">⚙ Production</a>
    <a href="#">📊 Reports</a>
    <a href="#">👤 User Management</a> -->

    <a href="<?php echo base_url('index.php/LoginUser/logout'); ?>">🚪 Logout</a>

</div>

<div class="content">

