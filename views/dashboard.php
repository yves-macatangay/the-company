<?php

include_once "../classes/User.php";

session_start();

if(!isset($_SESSION['username'])){
   header("location: index.php");
}

$u = new User;
$users = $u->getUsers();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="dashboard.php">The Company</a>
    <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="ms-auto" id="navbarText">
      <!-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
      </ul> -->
      <span class="navbar-text text-muted">
        <a href="profile.php" class="text-decoration-none text-muted"><?= $_SESSION['username'] ?></a>
        <a href="../actions/logout.php" class="text-decoration-none ms-2 text-danger">Log out</a>
      </span>
    </div>
  </div>
</nav>

<div class="container my-5">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 class="h3">User List</h1>
            <table class="table">
                <thead class="bg-secondary text-dark">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    while($row = $users->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['first_name'] ?></td>
                        <td><?= $row['last_name'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td>
                            <a href="edit-user.php?user_id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pen"></i></a>
                            <form action="../actions/delete-user.php" method="post" class="d-inline ms-2">
                                <input type="hidden" name="user_id" value="<?= $row['id'] ?>">    
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fa-solid fa-trash"></i></button>    
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>
</body>
</html>