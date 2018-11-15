<?php 
  require("../classes/auth.php");
  require("header.php");
  require("../classes/db.php");
  require("../classes/phpfix.php");
  require("../classes/post.php");
  $post = Post::find($_GET['id']);
  if (isset($_POST['title'])) {
    $nocsrftoken = $_POST["nocsrftoken"];
    if (!isset($nocsrftoken) or ($nocsrftoken != $_SESSION['nocsrftoken'])) {
        echo "Cross-site request forgery is detected! [EDIT]"; die();
    }
    $post->update($_POST['title'], $_POST['text']);
  } 
  
  $rand = bin2hex(openssl_random_pseudo_bytes());
  $_SESSION["nocsrftoken"] = $rand;
  
?>
  
  <form action="edit.php?id=<?php echo htmlentities($_GET['id']);?>" method="POST" enctype="multipart/form-data">
    Title: 
    <input type="text" name="title" value="<?php echo htmlentities($post->title); ?>" /> <br/>
    Text: 
      <textarea name="text" cols="80" rows="5">
        <?php echo htmlentities($post->text); ?>
       </textarea><br/>
    <input type="hidden" name="nocsrftoken" value="<?php echo $rand;?>" />
    <input type="submit" name="Update" value="Update">

  </form>

<?php
  require("footer.php");

?>

