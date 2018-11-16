<?php

/**
 * Delete a user
 */

require "config.php";
require "common.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $id = $_GET["id"];

    $sql = "DELETE FROM users WHERE id = :id";

    $stmt = $connection->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();

    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM users";

  $stmt = $connection->prepare($sql);
  $stmt->execute();

  $result = $stmt->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>

<?php
/**
 * 
 * Displays a success message adding a new entry
 */
if (isset($_POST['submit']) && $stmt) { ?>
	<p class="alert alert-success"><?php echo $_POST['firstname']; ?> successfully deleted.</p>
<?php } ?>

<?php header('Location: update.php');?>


