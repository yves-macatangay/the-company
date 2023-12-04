<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="../actions/login.php" method="post" class="border rounded-2 my-5 p-3 mx-auto w-50">
            <h1 class="display-6 text-uppercase text-center mb-2">Login</h1>

            <input type="text" name="username" placeholder="USERNAME" class="form-control mb-3">

            <input type="text" name="password" placeholder="PASSWORD" class="form-control mb-4">

            <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>
            <p class="text-center">
                <a href="register.php" class="text-decoration-none">Create account</a>
            </p>
        </form>
    </div>
</body>
</html>