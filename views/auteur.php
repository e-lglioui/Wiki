<?php include "includes/header.php"; ?>

<body>
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addWikiModal">
            Ajouter Wiki
        </button>
    </div>

    <!-- Add Wiki Modal -->
    <div class="modal fade" id="addWikiModal" tabindex="-1" role="dialog" aria-labelledby="addWikiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addWikiModalLabel">Ajouter Wiki</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Wiki Form -->
                    <form action="" method="post" name="wikiforme" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="titre">Titre de Wiki</label>
                            <input type="text" class="form-control" id="titre" name="titre" required>
                        </div>

                        <div class="form-group">
                            <label for="contenu">Contenu de Wiki</label>
                            <textarea class="form-control" id="contenu" name="contenu" rows="4" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="categorie">Catégorie</label>
                            <select class="form-control" id="categorie" name="categorie" required>
                                <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>"><?= $category['nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <?php foreach ($tags as $tag) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tag<?= $tag['id'] ?>" name="tags[]"
                                    value="<?= $tag['id'] ?>">
                                <label class="form-check-label" for="tag<?= $tag['id'] ?>"><?= $tag['titre'] ?></label>
                            </div>
                            <?php endforeach; ?>
                        </div>


                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>

                        <button type="submit"  name="ajouterwiki" class="btn btn-primary">Ajouter</button>
                    </form>
                    <!-- End Wiki Form -->
                </div>
            </div>
        </div>
    </div>
    
      <section class="container">
        <div class="row">
            
<?php foreach ($wikis as $wiki) : ?>
    
            <div class="col-md-4">
                <div class="card wiki-card" style="width: 18rem;">
                    <img src="data:image/jpeg;base64,<?= base64_encode($wiki['img_data']) ?>" class="card-img-top"
                        alt="<?= $wiki['titre'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wiki['titre'] ?></h5>
                        <p class="card-text"><?= $wiki['categorie'] ?></p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#wikiModal<?= $wiki['id_wiki'] ?>">Lire Wiki</a>
                            <form method="post">
    <input type="hidden" name="wikiId" value="<?= $wiki['id_wiki'] ?>">
    <button type="submit" name="deleteWiki" class="btn btn-danger">Supprimer</button>
</form>
                    </div>
                </div>
            </div>

           <!-- wiki modal-->
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
                        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateWikiModal<?= $wiki['id_wiki'] ?>">Update Wiki</button>
        </div>
                    </div>
             </div>
            </div>
          

          <!-- Update Wiki Modal -->
<div class="modal fade" id="updateWikiModal<?= $wiki['id_wiki'] ?>" tabindex="-1" role="dialog" aria-labelledby="updateWikiModalLabel<?= $wiki['id_wiki'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateWikiModalLabel<?= $wiki['id_wiki'] ?>">Update Wiki</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Update Wiki Form -->
                <form action="" method="post" name="updateWikiform" enctype="multipart/form-data">
                    <!-- Include input fields with the existing wiki data -->
                    <input type="hidden" name="wikiId" value="<?= $wiki['id_wiki'] ?>">

                    <div class="form-group">
                        <label for="updateTitre">Updated Titre de Wiki</label>
                        <input type="text" class="form-control" id="updateTitre" name="updateTitre" value="<?= $wiki['titre'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="updateContenu">Updated Contenu de Wiki</label>
                        <textarea class="form-control" id="updateContenu" name="updateContenu" rows="4" required><?= $wiki['contenu'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="updateCategorie">Updated Catégorie</label>
                        <select class="form-control" id="updateCategorie" name="updateCategorie" required>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category['id'] ?>" <?= ($wiki['id_categorie'] == $category['id']) ? 'selected' : '' ?>>
                                    <?= $category['nom'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                    <label>Updated Tags</label>
                    <?php foreach ($tags as $tag) : ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="updateTag<?= $tag['id'] ?>" name="updateTags[]" value="<?= $tag['id'] ?>" <?= (isset($selectedTags) && in_array($tag['id'], $selectedTags)) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="updateTag<?= $tag['id'] ?>"><?= $tag['titre'] ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                    <div class="form-group">
                        <label for="updateImage">Updated Image</label>
                        <input type="file" class="form-control-file" id="updateImage" name="updateImage">
                    </div>

                    <button type="submit" name="updateWiki" class="btn btn-primary">Update</button>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>