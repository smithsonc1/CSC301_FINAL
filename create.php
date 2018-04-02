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
  <!-- Stats Gallery Section -->
<form action="" method="POST" align="center">
	<div class="form-element">
		<label>Player Name:  </label><input type="text"></div><br />
	<div class="form-element">
	<label>Player Address:  </label><input type="text"></div><br />
		<div class="form-element">
	<label>Player Email: </label><input type="text"></div><br />
			<div class="form-element">
	<label>Hero Name:  </label><input type="text"></div><br />
	<div class="form-element">
		<label>Race:  </label>
	<select>
		<option value="Human">Human</option>
		<option value="Elf">Elf</option>	
		<option value="HalfElf">Half-Elf</option>
		<option value="Dwarf">Dwarf</option>
		<option value="Hafling">Halfling</option>
		<option value="Gnome">Gnome</option>
	</select></div><br />
	<div class="form-element">
	<label>Class: </label>
	<select>
		<option value="Fighter">Fighter</option>
		<option value="Wizard">Wizard</option>
		<option value="Rogue">Rogue</option>
		<option value="Cleric">Cleric</option>
	</select></div><br />
	<div class="form-element">
	<label>Gender: </label><input type="radio" name="gender" value="male"> Male	<input type="radio" name="gender" value="female"> Female<br></div>
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
