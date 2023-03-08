<h1>Welcome <?php echo $name; ?></h1>
<a href="" class="btn btn-primary">home</a>
<br>
<br>
<?php if($_SESSION['login']===true){?>
<?php echo  "<a href='".'/logout'."'".">Logout</a>"; ?>
<?php }?>