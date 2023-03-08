<section class="p-4">
        <form method="post" >
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div class="text-danger"><p> <?php echo $email[0];  ?></p></div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <div class="text-danger"><p> <?php echo $password[0]; ?></p></div>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="remmber" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </section>