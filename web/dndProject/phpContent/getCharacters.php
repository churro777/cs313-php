<?php session_start();
echo "inside phpContent/getCharacters.php";
// get character names based off of the player
$statement = $db->prepare('SELECT charactername FROM character
                            WHERE player_id = (SELECT id FROM player WHERE username = :un);');
echo "statement prepared";

$statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
echo "parameters bound";

$statement->execute();


$characterNames = $statment->fetchAll();
?>

<?php foreach ($characterNames as $name): ?>
    <div class="row characterRow">
        <a class="col-xs-12"><?php echo $name; ?></a>
    </div>
    <hr>
<?php endforeach; ?>
