<!DOCTYPE html>
<html lang="en"><head>
	<!-- META -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<!-- TITLE -->
	 <title><?=$getCMS->MetaTitle; ?> | <?=$MyAppSettings->website_name?></title>
     <meta name="description" itemprop="description" content="<?=$getCMS->MetaDescription; ?>">
     <meta name="keywords" itemprop="keywords" content="<?=$getCMS->SEOKeyword; ?>"> 
     <meta name="author" content="<?=$MyAppSettings->metaAuthor; ?>">  
     <?php $fabImage=$MyAppSettings->fab_icon; if($fabImage!='' && file_exists("./cdn/logoImage/$fabImage")){ ?> <link rel="shortcut icon" href="<?=CDN_PATH?>logoImage/<?php echo $fabImage;?>"><?php } ?><!-- App title --><?php  $URI=ltrim($_SERVER['REQUEST_URI'],'/'.LOCAL_FOLDER); if($URI=='dex' || $URI=='ome'){ ?>
     <script>window.location.href='<?=$MyAppSettings->domain?>';</script>  
	 <?php }else{ ?><link rel="canonical" href="<?=$MyAppSettings->domain.$URI;?>" /> <?php }?>   
     
     <script>var CDN_PATH='<?=CDN_PATH;?>'; var PATH='<?=PATH;?>'; var ASSETS='<?=ASSETS;?>'; var ASSETS2='<?=ASSETS2;?>'; var ASSETS2_ADMIN='<?=ASSETS2_ADMIN;?>';</script>
     
	<!-- FONTS/css for your app -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700%7CRoboto:400,400i,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/pe-icon-7-stroke.css">
	<!-- LIBRARIES -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/slick-theme.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/magnific-popup.css">
	<!-- STYLES -->
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/style.css">