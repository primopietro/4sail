
<?php  
if(!isset($_SESSION)){session_start();}
$addedString = "";
if(isset( $_SESSION['currentItem'])){
    if( $_SESSION['currentItem'] != 0){
        $addedString = "../";
    }
}
?>
<!DOCTYPE html>
<!--[if IE 7]> <html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
    <head>
        <!-- TITLE OF SITE -->
        <title> eCommerce </title>
        
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="description" content="app landing page template" />
        <meta name="keywords" content="app, landing page, gradient background, image background, video background, template, responsive, bootstrap" />
        <meta name="developer" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- FAV AND ICONS   -->
        <link rel="shortcut icon" href="<?php echo $addedString; ?>assets/images/favicon.ico">
        <link rel="shortcut icon" href="<?php echo $addedString; ?>assets/images/apple-icon.png">
        <link rel="shortcut icon" sizes="72x72" href="<?php echo $addedString; ?>assets/images/apple-icon-72x72.png">
        <link rel="shortcut icon" sizes="114x114" href="<?php echo $addedString; ?>assets/images/apple-icon-114x114.png">

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7cPlayfair+Display:400,400i,700,900" rel="stylesheet">

        <!-- FONT ICONS -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
        
        <!-- Custom Icon Font -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/fonts/flaticon.css">
        <!-- Bootstrap-->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/bootstrap.min.css">
        <!-- Fancybox-->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/jquery.fancybox.min.css">
        <!-- Animation -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/animate.css">
        <!-- owl -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/owl.css">
        <!--flexslider-->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/flexslider.min.css">
        <!-- selectize -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/selectize.css">
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/selectize.bootstrap3.css">
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/jquery-ui.min.css">
        <!--dropdown -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/bootstrap-dropdownhover.min.css">
        <!-- mobile nav-->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/plugins/css/meanmenu.css">

        <!-- COUSTOM CSS link  -->
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo $addedString; ?>assets/css/responsive.css">
		<link rel="stylesheet" href="<?php echo $addedString; ?>style/style.css">
        <!--[if lt IE 9]>
            <script src="js/plagin-js/html5shiv.js"></script>
            <script src="js/plagin-js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>