<?php require_once 'layout/header.php'; ?>
<div class="form-group">
    <form action="" method="POST" enctype="multipart/form-data" class="form-control">
        <p>
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" placeholder="Martin" class="form-control">
        </p>
        <p>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" id="prenom" placeholder="Jean" class="form-control">
        </p>
        <p>
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" placeholder="truc@truc.fr" class="form-control">
        </p>

        <div class="custom-file">
            <label class="custom-file-label" for="customFile">Fichiers</label>
            <input type="file" class="custom-file-input" id="file" name="file[]" multiple>
        </div>



        <p>
            <input type="submit" value="Envoyer les fichiers" class="btn btn-primary">
        </p>
    </form>
</div>

<?php

if (empty($_POST)) {
    exit("Accès interdit");
}

$upload_folder = $_SERVER['DOCUMENT_ROOT'] . '/uploads/';

foreach ($_FILES['file']['error'] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['file']['tmp_name'][$key];
        $name = basename($_FILES['file']['name'][$key]);
        move_uploaded_file($tmp_name, $upload_folder . $name);
    }
}

?>

<?php require_once 'layout/footer.php'; ?>