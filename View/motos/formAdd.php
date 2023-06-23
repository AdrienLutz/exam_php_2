<?php
include 'View/parts/header.php';
?>
<h1>Ajouter une moto</h1>

<a class="btn btn-outline-warning m-2 " href="index.php?controller=motos&action=motolist">back</a>
<section class="container">
    <div class="row">
<!--        enctype est indispensable pour les uploads-->
        <form method="post" enctype="multipart/form-data" class="row">
            <div class="col-md-12">
                <label for="brand" class="form-label">brand :</label>
                <input type="text"
                       value="<?php if(array_key_exists('brand', $_POST)){
                           echo(htmlspecialchars($_POST['brand']));} ?>"
                       name="brand" id="brand" class="form-control
            <?php if (array_key_exists("brand", $errors)) {
                    echo ('is-invalid');
                } ?>">
                <div id="validateBrand" class="invalid-feedback">
                    <?php if (array_key_exists("brand", $errors)) {
                        echo ($errors['brand']);
                    } ?>
                </div>

            </div>


            <div class="col-md-12">
                <label for="model" class="form-label">model</label>
                <textarea class="form-control" name="model" id="model"></textarea>
            </div>

            <div class="col-md-12">

                <label for="validationServer04" class="form-label">type</label>
                <select class="form-select
                <?php if (array_key_exists("type", $errors)) {
                    echo('is-invalid');
                }; ?>" name="type" id="validationServer04">
<!--                    <option value="">Pas d'infos</option>-->
                    <?php
                    // permet d'afficher les types de la static qu'on peut d'ailleurs ajouter directement
                    foreach (motoController::$allowedtype as $type){
                        // pour garder la selection :
                        $selected='';
                        if(array_key_exists("type", $_POST) && $_POST["type"] == $type){
                            $selected = 'selected';
                        }
                        echo('<option '.$selected.' value="'.$type.'">'.$type.'</option>');
                    }
                    ?>

                </select>
                <div class="invalid-feedback">
                    <?php if (array_key_exists("type", $errors)) {
                        echo($errors['type']);
                    }; ?>
                </div>
            </div>

            <div class="col-md-12">
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