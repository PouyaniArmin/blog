<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <section class="p-4">
        <div class="container pt-4">
        <form method="post" class="w-50">
        <div class="mb-3">
                <label for="exampleInputUsername" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp">
            </div>
            <div class="text-danger"><p> <?php echo $username[0]; ?></p></div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="text-danger"><p> <?php echo $email[0]; ?></p></div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="text-danger"><p> <?php echo $password[0]; ?></p></div>
            <div class="mb-3">
                <label for="exampleInputConfirmPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="exampleInputConfirmPassword1">
            </div>
            <div class="text-danger"><p> <?php echo $confirmPassword[0]; ?></p></div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        </div>
        </div>
    </section>
</body>
</html>