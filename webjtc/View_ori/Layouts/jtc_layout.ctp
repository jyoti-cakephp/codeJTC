<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <link rel="icon" href="../../favicon.ico">
	<?php if($this->params['controller']=='homes' && $this->params['action']=='index'){ ?>
    <title>Just Too Cute | Kids Wholesale Clothing | Childrenswear Wholesale |</title>
	<meta name="description" content="If you are doing online business for baby clothes so JTC ( just too cute )  is here where you can buy all product in bulk like childernswear clothes, kids wholesale clothing,Kids Clothes, Baby Girls Clothes,Baby boys Clothes and much more ">
	<meta name="keywords" content="Kids Wholesale Clothing,Childrenswear Wholesale,Kids Clothes,Baby Clothes,Baby Girls Clothes,Baby Boys Clothes,Babywear Clothes,Babywear Wholesale,Wholesale Clothing Uk,Baby shop Oline,Kidewear,Chep Baby Clothes,Just too Cute,Cutey Pie,Cutey Couture ">    
	<meta name="robots" content="Index, Follow"/>
	<meta name="revisit-after" content="2 days"/>
    <meta name="distribution" content="Global"/>
    <meta name="author" content="sds softwares"> 	
    <link rel="canonical" href="http://jtcbabywear.co.uk/">	
    <meta property="og:locale" content="en_US"/>    
    <meta property="og:type" content="website"/>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-120844312-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120844312-1');
</script>

	
     <?php } else if($this->params['controller']=='contents' && $this->params['action']=='aboutUs') { ?>
	
	 <?php } ?>
   
    <!-- Bootstrap core CSS -->
    <?php echo $this->html->css('bootstrap.min.css');?>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo $this->html->css('ie10-viewport-bug-workaround.css');?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>    
  </head>
  <?php echo $this->element('header'); ?>
  <body>
  <?php echo $content_for_layout; ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <?php echo $this->Html->script('jquery.min.js'); ?>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
   <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <?php echo $this->Html->script('ie10-viewport-bug-workaround.js'); ?>  
  <?php echo $this->element('footer'); ?>
  </body>
</html>