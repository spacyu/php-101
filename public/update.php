<?php

/**
 * List all users with a link to edit
 */

try {
    require "config.php";
    require "common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "SELECT * FROM users";

    $stmt = $connection->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll();

} catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>


<?php require "templates/header.php"; ?>


<h2 class="aqua-gradient">Update users</h2>

<table class="table table-sm table-dark table-hover">
<caption>List of users</caption>
  <thead class="thead-light">
    <tr>
      <th><i class="fas fa-fingerprint"></i></th>
      <th><i class="fas fa-trophy"></i></th>
      <th><i class="fas fa-signature"></i></th>
      <th><i class="fas fa-envelope-open"></i></th>
      <th><i class="fab fa-pagelines"></i></th>
      <th><i class="fas fa-map-marker-alt"></i></th>
      <th><i class="fas fa-clock"></th>
      <th><i class="far fa-edit"></i>
</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["firstname"]); ?></td>
      <td><?php echo escape($row["lastname"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><?php echo escape($row["age"]); ?></td>
      <td><?php echo escape($row["location"]); ?></td>
      <td><?php echo escape($row["date"]); ?> </td>
      <td ><a class="btn aqua-gradient button5" href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
      <td ><a class="btn peach-gradient button5" href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>


<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>