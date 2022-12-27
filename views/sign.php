
<main class="p-4 border-bottom">
  <div class="container p-4">
    <div class="row p-4">
      <div class="col-6 p-4 shadow">
        <form method="post" action="">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <p class="text-danger"><?php echo $email;?></p>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            <p class="text-danger"><?php echo $password?></p>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</buttoxn>
        </form>
      </div>
      <div class="col-6 d-flex justify-content-center">
        <img src="./down.jpg" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</main>