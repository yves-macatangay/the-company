<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>

</head>
<body>
    <?php
        require "../classes/User.php";

        session_start();
        include "nav.php";

        $u = new User;
        $all_users = $u->getAllUsers();
    ?>

    <div class="container">
        <div class="w-75 mx-auto my-5">
            <h2 class="h3">User List</h2>

            <table class="table">
                <thead class="table-secondary">
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php while($row = $all_users->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['first_name'] ?></td>
                            <td><?= $row['last_name'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td>
                                <!-- buttons -->
                                <!-- edit -->
                                <a href="edit-user.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <!-- delete -->
                                <?php if( $row['id'] != $_SESSION['user_id']) { ?>
                                    <form action="../actions/deleteUser.php" method="post" class="d-inline">
                                        <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>