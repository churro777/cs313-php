<?php session_start();
// get character names based off of the player

$statement = $db->prepare('SELECT charactername FROM character
                            WHERE player_id = (SELECT id FROM player WHERE username = :un);');
$statement->bindParam(':un', $_SESSION["username"], PDO::PARAM_STR);

try {
    $statement->execute();
} catch (PDOException $ex) {
    echo "Problem getting characters. Details: $ex";
}

$namesResult = $statement->fetchAll();
?>

<?php foreach ($namesResult as $nameArray): ?>
    <div class="row characterRow">
        <a href="changeCharacter.php?newCharacter=<?php echo $nameArray[0]; ?>"><?php echo $nameArray[0]; ?></a>
    </div>
    <hr>
<?php endforeach; ?>
