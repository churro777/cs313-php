<?php session_start();
echo "inside phpContent/getCharacters.php <br />";
// get character names based off of the player

$statement = $db->prepare('SELECT charactername FROM character
                            WHERE player_id = (SELECT id FROM player WHERE username = :un);');
echo "statement prepared <br />";

$statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);
echo "parameters bound <br />";

try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem getting characters. Details: $ex";
}
echo "success!!";


$characterNames = $statement->fetchAll();

echo "fetchAll() worked";
?>

<?php foreach ($characterNames as $name): ?>
    <div class="row characterRow">
        <a class="col-xs-12"><?php echo $name; ?></a>
    </div>
    <hr>
<?php endforeach; ?>
