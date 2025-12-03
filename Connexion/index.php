<?php

// ISOLER CE CODE ?

// ON VERIFIE LA METHODE UTILISEE POUR ACCEDER AU SERVEUR 
$secure = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    function clean()
    {
        # CLEAN E-MAIL
        if (isset($_POST['email']) && !empty($_POST['email'] && !empty($_POST['password']))) {
            $email = $_POST['email'];
            htmlspecialchars($email, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            filter_var($email, FILTER_VALIDATE_EMAIL);
        } else {
            throw new Exception('L\'adresse e-mail n\'est pas valide', 1);
        };

        # CLEAN MOT DE PASSE
        if (isset($_POST['password']) && !empty($_POST['password']) && !empty($_POST['email'])) {
            $mdp = $_POST['password'];
            htmlspecialchars($mdp, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            if (strlen($mdp) <= 9) {
                throw new Exception('L\e mot de passe est trop court, minimum 9 caracères', 2);
            };
        };
    };

    try {
        clean();
        $secure = true;
    } catch (Exception $e) {
        echo $e->getMessage();
    };
};

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title> Formulaire PHP </title>
</head>

<body>
    <header>
        <?php include_once './display/header.php'; ?>
    </header>

    <main>
        <div>

            <?php
            $message = '<h1> Bienvenue ! </h1>';

            // CONDITION QUI MODIFIE LE MESSAGE DE BIENVENUE
            if (!$_REQUEST || !$secure) {
                echo $message;
                // ---> RAJOUTER LA CONDITION MANQUANTE <---
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $secure) {
                echo $message . $_POST['email'];
            };
            ?>

        </div>

        <?php
        // CONDITION POUR AFFICHER L'INTERFACE DE CONNEXION
        if (!$_REQUEST || !$secure) {
            include_once './display/formulaire.php';
            // ---> RAJOUTER LA CONDITION MANQUANTE <---
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && $secure) {
        ?>

            <section>
                <p> PHP </p>
            </section>

        <?php
        };
        ?>

    </main>

    <footer>
        <?php include_once './display/footer.html'; ?>
    </footer>
</body>

</html>