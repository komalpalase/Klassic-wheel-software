<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->load->view('layout/header');
$this->load->view('layout/sidebar');
?>

<h2>USER: <?php echo $this->session->userdata('username'); ?></h2>

<h3>Klassic Wheels Ltd. – Welcome to Klassic Group<h3>

<div style="
    background:white;
    padding:20px;
    border-radius:5px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
">
    <h5>Overview</h5>
    <p>......................................</p>
</div>

<?php
$this->load->view('layout/footer');
?>
