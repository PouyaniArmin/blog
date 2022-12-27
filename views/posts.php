<!-- create post -->
<!-- list all post -->
<!-- check box  -->
<!-- Button Edit remove -->
<!-- pagination -->
<div class="container">
    <h3>Posts</h3>
    <div class="container">
        <h5>Create Post</h5>
        <p class="text-primary">Create <a href=""><i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                        <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z" />
                        <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z" />
                    </svg></i></a>
        </p>
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
                            <div class="col-6">
                                <p class="card-subtitle mb-2 text-muted text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            <div class="row">
                                <div class="col-1">
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