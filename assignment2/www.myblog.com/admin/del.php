<?php 
  require("../classes/auth.php");
  require("header.php");
  require("../classes/db.php");
  require("../classes/phpfix.php");
  require("../classes/post.php");
  echo $_GET['deleteToken'];
  echo $_SESSION['deleteToken'];
    if ($_GET['deleteToken'] == $_SESSION['deleteToken']) {
    	$post = Post::delete((int)($_GET["id"]));
  		header("Location: /admin/index.php");
    } else {
    	echo "Cross-site request forgery is detected! [Del] $rand "; die();
  	}

?>
