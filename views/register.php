<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-6 p-4 sahel-font register-form">
            <form method="post">
        <div class="mb-3 pt-2">
                <label for="exampleInputUsername" class="form-label">نام کاربری</label>
                <input type="text" name="username" class="form-control" id="exampleInputUsername" aria-describedby="emailHelp">
            </div>
            <div class="text-danger"><p> <?php echo $username[0]; ?></p></div>
            <div class="mb-3 pt-2">
                <label for="exampleInputEmail1" class="form-label">ایمیل</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="text-danger"><p> <?php echo $email[0]; ?></p></div>
            <div class="mb-3 pt-2">
                <label for="exampleInputPassword1" class="form-label">رمز عبور</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="text-danger"><p> <?php echo $password[0]; ?></p></div>
            <div class="mb-3 pt-2">
                <label for="exampleInputConfirmPassword1" class="form-label">تایید رمز عبور</label>
                <input type="password" name="confirmPassword" class="form-control" id="exampleInputConfirmPassword1">
            </div>
            <div class="text-danger"><p> <?php echo $confirmPassword[0]; ?></p></div>
            <button type="submit" class="btn btn-primary btn-form-register">ثبت نام</button>
        </form>
            </div>
            <div class="col-5 m-4 register-form-img">
               <img src="../public/images/register.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>
