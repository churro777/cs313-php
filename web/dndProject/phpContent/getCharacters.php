<?php session_start();
// get character names based off of the player
// $statement = $db->prepare('SELECT charactername FROM character
//                             WHERE player_id = (SELECT id FROM player WHERE username = :un);');
//
// $statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
//
// $statement->execute();
//
// $characterNames = $statment->fetchAll();
?>

<?php foreach ($characterNames as $name): ?>
    <div class="row characterRow">
        <a class="col-xs-12"><?php echo $name; ?></a>
    </div>
    <hr>
<?php endforeach; ?>
