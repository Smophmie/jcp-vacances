<?php
    class Travel {
        public $id; 
        public $user_id; 
        public $pack_id;
        public $category_id;
        public $title;
        public $duration;
        public $price;
        public $priceInfos;
        public $bnbInfos;
        public $bnbPhotoUrl;
        public $visitsInfos;
        public $visitsPhotoUrl;

        public function add($pack_id, $category_id, $title, $duration, $price, $priceInfos, $bnbInfos, $bnbPhotoUrl, $visitsInfos, $visitsPhotoUrl){
            include_once "db.php";
            $db = new Db();
            $db->login();

            $request = $db->connexion->query("
            INSERT INTO `travels`(`pack_id`, `category_id`, `title`, `duration`, `price`, `price-infos`, `bnb-infos`, `bnb-photo-url`, `visits-infos`, `visits-photo-url`) 
            VALUES ($pack_id, $category_id, '$title', '$duration', $price, '$priceInfos', '$bnbInfos', '$bnbPhotoUrl', '$visitsInfos', '$visitsPhotoUrl')
            "); 
            
            $db->logout();
        }

        public function getAllTravelsById($travelId){
            include_once "db.php";
            $db = new Db();
            $db->login();

            $request = $db->connexion->query("
            SELECT * FROM `travels` WHERE `travel_id` = $travelId
            "); 

            $datas=$request->fetch();
            return $datas;
               
            $db->logout();
        }

        public function getAllTravels(){
            include_once "db.php";
            $db = new Db();
            $db->login();

            $request = $db->connexion->query("
            SELECT * FROM `travels`
            "); 

            $datas=$request->fetchAll();
            return $datas;
               
            $db->logout();
        }

        public function getTravelsByCategory($categoryId){
            include_once "db.php";
            $db = new Db();
            $db->login();

            if ($categoryId=='0'){
                $request = $db->connexion->query("
                SELECT * FROM `travels`
                ");
            } else {
                $request = $db->connexion->query("
                SELECT * FROM `travels` WHERE `category_id` = $categoryId
                ");
            } 

            $datas=$request->fetchAll();
            return $datas;
               
            $db->logout();
        }

        public function update($travelId, $pack_id, $category_id, $title, $duration, $price, $priceInfos, $bnbInfos, $bnbPhotoUrl, $visitsInfos, $visitsPhotoUrl){
            include_once "db.php";
            $db = new Db();
            $db->login();

            $request = $db->connexion->query("
            UPDATE `travels` SET `pack_id`=$pack_id,`category_id`=$category_id,`title`='$title',`duration`='$duration',`price`=$price,`price-infos`='$priceInfos',`bnb-infos`='$bnbInfos',`bnb-photo-url`='$bnbPhotoUrl',`visits-infos`='$visitsInfos',`visits-photo-url`='$visitsPhotoUrl' WHERE `travels`.`travel_id` =$travelId
            "); 
            
            $db->logout();
        }

        

        public function delete($travelId){
            include "db.php";
            $db = new Db();
            $db->login();

            $request = $db->connexion->query("
            DELETE FROM travels WHERE `travels`.`travel_id` =$travelId
            "); 
            
            $db->logout();
        }
    }

    // $cannesTravel = new Travel;
    // $cannesTravel->add(1,1,"abc","def",700,"ghi","jkl","mno","pqr","stu");
    // $cannesTravel->update(27,1,1,"hello","def",700,"ghi","jkl","mno","pqr","stu");
    
?>