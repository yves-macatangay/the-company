<?php

include_once "../classes/User.php";

session_start();

$uid = $_GET['user_id'];

$u = new User;
$user = $u->getUser($uid);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
            <h1 class="display-6 text-center text-uppercase">Edit User</h1>
            <form action="../actions/edit-user.php" method="post">
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                
                <label for="first-name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first-name" value="<?= $user['first_name'] ?>" class="form-control mb-2">

                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" name="last_name" value="<?= $user['last_name'] ?>" id="last-name" class="form-control mb-2">

                <label for="username" class="form-label fw-bold">Username</label>
                <input type="text" name="username" value="<?= $user['username'] ?>" id="username" class="form-control mb-3">

                <input type="submit" value="Save" class="btn btn-warning">
                <a href="dashboard.php" class="btn btn-secondary ms-2">Cancel</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>