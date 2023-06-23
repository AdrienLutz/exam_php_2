<?php
include 'View/parts/header.php';
?>
<h1>Modifier les informations de la moto <?php echo($moto->getBrand()); ?></h1>

<a class="btn btn-outline-warning m-2 " href="index.php?controller=motos&action=motolist">back</a>
<section class="container">
    <div class="row">"
        <form method="post"  enctype="multipart/form-data" class="row">
            <div class="col-md-12">
                <label for="brand" class="form-label">Nom de la moto</label>

                <input type="text" name="brand" class="form-control <?php
                if (array_key_exists("brand", $errors)) {
                    echo('is-invalid');
                }
                ?>" value="<?php echo($moto->getBrand()); ?>" id="brand">

                <div id="validateBrand" class="invalid-feedback">
                    <?php
                    if (array_key_exists("brand", $errors)) {
                        echo($errors["brand"]);
                    };
                    ?>
                </div>
            </div>

            <div class="col-md-12">
                <label for="model" class="form-label">model</label>
                <textarea class="form-control" name="model" id="model">
                    <?php echo($moto->getModel()); ?>
                </textarea>
            </div>

            <div class="col-md-12">
                <label for="validationCustom04" class="form-label">type</label>
                <select class="form-select
                 <?php  if(array_key_exists("type", $errors)){echo('is-invalid');}?>" name="type" id="validationCustom04">
<!--                    <option  value="">Pas d'infos</option>-->
                    <?php
                    foreach (motoController::$allowedtype as $type){
                        $selected = '';
                        if($moto->getType() == $type){
                            $selected = 'selected';
                        }
                        echo('<option '.$selected.' value="'.$type.'">'.$type.'</option>');
                    }
                    ?>
                </select>
                <div class="invalid-feedback">
                    <?php  if(array_key_exists("type", $errors)){echo($errors["type"]);}?>
                </div>
            </div>


            <div class="col-md-12">
                <span>Aperçu de l'image actuelle</span><br>
                <img class="img-thumbnail" src="public/img/<?php echo($moto->getPicture())?>"><br>
                <span class="text-danger">Attention tout ajout écrase le précédent</span><br>
                <label for="picture" class="form-label">Photo</label>
                <input type="file" name="picture" class="form-control
            <?php if(array_key_exists("picture", $errors)){echo('is-invalid');}?>" id="picture">
                <div class="invalid-feedback">
                    <?php if(array_key_exists("picture", $errors)){echo($errors["picture"]);}?>
                </div>
            </div>


            <div class="col-12">
                <button class="btn btn-outline-warning m-2" type="submit">Valider</button>
            </div>
        </form>
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