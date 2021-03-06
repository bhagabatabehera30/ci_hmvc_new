<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	  <title>:: SITE NAME - ADMIN PANEL ::</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes"> 
    <link rel="shortcut icon" href="<?=ASSETS2_ADMIN?>assets/images/favicon.ico">
	<link href="<?=ASSETS2?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=ASSETS2?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

	<link href="<?=ASSETS2?>css/font-awesome.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

	<link href="<?=ASSETS2?>css/style.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS2?>css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">

		<div class="navbar-inner">

			<div class="container">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<a class="brand" href="<?=PATH?>">
					::  SITE NAME - ADMIN PANEL ::
				</a>		

				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li class="">						
							<a href="<?=PATH?>" class="">
								<i class="icon-chevron-left"></i>
								Back to Homepage
							</a>

						</li>
					</ul>

				</div><!--/.nav-collapse -->	

			</div> <!-- /container -->

		</div> <!-- /navbar-inner -->

	</div> <!-- /navbar -->



	<div class="account-container">

		<div class="content clearfix">
        
      <?php
	  //echo password_hash('ON@lIn#3E@dE9l}S[O6)2', PASSWORD_BCRYPT);
      $cookie_username = $this->input->cookie('remember_username');
	  $cookie_password = $this->input->cookie('remember_password');
			?>



       

			<form action="<?=administrator?>login" method="post">

				<h1>Adminstration Login</h1>		

				<div class="login-fields">

					<p>Please provide your details</p>

					<div class="field">
						<label for="username">Username</label>
			<input type="text" id="username" name="username" required value="<?php  if($cookie_username!=""){  echo $cookie_username;} ?>" placeholder="Username" class="login username-field" />
						<?=form_error('username'); ?>
					</div> <!-- /field -->

					<div class="field">
						<label for="password">Password:</label>
						<input type="password" id="password" required name="password" value="<?php  if($cookie_password!=""){  echo $cookie_password;} ?>" placeholder="Password" class="login password-field"/>
						<?=form_error('password'); ?>
					</div> <!-- /password -->

				</div> <!-- /login-fields -->

				<div class="login-actions">

					<span class="login-checkbox">
						<input id="Field" name="remember_me" type="checkbox" class="field login-checkbox" value="1" <?php  if(($cookie_username!="")  &&  $cookie_password!=""){  echo "checked";} ?> tabindex="4" />
						<label class="choice" for="Field">Keep me signed in</label>
					</span>

					<input type="submit" name="submit" class="button btn btn-success btn-large" value="Login Here"/>

				</div> <!-- .actions -->



			</form>

		</div> <!-- /content -->

	</div> <!-- /account-container -->



	<div class="login-extra">
		<?php 
		if(isset($success))
			echo '<div class="alert alert-success alert-dismissable">
		<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'.$success.'</b></div>';
		if(isset($error))
			echo '<div class="alert alert-danger alert-dismissable">
		<i class="fa fa-check"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'.$error.'</b></div>';
		?>
	</div> <!-- /login-extra -->


	<script src="<?=ASSETS2?>js/jquery-1.7.2.min.js"></script>
	<script src="<?=ASSETS2?>js/bootstrap.js"></script>

	<script src="<?=ASSETS2?>js/signin.js"></script>

</body>

</html>
