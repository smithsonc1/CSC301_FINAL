<?php 

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

// If form submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get username and password from the form as variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Query records that have usernames and passwords that match those in the customers table
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $username,
		'password' => $password
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	// If $users is not empty
	if(!empty($users)) {
		// Set $user equal to the first result of $users
		$user = $users[0];
		
		// Set a session variable with a key of customerID equal to the customerID returned
		$_SESSION['playerid'] = $user['playerid'];
		
		//Redirect to the index.php file
		header('location: index.php');
		Die();
	}
}

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
        <li><a href="create.php">CREATE</a></li>
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
    <h2 class="createheader" align="center">Login / Sign Up</h2>
    <p class="createdescription" align="center">Login</p>
    </section>
  <!-- Stats Gallery Section -->
<form action="" method="POST" align="center">
	<div class="form-element">
		<label>Username: </label><input type="text" name="username"></div><br />
	<div class="form-element">
		<label>Password: </label><input type="password" name="password"></div><br />
		<div class="form-element">
		<input type="submit" class="button" />	
	</form><br><hr><br>
	
	<p class="createdescription" align="center"><a href="newuser.php?action=add">New User?</a></p><br>
	<p class="createdescription" align="center"><a href="logout.php">Logout</a></p><br>
	
 

 <!-- Main Container Ends -->
	</div>
</body>
</html>
