<div class="container">
    <h3>Category</h3>
    <div class="container">
    <form class="row g-3">
  <div class="col-end">
    <input type="text" readonly class="form-control-plaintext" id="staticEmail2">
  </div>
  <div class="col-auto">
    <input type="text" class="form-control" placeholder="New Category">
  </div>
  <div class="col-auto p-1">
    <input type="submit" class="btn btn-primary mb-3 btn-sm" value="Create">
  </div>
</form>
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="p-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2">
                                        <input type="checkbox" name="" id="">
                                    </div>
                                    <div class="col-6">
                                        <h5 class="card-title">Title</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row me-5">    
                            <div class="col-1 me-3">
                                    <a href="">Edit</a>
                                </div>
                                <div class="col-2">
                                    <a class="text-danger" href="">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }; ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>