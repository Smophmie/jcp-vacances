<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/dashboardstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f88bf4155e.js" crossorigin="anonymous"></script>
    <title>Vos voyages publiés</title>
</head>
<body>
    <?php
        session_start();
        // Si la session n'est pas associée à un utilisateur, le ramener sur la page de connexion
        if (empty($_SESSION["name"])){
            header("Location: index.php");
            exit();
        }
    ?>
    <header>
        <img src="images/logo_png.png" alt="" class="light_logo">
        <a href="actions/logout.php" class="logout">Se déconnecter</a>

    </header>
    <main>
        <nav>
            <div class="nav_link">
                <a href="dashboard.php"><i class="fa-solid fa-plane-departure"></i>Voyages publiés</a>
            </div>
            <div class="nav_link">
                <a href="form.php"><i class="fa-solid fa-square-plus"></i>Nouveau voyage</a>
            </div>
            <div class="nav_link">
                <a href="#"><i class="fa-regular fa-folder-open"></i>Voyages archivés</a>
            </div>
        </nav>
        <section>
        
            <h1>Voyages publiés</h1>

            <div class="filters_container">
                <div class="category_selection filter_container">
                    <i class="fa-solid fa-mountain-sun"></i>
                    <select name="category" id="category">
                        <option value="0"selected disabled>Catégories</option>
                        <option value="0">Toutes les catégories</option>
                        <option value="1">Mer</option>
                        <option value="2">Montagne</option>
                        <option value="3">Campagne</option>
                    </select>
                </div>
                <div class="search_bar filter_container">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="search" name="search_by_title" id="search_by_title" placeholder="Nom du voyage">
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th class="bigcell">Titre du séjour</th>
                        <th class="averagecell">Catégorie</th>
                        <th class="averagecell">Durée</th>
                        <th class="averagecell">Tarif</th>
                        <th class="littlecell"></th>
                        <th class="littlecell"></th>
                    </tr>
                </thead>
                <tbody id="template_container">
                  
                </tbody>
            </table>

        </section>
        <script src="script.js"></script> 
</body>
</html>
