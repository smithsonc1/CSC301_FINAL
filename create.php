<?php


include('config.php');
include('functions.php');

$action = $_GET['action'];

//Get heroid from url if it exists
$heroid = get('heroid');

// Get Hero Races to populate dropdown
$sql = file_get_contents('sql/getRace.sql');
$statement = $database->prepare($sql);
$statement->execute();
$races = $statement->fetchAll(PDO::FETCH_ASSOC); 

// Get Hero Classes to populate dropdown
$sql = file_get_contents('sql/getClass.sql');
$statement = $database->prepare($sql);
$statement->execute();
$classes = $statement->fetchAll(PDO::FETCH_ASSOC); 
$playerid = $_SESSION['playerid'];

//Set hero to null
$hero = null;
//if heroid is not empty get hero record into $hero variable from the database
	// Set $hero equal to the first hero in $heroes
if(!empty($heroid)) {
	$sql = file_get_contents('sql/getHeroEdit.sql');
	$params = array(
		'heroid' => $heroid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$heroes = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$hero = $heroes[0];
}
	
// If form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = $_POST['hero-name'];
	$race = $_POST['race'];
	$class = $_POST['class'];
	$gender = $_POST['gender'];
	
	
	if($action == 'add') {
		// Insert hero
		$sql = file_get_contents('sql/insertHero.sql');
		$params = array(
			'name' => $name,
			'race' => $race,
			'class' => $class,
			'gender' => $gender
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
		
	$database->exec($sql);	
    $last_id = $database->lastInsertId();
		
		// Insert into the bridge Player/hero table
		$sql = file_get_contents('sql/insertPlayerHero.sql');
		$params = array(
			'playerid' => $playerid,
			'heroid' => $last_id
		);
	
		$statement = $database->prepare($sql);
		$statement->execute($params);
		
		header('location: heroes.php');
		Die();
		
		}
		elseif ($action == 'edit') {
			$sql = file_get_contents('sql/updateHero.sql');
        $params = array( 
            'name' => $name,
			'race' => $race,
			'class' => $class,
			'gender' => $gender,
			'heroid' => $heroid
        );
        
        $statement = $database->prepare($sql);
        $statement->execute($params);
		
		header('location: heroes.php');
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
    <h2 class="createheader" align="center">CREATE</h2>
    <p class="createdescription" align="center">Fill out this form and click submit to create a new hero.</p>
    </section>
  <!-- Form Section -->
<form action="" method="POST" align="center">
			<div class="form-element">
	<label>Hero Name:  </label>
	<input type="text" name="hero-name" value="<?php echo $hero['name'] ?>"></div><br />
	<div class="form-element">
		<label>Race:  </label>
	<select name="race">
	<?php foreach($races as $race) : ?>
		<option value="<?php echo $race['raceid'] ?>"><?php echo $race['racename'] ?></option>
		<?php endforeach; ?>
			</select></div><br />
	<div class="form-element">
	<label>Class: </label>
	<select name="class">
	<?php foreach($classes as $class) : ?>
		<option value="<?php echo $class['classid'] ?>"><?php echo $class['classname'] ?></option>
		<?php endforeach; ?>
			</select></div><br />
	<div class="form-element">
	<label>Gender: </label><input type="radio" name="gender" value="Male"> Male	<input type="radio" name="gender" value="Female"> Female <br></div>
	<div class="form-element">
		<input type="submit" class="button" />
		<input type="reset" class="button" />
		</form>
    <!-- Parallax Section -->
    <!-- More Info Section -->

  <!-- Footer Section -->

 <!-- Main Container Ends -->
	</div>
</body>
</html>
