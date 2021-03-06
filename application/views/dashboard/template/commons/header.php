<!DOCTYPE html>
<html>
<title><?php echo $title ?></title>
<meta charset="UTF-8">
<link rel="icon" href="<?=base_url('assets/img/thumb.png')?>" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('assets/css/w3s.css');?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.Jcrop.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/css/dropzone.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert-master/dist/sweetalert.css');?>">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<script type="text/javascript" src="<?php echo base_url('assets/vendor/jquery/jquery.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/commons/config.js');?>"></script>

<body class="w3-light-grey">

<div class="w3-bar w3-top w3-teal w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <span class="w3-bar-item w3-left">Dashboard</span>
  <span class="w3-bar-item w3-right"><a href="<?=base_url('logout')?>"><i class="fa fa-sign-out" title="Sair"></i></span></a></span>
  <span id="qtdContato" class="w3-bar-item w3-right"></span>
  
</div>



