    <?php $titre = 'BT Blog'; ?>
    
    <?php foreach ($billets as $billet): ?>
        <article>
            <header>
                <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                    <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
                </a>
                <time><?= $billet['dateAjout'] ?></time>
            </header>
            <p><?= $billet['contenu'] ?></p>
        </article>
        <hr />
        <?php endforeach; ?>
    