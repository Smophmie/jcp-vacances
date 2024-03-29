<?php
    include_once "../classes/travel.php";
    $travel = new Travel();

    $selectedTours = array();


    if (isset($_GET['category']) && isset($_GET['searchvalue']) && (!empty($_GET['searchvalue']) OR !empty($_GET['category']))){
        if (!empty($_GET['category']) && empty($_GET['searchvalue'])){
            $selectedTours=$travel->getTravelsByCategory($_GET['category']);
        }
        elseif (!empty($_GET['searchvalue']) && empty($_GET['category'])){
            $allTravels=$travel->getAllTravels();
            
            foreach ($allTravels as $travel) {
                $travelTitle = $travel['title'];
                $searchValue = $_GET['searchvalue'];
                if(str_contains($travelTitle,$searchValue)){
                    array_push($selectedTours,$travel);
                }
            }
        }
        elseif (!empty($_GET['searchvalue']) && !empty($_GET['category'])) {
            $allTravels=$travel->getAllTravels();
            
            foreach ($allTravels as $travel) {
                $travelTitle = $travel['title'];
                $searchValue = $_GET['searchvalue'];
                if(str_contains($travelTitle,$searchValue)){
                    array_push($selectedTours,$travel);
                }
            }
            foreach ($selectedTours as $selectedTour) {
                if(!str_contains($selectedTour['category_id'], $_GET['category'])){
                    unset($selectedTours[array_search($selectedTour, $selectedTours)]);
                }
            }
        } 
    }
    else {
        $selectedTours=$travel->getAllTravels();
    }

    include_once "../templates/templatevoyage.php"
?>