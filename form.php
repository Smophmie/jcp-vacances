<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/formstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f88bf4155e.js" crossorigin="anonymous"></script>
    <title>Ajout/modification d'un voyage</title>
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

        <!-- Afficher le titre en fonction de si c'est un ajout ou une modification de voyage -->
        <?php
            if (isset($_GET['id'])){
                $travel_id = $_GET['id'];
                echo "<h1>Modifier un voyage</h1>";
                include_once "classes/travel.php";
                $travel = new Travel;
                $travelById = $travel->getAllTravelsById($travel_id);            
            } else {
                echo "<h1>Nouveau voyage</h1>";
            }
        ?>
        

        <form action="actions/add_and_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="travel_id" value="<?php echo (isset($travel_id))? $travel_id: '';?>">
            <input type="hidden" name="bnb-photo-url" value="<?php echo (isset($travel_id))? $travelById['bnb-photo-url']: '';?>">
            <input type="hidden" name="visits-photo-url" value="<?php echo (isset($travel_id))? $travelById['visits-photo-url']: '';?>">

            <div class="form_line">
                <select name="category" class="little_input" id="">
                    <option value="" disabled <?php echo(!isset($travelById['category_id']))? "selected": '';?>>Sélectionnez la catégorie</option>
                    <option value="1" <?php echo(isset($travelById['category_id'])&&$travelById['category_id']==1)? "selected": '';?>>Mer</option>
                    <option value="2" <?php echo(isset($travelById['category_id'])&&$travelById['category_id']==2)? "selected": '';?>>Montagne</option>
                    <option value="3" <?php echo(isset($travelById['category_id'])&&$travelById['category_id']==3)? "selected": '';?>>Campagne</option>
                </select>

                <!-- Select à insérer quand on ajoutera une table Location -->
                <!-- <select name="location" id="">
                    <option value="" disabled selected>Sélectionnez la région</option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select> -->
            </div>
            <div class="form_line">
                <input type="text" name="travel_name" class="little_input" placeholder="Nom du voyage" value="<?php echo (isset($travelById['title']))? $travelById['title']: '';?>">
                <input type="text" name="travel_duration" class="little_input" placeholder="Durée du voyage" value="<?php echo (isset($travelById['duration']))? $travelById['duration']: '';?>">
            </div>
            <div class="form_line">
                <input type="text" name="bnb_infos" class="big_input" placeholder="Informations sur l'hébergement" value="<?php echo (isset($travelById['bnb-infos']))? $travelById['bnb-infos']: '';?>">
            </div>
            <div class="form_line">
                <div>
                    <label for="bnb_photo">Sélectionnez une photo de l'hébergement:</label>
                    <input type="file" id="bnb_photo" name="bnb_photo" accept="image/png, image/jpeg" files="<?php echo (isset($travelById['bnb-photo-url']))? $travelById['bnb-photo-url']: '';?>">
                </div>
            </div>
            <div class="form_line">
                <input type="text" class="big_input" name="visits_infos" placeholder="Quelques idées découvertes" value="<?php echo (isset($travelById['visits-infos']))? $travelById['visits-infos']: '';?>">
            </div>
            <div class="form_line">
                <div>
                    <label for="visits_photo">Sélectionnez une photo illustrant les visites:</label>
                    <input type="file" id="visits_photo" name="visits_photo" accept="image/png, image/jpeg" files="<?php echo (isset($travelById['visits-photo-url']))? $travelById['visits-photo-url']: '';?>">
                </div>
            </div>
            <div class="form_line">
                <input type="text" class="little_input" name="price" placeholder="Tarif" value="<?php echo (isset($travelById['price']))? $travelById['price']: '';?>">
            </div>
            <div class="form_line">
                <div class="little_input">
                    <label for="pack">Séjour 2 pour 1 :</label>
                    <input type="checkbox" name="pack" id="pack" <?php echo(isset($travelById['pack_id'])&&$travelById['pack_id']==2)? "checked": '';?>>
                </div>
            </div>
            <div class="form_line">
                <input type="text" name="price_infos" class="big_input" placeholder="Informations sur les tarifs et options" value="<?php echo (isset($travelById['price-infos']))? $travelById['price-infos']: '';?>">
            </div>
            <div class="form_line">
                <input type="submit" value="Valider" class="submit_button">
            </div>
        </form>

</body>
</html>