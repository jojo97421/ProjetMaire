<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="media/css/style.css">
    <link rel="shortcut icon" href="media/icons/favicon.ico">
    <title><?= $titre ?></title>
</head>
<body>
    <div class="wrapper">
        <!-- HEADER -->
        <header>  
            <h1 class="logo" style="font-family:cursive;"><a href="index.php?">Centre de formation</a></h1>
            <!-- Menu de navigation -->
        </header>
        <!-- SECTION PRINCIPALE -->
        <section>
            <article>
                <?= $message = isset($message) ? $message : NULL; ?>
                <?= $contenu = isset($contenu) ? $contenu : NULL; ?>
                <?php $this->modeleClient->fermerConnexion();?>
            </article>
        </section>

        <!-- FOOTER -->
        <footer>	

            <p>Copyright &copy; 2023 BTS SIO <a href="#">MAILLOT Joachim</a>
            <br> Site Web réalisé pour le centre de formation de la Rivière Saint-Louis</p>
        </footer>
    </div> 
    <!-- fin du bloc page -->
  </body>
</html>