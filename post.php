<?php

require('config/config.php');
require('config/db.php');

// get id
$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM posts WHERE id = ' . $id;

// get Result
$result = mysqli_query($conn, $query);

//Fetch data 
$post = mysqli_fetch_assoc($result); //assoc because it will take that one post and make it into an assoc array
// var_dump($posts);

//Free result
mysqli_free_result($result);

//close connection
mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
<div class="container">
    <a href="<?php echo ROOT_URL; ?>" class="btn btn-default">Back</a>
    <h1><?php echo $post['title']; ?></h1>
    <small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
    <p><?php echo $post['body']; ?></p>
</div>
<?php include('inc/footer.php'); ?>