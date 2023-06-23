<?php
include 'View/parts/header.php';
?>
<h1>La moto <?php echo($moto->getModel()); ?></h1>
<a class="btn btn-outline-warning " href="index.php?controller=motos&action=motolist">back</a>
<section class="container">
<div class="row align-items-center">
    <div class="col-lg-6 mb-5">
        <img class="img-fluid" style="max-height:200px" src="public/img/<?php echo($moto->getPicture()) ?>">
    </div>
    <div class="col-lg-6 mb-5">
        <h4 >Quelques informations sur la <?php echo($moto->getModel()); ?></h4>
        <li >model = <?php echo($moto->getModel()); ?></li>
        <li >type = <?php echo($moto->getType()); ?></li>
    </div>
</div>
</section>
<?php
include 'View/parts/footer.php';
?>
<script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous">
</script>