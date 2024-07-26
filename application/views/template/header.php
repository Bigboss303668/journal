<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Journal</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/uikit.css')?>">
	<link rel="stylesheet" type="text/css" href="./assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
	<link rel="icon" href="<?= base_url('assets/img/favicon.ico'); ?>" type="image/x-icon">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins" />

</head>
<style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f4f9;
      margin: 0;
      padding: 0;
    }

    .uk-navbar-container {
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .logo .name {
      font-size: 1.5em;
      font-weight: bold;
      color: #000;
    }

    .uk-navbar-nav>li>a {
      font-size: 16px;
      font-weight: bold;
      color: #2a3b2e;
      text-transform: none;
    }

    .uk-navbar-nav>li.uk-active>a {
      color: #76b041;
      border-bottom: 2px solid #76b041;
    }

    .buttons .uk-button {
      font-size: 14px;
      font-weight: bold;
      text-transform: none;
    }

    .uk-button-primary {
      background-color: #76b041;
      border: none;
    }

    .uk-button-primary:hover {
      background-color: #5e8f32;
    }
  </style>
</head>

<body>
	<nav class="uk-navbar-container" style="background-color: transparent; margin-top: 10px;">
		<div uk-navbar>
			<div class="uk-navbar-left uk-margin-large-left" style="
				font-weight: 700;
				font-size: 30px;
				line-height: 45px;
				color: #000000;">

				<a class="uk-margin-medium-right uk-navbar-item uk-logo logo" href="<?= base_url('') ?>" aria-label="Back to Home" style="font-family: Poppins">
					<img class="uk-inline" src="<?= base_url('assets/img/cmu.png'); ?>" style="width:45px; height: 50px; margin-right:20px"><span class="name">CMU-Journal</span>
				</a>

				<div class="navBar">
					<ul class="uk-navbar-nav uk-tab" style="margin-right: 50px;
					font-style: normal;
					font-weight: bolder;">
						<li class="<?= ($this->uri->segment(1) == '') ? 'uk-active' : null ?>">
							<a href="<?= base_url('') ?>" class="uk-button-text" style="text-transform: none; font-size: 16px; font-family: Poppins;">Home</a>
						</li>
						<li class="<?= ($this->uri->segment(1) == 'articles') ? 'uk-active' : null ?>">
							<a href="<?= base_url('articles') ?>" class="uk-button-text" style="text-transform:none; font-size:16px; font-family: Poppins;">Archive</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="uk-navbar-right uk-margin-medium-right">
				<div class="buttons">
					<p uk-margin>
						<!-- <a href="<?= base_url('register') ?>"><button class="uk-button uk-button-default uk-border-rounded" style="font-family: Poppins; text-transform: none; height: 46px; line-height:100%; width
					: 130px; margin-top:32px">Register</button></a> -->
						<a href="<?= base_url('login') ?>"><button class="uk-button uk-button-primary uk-border-rounded" style="font-family: Poppins; text-transform: none; height: 46px; line-height:100%; width
					: 130px; margin-top:32px">Login</button></a>
					</p>
				</div>
				
				<!-- <div class="responsiveDropdown" style="margin-right: -30px;">
					<button class="uk-button" type="button" uk-toggle="target: #offcanvas-flip" style="height: 50px; background-color: transparent;"><span class="uk-icon" uk-icon="icon: menu; ratio: 1.5"></span></button>
					<div id="offcanvas-flip" uk-offcanvas="flip: true; overlay: true">
						<div class="uk-offcanvas-bar" style="background-color: white">
							<button class="uk-offcanvas-close" type="button" uk-close style="color: black;"></button>
							<ul class="uk-nav uk-dropdown-nav">
								<li class="uk-active" style="font-size: 20px"><a href="<?= base_url('') ?>"><span uk-icon="icon: home; ratio: 1.2"></span>&nbsp;Home</a></li>
								<li class="uk-active" style="font-size: 20px"><a href="#"><span uk-icon="icon: calendar; ratio: 1.2"></span>&nbsp;Articles</a></li>
								<li class="uk-nav-divider"></li>
								<li class="uk-active" style="font-size: 20px"><a href="<?= base_url('register') ?>"><span uk-icon="icon: file-edit; ratio: 1.2"></span>&nbsp;Register</a></li>
								<li style="font-weight: 100px; font-size: 20px;"><a href="<?= base_url('login') ?>"><span uk-icon="icon: sign-out; ratio: 1.2"></span>Login</a></li>
							</ul>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</nav>