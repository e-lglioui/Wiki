<?php include "includes/header.php"; ?>

<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bb {
        height: 100%;
        display: flex;
    }

    .sidebar {
        background-color: #343a40;
        color: white;
        padding: 15px;
        height: 100vh; 
    }

    .content {
        flex-grow: 1;
        padding: 15px;
        height: 100vh; 
        overflow-y: auto; 
    }

   
    .card {
        margin-bottom: 15px;
    }

    .modal-dialog {
        max-width: 80%;
    }

    .modal-content {
        height: 80vh; 
        overflow-y: auto; 
    }
</style>

<body class="bg-light">
    <div class="bb">
        <!-- Sidebar -->
        <aside class="col-md-3 sidebar">
            <h2>Admin Dashboard</h2>
            <ul class="nav flex-column">
                <li class="nav-item" data-bs-toggle="modal" data-bs-target="#categorieModal">Ajouter Categorie</li>
                <li class="nav-item" data-bs-toggle="modal" data-bs-target="#tagModal">Ajouter Tag</li>
                <li class="nav-item" ><a href="#statistiques"> Statistique</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="col-md-9 content">
            <!--searche-->
            <div id="livesearch"></div>
            <!-- Section for displaying categories -->
            <div>
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

            <!-- Section for displaying tags -->
            <div>
                <h3>Tags</h3>
                <ul>
                    <?php foreach ($tags as $tag) : ?>
                        <li><?= $tag['titre'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            
            <!-- Section for displaying wikis -->

<section class="container">
    <div class="row">
  
        <?php foreach ($wikis as $wiki) : ?>
            
            <div class="col-md-4">
                <div class="card wiki-card">
                    <img src="data:image/jpeg;base64,<?= base64_encode($wiki['img_data']) ?>" class="card-img-top" alt="<?= $wiki['titre'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $wiki['titre'] ?></h5>
                        <p class="card-text"><?= $wiki['categorie'] ?></p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#wikiModal<?= $wiki['id_wiki'] ?>">Lire Wiki</a>

                        <!--  button disarchiver -->
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#unarchiveModal<?= $wiki['id_wiki'] ?>">
                            Disarchiver
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Wiki Modal -->
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

            <!-- Disarchiver Modal -->
            <div class="modal fade" id="unarchiveModal<?= $wiki['id_wiki'] ?>" tabindex="-1" role="dialog" aria-labelledby="unarchiveModalLabel<?= $wiki['id_wiki'] ?>" aria-hidden="true">
            <?=$_SESSION['wiki_id'] =$wiki['id_wiki'] ?>
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="unarchiveModalLabel<?= $wiki['id_wiki'] ?>">Unarchive Wiki</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <Form method="post">
                            <p>Vous voulez archever cette wiki?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        
                            <button name="Disarchiver" class="btn btn-warning">Disarchiver</a>
                        </div>
                             </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


    <!-- Categorie Modal -->
    <div class="modal fade" id="categorieModal" tabindex="-1" aria-labelledby="categorieModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categorieModalLabel">Ajouter Categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="categorieTitre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="categorieTitre" name="titre" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorieDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="categorieDescription" name="description" rows="3" required></textarea>
                        </div>
                        <button type="submit" name="submitCategorie" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tag Modal -->
    <div class="modal fade" id="tagModal" tabindex="-1" aria-labelledby="tagModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tagModalLabel">Ajouter Tag</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="mb-3">
                            <label for="tagTitre" class="form-label">Titre de Tag</label>
                            <input type="text" class="form-control" id="tagTitre" name="titre" required>
                        </div>
                        <button type="submit" name="submitTag" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="container" id="statistiques">
    <h2>Statistiques</h2>

    <!-- Statistics for Categories -->
    <div class="mb-4">
        <h3>Statistiques des Catégories</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $catsta ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Statistics for Tags -->
    <div class="mb-4">
        <h3>Statistiques des Tags</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?=  $tagsta?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Statistics for Users -->
    <div class="mb-4">
       
    </div>
</section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl
</body>
