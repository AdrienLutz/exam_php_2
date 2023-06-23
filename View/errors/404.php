<?php
include 'View/parts/header.php';
?>
<main>
    <h1>Oops ! Cette page n'existe pas</h1>
        <?php
        if($_GET["scope"] == 'moto'){
            echo('<h2>Cette moto a probablement été supprimée</h2>');
        }

        ?>
<a class="btn btn-outline-warning " onclick="window.history.back()">back</a>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
</main>

<?php
include 'View/parts/footer.php';
?>