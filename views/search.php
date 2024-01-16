<?php   foreach ($wikis as $wiki) {
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