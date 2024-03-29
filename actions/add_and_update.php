<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $category = intval($_POST['category']);

        $travel_name = $_POST['travel_name'];

        $travel_duration = $_POST['travel_duration'];

        $bnb_infos = $_POST['bnb_infos'];

        $visits_infos = $_POST['visits_infos'];

        $price = $_POST['price'];

        if (isset($_POST['pack'])){
           $pack_id = 2; 
        } else {
            $pack_id = 1;
        }

        $price_infos = $_POST['price_infos'];

        if (!empty($_FILES["bnb_photo"]["tmp_name"])){
            // Envoi des fichiers téléchargés dans le dossier upload
            $target_dir = "jcp-vacances/upload/";

            $bnb_image_name = basename($_FILES["bnb_photo"]["name"]);
            $image_url = $_SERVER['DOCUMENT_ROOT']."/". $target_dir . $bnb_image_name;
            $imageFileType = strtolower(pathinfo($image_url, PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["bnb_photo"]["tmp_name"], $image_url)) {
                $bnb_photo_absolute_url = "https://".$_SERVER['HTTP_HOST']. "/" . $target_dir . $bnb_image_name ;
                echo "Image ok";
            } else {
                echo "image non ok";
            }
        } else {
            $bnb_photo_absolute_url = $_POST['bnb-photo-url'];
        }
        
        if (!empty($_FILES["visits_photo"]["tmp_name"])){
            // Envoi des fichiers téléchargés dans le dossier upload
            $target_dir = "jcp-vacances/upload/";

            $visits_image_name = basename($_FILES["visits_photo"]["name"]);
            $image_url = $_SERVER['DOCUMENT_ROOT']."/". $target_dir . $visits_image_name;
            $imageFileType = strtolower(pathinfo($image_url, PATHINFO_EXTENSION));
            if (move_uploaded_file($_FILES["visits_photo"]["tmp_name"], $image_url)) {
                $visits_photo_absolute_url = "https://".$_SERVER['HTTP_HOST']. "/" . $target_dir . $visits_image_name ;
                echo "Image ok";
            } else {
                echo "image non ok";
            }
        } else {
            $visits_photo_absolute_url = $_POST['visits-photo-url'];
        }



        include_once "../classes/travel.php";
        $travel= new Travel;

        if (!empty($_POST['travel_id'])){
            $travel_id=$_POST['travel_id'];
            $travel->update($travel_id, $pack_id, $category, $travel_name, $travel_duration, $price, $price_infos, $bnb_infos, $bnb_photo_absolute_url, $visits_infos, $visits_photo_absolute_url);
        } else {
            $travel->add($pack_id, $category, $travel_name, $travel_duration, $price, $price_infos, $bnb_infos, $bnb_photo_absolute_url, $visits_infos, $visits_photo_absolute_url);
        }

        header("Location: ../dashboard.php");
        exit();
    }
?>