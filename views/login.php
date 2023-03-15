<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-6 p-4 align-self-center sahel-font register-form">
                <form method="post">
                    <div class="mb-3 pt-2">
                        <label for="exampleInputEmail1" class="form-label">ایمیل</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div class="text-danger">
                            <p> <?php echo $email[0];  ?></p>
                        </div>
                    </div>
                    <div class="mb-3 pt-2">

                        <label for="exampleInputPassword1" class="form-label">رمزعبور</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <div class="text-danger">
                            <p> <?php echo $password[0]; ?></p>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-form-register">ورورد</button>
                </form>
            </div>
            <div class="col-5 m-4 register-form-img">
                <img src="../public/images/Signup.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>