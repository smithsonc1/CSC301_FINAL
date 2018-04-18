<?php 

include('config.php');
include('functions.php');
$sql = file_get_contents('sql/totalPlayers.sql');
	
	$statement = $database->prepare($sql);
	$statement->execute();
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$user = $users[0];
	
	
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
  <section class="about" id="about">
    <h2 class="aboutheader" align="center">ABOUT</h2>
    <p class="aboutdescription" align="center">Create a hero and connect to other players in this table top networking webpage.  On the toolbar click "CREATE" to create a hero. If you need to edit your hero, or want to see who you can connect with go to the "HEROES" page at the top of the page.  If you need to ever head back to the homepage just click "HOME" or click the logo at the top left of the page. </p>
    </section>
  <!-- Stats Gallery Section -->
  
  <div class="gallery" align="center">
      <div class="thumbnail" align="center">
      <h1 class="stats" align="center"><?php echo $user['count'] ?></h1>
      <h4>PLAYERS</h4>
      <p>Registered in the database</p>
	  <?php if(isset($_SESSION['playerid'])) : ?>
	  <p>Welcome <?php echo $player1->playerName ?></p>
	  <?php endif; ?>
    </div>
    </div>
	<br>
	
    <!-- Parallax Section -->
    <!-- More Info Section -->

  <!-- Footer Section -->
  <div class="footer_banner" id="contact">
    <h2 class="hidden">Footer Banner Section </h2>
    <p class="hero_header">CONTACT ME</p>
	  <a href="mailto:smithsonc1@nku.edu">
    <div class="button">EMAIL</div>
		  </a>
  </div>
	<p>Created by Chuck Smithson CSC-301</p>
 <!-- Main Container Ends -->
	</div>
	
</body>
</html>
