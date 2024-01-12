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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>