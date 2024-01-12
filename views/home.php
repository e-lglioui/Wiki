<?php include "includes/header.php"; ?>
<style>    
  .hero-section {
    background: url('../assets/img/wikiHero.jpg') center no-repeat;
    height: 400px;
    width: 99vw;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-align: center;
    background-size: cover;
    background-position: center; 
}
.wiki-card {
    margin: 20px;
}
</style>
</head>

<body>
    
    <div id="livesearch">
    <section class="container">
        <div class="row">
            <?php
foreach ($wikisearch as $wiki) {
    ?>
            <div class="col-md-4">
                <div class="card wiki-card" style="width: 18rem;">
                    <img src="data:image/jpeg;base64,<?= base64_encode($wiki['img_data']) ?>" class="card-img-top"
                        alt="<?= $wiki['titre'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wiki['titre'] ?></h5>
                        <p class="card-text"><?= $wiki['categorie'] ?></p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#wikiModal<?= $wiki['id_wiki'] ?>">Lire Wiki</a>
                    </div>
                </div>
            </div>

           
            <div class="modal fade" id="wikiModal<?= $wiki['id_wiki'] ?>" tabindex="-1" role="dialog"
                aria-labelledby="wikiModalLabel<?= $wiki['id_wiki'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="wikiModalLabel<?= $wiki['id_wiki'] ?>"><?= $wiki['titre'] ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="data:image/jpeg;base64,<?= base64_encode($wiki['img_data']) ?>" class="img-fluid"
                                alt="<?= $wiki['titre'] ?>">
                            <h1><?= $wiki['titre'] ?></h1>
                            <p><?= $wiki['contenu'] ?></p>
                            <p>Categorie: <?= $wiki['categorie'] ?></p>
                            <p>Tags: <?= $wiki['tags'] ?></p>
                            <p>Date of Creation: <?= $wiki['datecreation'] ?></p>
                            <p>Created by: <?= $wiki['user_name'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>

    </div>

    <section class="hero-section">
        <h1 ckass="welkom">Welcome to Our Wiki!</h1>
    </section>

    
    <section class="container">
        <div class="row">
            <?php
foreach ($wikis as $wiki) {
    ?>
            <div class="col-md-4">
                <div class="card wiki-card" style="width: 18rem;">
                    <img src="data:image/jpeg;base64,<?= base64_encode($wiki['img_data']) ?>" class="card-img-top"
                        alt="<?= $wiki['titre'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wiki['titre'] ?></h5>
                        <p class="card-text"><?= $wiki['categorie'] ?></p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#wikiModal<?= $wiki['id_wiki'] ?>">Lire Wiki</a>
                    </div>
                </div>
            </div>

           
            <div class="modal fade" id="wikiModal<?= $wiki['id_wiki'] ?>" tabindex="-1" role="dialog"
                aria-labelledby="wikiModalLabel<?= $wiki['id_wiki'] ?>" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="wikiModalLabel<?= $wiki['id_wiki'] ?>"><?= $wiki['titre'] ?>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="data:image/jpeg;base64,<?= base64_encode($wiki['img_data']) ?>" class="img-fluid"
                                alt="<?= $wiki['titre'] ?>">
                            <h1><?= $wiki['titre'] ?></h1>
                            <p><?= $wiki['contenu'] ?></p>
                            <p>Categorie: <?= $wiki['categorie'] ?></p>
                            <p>Tags: <?= $wiki['tags'] ?></p>
                            <p>Date of Creation: <?= $wiki['datecreation'] ?></p>
                            <p>Created by: <?= $wiki['user_name'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </section>
                <section class="container">
                <h3>Categories</h3>
                <div class="row">
                    <?php foreach ($categories as $category) : ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $category['nom'] ?></h5>
                                    <p class="card-text"><?= $category['discription'] ?></p>
                                    <p class="card-text"><small class="text-muted">Created on <?= $category['dat'] ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <section>
            <section class="container">
            <div>
                <h3>Tags</h3>
                <ul>
                    <?php foreach ($tags as $tag) : ?>
                        <li><?= $tag['titre'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>