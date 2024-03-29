<?php
foreach ($selectedTours as $tour) { 
?>
    <tr>
        <td class="bigcell">
            <?php
                echo $tour['title'];
            ?>
        </td>
        <td class="averagecell">
            <?php
                $category_id = $tour['category_id'];
                include_once '../classes/db.php';
                $db = new Db();
                $db->login();
                
                $request2 = $db->connexion->query("
                SELECT `category-name` FROM `categories` WHERE `category_id` = $category_id
                "); 
                $category = $request2->fetch();
                $db->logout();
                
                echo $category['category-name'];
            ?>
        </td>
        <td class="averagecell">
            <?php
                echo $tour['duration'];
            ?>
        </td>
        <td class="averagecell">
            <?php
                echo $tour['price'] . "€";
            ?>
        </td>
        <td class="littlecell">
            <a href="form.php?id=<?php echo $tour['travel_id']?>"><i class="fa-solid fa-gears"></i></a>
        </td>
        <td class="littlecell">
            <a href="actions/delete.php?id=<?php echo $tour['travel_id']?>"><i class="fa-solid fa-trash"></i></a>
        </td>
    </tr>
<?php
}
?>