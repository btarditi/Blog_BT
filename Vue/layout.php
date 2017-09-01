<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Contenu/style.css" />
    <title><?= $titre ?></title>   <!-- Élément spécifique -->
  </head>
  <body>
    <div id="global">
      <header>
        <a href="index.php"><h1 id="titreBlog">Billet simple pour l'Alaska</h1></a>
        <p>Je vous souhaite la bienvenue.</p>
      </header>
      <div id="contenu">
        <?= $contenu ?>  <!-- Élément spécifique -->
      </div> 
      <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS par Tard'and Co.
      </footer>
    </div> <!-- #global -->
  </body>
</html>