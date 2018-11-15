<?php
  $site = "PentesterLab vulnerable blog";
  require "header.php";
  $post = Post::find(intval($_GET['id']));
  if(isset($_POST['title'])) {
      $nocsrftoken = $_POST["nocsrftoken"];
      if (!isset($nocsrftoken) or ($nocsrftoken != $_SESSION['nocsrftoken'])) {
        echo "Cross-site request forgery is detected! [Add Comment]"; die();
      }
      if (isset($post)) {
	    $ret = $post->add_comment();
	  }
	  header("Location: post.php?id=".intval($_GET['id']));
	  die();
  }
?>

