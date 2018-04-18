<?php 

include('config.php');
include('functions.php');
// Get search term from URL using the get function

$term = get('search-term');
$playerid = $_SESSION['playerid'];

$heroes = searchHeroes($term, $database);


?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
<script>var __adobewebfontsappname__="dreamweaver"</script>
<script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Main Container -->
<div class="container"> 
  <!-- Navigation -->
  <header><a href="index.php">
    <h4 class="logo">HEROCONNECT</h4>
    </a>
   <nav>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="create.php?action=add">CREATE</a></li>
        <li> <a href="heroes.php">HEROES</a></li>
		  <li> <a href="login.php">LOGIN</a></li>
      </ul>
    </nav>
	  
  </header>
  <!-- Hero Section -->
  <section class="hero" id="hero">
    <h2 class="hero_header">HERO CONNECT</h2>
    <p class="tagline">Building a community of heroes</p>
  </section>
  <!-- About Section -->
  <section class="create" id="create">
    <h2 class="createheader" align="center">Heroes</h2>
    <p class="createdescription" align="center">Search Heroes Here</p>
    </section>
  <!-- Stats Gallery Section -->
<form action="" method="GET" align="center">
	<div class-"form-element">
		<label>Hero Name: </label><input type="text" name="search-term"></div><br />
		<div class="form-element">
		<input type="submit" class="button" />	
	</form><br><hr><br>
	<!-- <//?php if(empty($hero)) : ?> 
	<h2 class="heroheader" align="center">No Heroes Match this Criteria</h2>
	<//?php else : ?> -->
	<?php foreach($heroes as $hero) : ?>
		<?php if($hero['playerid'] == $playerid) : ?>
	<h2 class="heroheader" align="center"><?php echo $hero['name'] ?></h2>
    <p class="attribute" align="center"><b>Race: </b><?php echo $hero['racename'] ?>
	<p class="attribute" align="center"><b>Class: </b><?php echo $hero['classname'] ?></p>
	<p class="attribute" align="center"><b>Gender: </b><?php echo $hero['gender'] ?></p>
	<p><a href="edithero.php?action=edit&heroid=<?php echo $hero['heroid'] ?>">Edit Hero</a></p>
	<p><a href="herodetails.php=<?php echo $hero['heroid'] ?>">View Details</a></p><br>
		<?php else : ?>
	<h2 class="heroheader" align="center"><?php echo $hero['name'] ?></h2>
    <p class="attribute" align="center"><b>Race: </b><?php echo $hero['racename'] ?>
	<p class="attribute" align="center"><b>Class: </b><?php echo $hero['classname'] ?></p>
	<p class="attribute" align="center"><b>Gender: </b><?php echo $hero['gender'] ?></p>
	<p><a href="herodetails.php=<?php echo $hero['heroid'] ?>">View Details</a></p><br>
		<?php endif; ?>
		<?php endforeach; ?>
		
		
  

 <!-- Main Container Ends -->
	</div>
</body>
</html>
