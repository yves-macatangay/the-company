<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php
        require "../classes/User.php";

        session_start();
        include "nav.php";

        $u = new User;
        $user = $u->getUser($_SESSION['user_id']);
    ?>  
    <div class="container">
        <div class="card w-50 my-5 mx-auto">
            <div class="card-header">
                <img src="../images/<?= $user['photo'] ?>" alt="<?= $user['username'] ?>'s photo" class="img-thumbnail">
            </div>
            <div class="card-body">
                <form action="../actions/uploadPhoto.php" method="post" enctype="multipart/form-data">
                    <label for="photo" class="form-label">Choose Photo</label>

                    <input type="file" name="photo" id="photo" class="form-control">

                    <button type="submit" class="btn btn-outline-secondary mt-1">Upload Photo</button>
                </form>
            </div>
            <div class="card-footer border-0">
                <h2 class="h4"><?= $user['first_name']." ".$user['last_name'] ?></h2>
                <h3 class="h5"><?= $user['username'] ?></h3>
            </div>
        </div>
    </div>
</body>
</html>