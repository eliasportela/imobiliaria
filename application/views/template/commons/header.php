<!DOCTYPE html>
<html>
<title><?=$title?></title>
<link rel="icon" href="<?=base_url('assets/img/thumb.png')?>" type="image/x-icon">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?=base_url('assets/css/w3s.css')?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url('assets/vendor/sweetalert-master/dist/sweetalert.css');?>">

<script src="<?=base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/commons/config.js');?>"></script>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.mySlides {display:none};
.w3-badge {height:13px;width:13px;padding:0}
</style>
<body class="w3-light-gray">
  
<div class="w3-container w3-padding-32 w3-white" style="max-width: 100%">
	<div class="w3-row">
		<div class="w3-col m6 w3-center">
			<a href="<?=base_url();?>" class="w3-bar-item"><img class="w3-image" src="<?=base_url('assets/img/site/logo.png')?>"></a>
		</div>
		<div class="w3-col m6 w3-center" style="margin-top: 2%">
			<h2 class="w3-opacity w3-wide"><i class="fa fa-phone"></i> <a href="tel:+5502122222222" style="text-decoration: none;">Telefone: (16)3733-2343</a></h2>	
		</div>
	</div>
</div>

<div class="w3-container w3-pink w3-padding w3-hide-large w3-hide-medium">
  <div class="w3-bar w3-wide">
    <div class="w3-right">
      <span onclick="$('#menuCelular').toggle()" class="w3-bar-item w3-button w3-mobile w3-hover-pink"><i class="fa fa-bars fa-2x"></i></span>
    </div>
    <div id="menuCelular" style="display: none;">
      <a href="#projects" class="w3-bar-item w3-button w3-mobile w3-border-top w3-padding-16"><i class="fa fa-building-o"></i> Imóveis</a>
      <a href="#about" class="w3-bar-item w3-button w3-mobile w3-border-top w3-padding-16"><i class="fa fa-home"></i> Empresa</a>
      <a href="#contact" class="w3-bar-item w3-button w3-mobile w3-border-top w3-padding-16"><i class="fa fa-envelope-o"></i> Contato</a>
    </div>
  </div>
</div>

<!-- Navbar (sit on top) -->
<div class="w3-container w3-pink w3-padding w3-hide-small">
  <div class="w3-bar w3-wide">
    <div class="w3-center">
      <a href="<?=base_url('imoveis')?>" class="w3-button w3-border-right w3-hover-pink "><i class="fa fa-building-o"></i> Imóveis</a>
      <a href="#projects" class="w3-button w3-border-right w3-hover-pink"><i class="fa fa-building-o"></i> À Venda</a>
      <a href="#projects" class="w3-button w3-border-right w3-hover-pink"><i class="fa fa-building-o"></i> Locação</a>
      <a href="<?=base_url('quem-somos')?>" class="w3-button w3-border-right w3-hover-pink"><i class="fa fa-home"></i> Empresa</a>
      <a href="<?=base_url('contato')?>" class="w3-button w3-hover-pink"><i class="fa fa-envelope-o"></i> Contato</a>
    </div>
  </div>
</div>
