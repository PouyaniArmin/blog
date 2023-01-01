<div class="container">
    <div class="d-flex justify-content-center">
        <?php if(isset($success)){?>
        <div class="alert alert-success" role="alert">
            Success Add new Category
        </div>
        <?php };?>
    </div>
    <div class="container">
        <form class="row g-3" method="post">
            <div class="col-auto">
                <input type="text" name="name" class="form-control" placeholder="New Category">
                <p class="text-danger"><?php echo $name ?></p>
            </div>
            <div class="col-auto p-1">
                <input type="submit" class="btn btn-primary mb-3 btn-sm" value="Create">
            </div>
        </form>
    </div>
</div>