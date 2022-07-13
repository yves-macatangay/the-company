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
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="ms-auto" id="navbarText">
      <span class="navbar-text text-light">
        <a href="profile.php" class="text-muted text-decoration-none">username</a>
        <a href="../actions/logout.php" class="text-danger text-decoration-none ms-2">Log out</a>
      </span>
    </div>
  </div>
</nav>
    <div class="container w-75 my-5">
        <h2 class="h4">User List</h2>
        <table class="table">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Yves</td>
                    <td>M</td>
                    <td>yves</td>
                    <td>
                        <a href="edit-user.php?user_id=" class="btn btn-outline-warning btn-sm me-2"><i class="fa-solid fa-pencil"></i></a>
        
                        <form action="../actions/removeUser.php" method="post" class="d-inline">
                          <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                          <input type="hidden" name="user_id" value="">
                        </form>
                      </td>
                </tr>

            </tbody>
        </table>
    </div>

    <script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>
</body>
</html>