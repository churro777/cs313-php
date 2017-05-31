<?php
session_start();

if ($_SESSION["newUser"] == "true"){
    echo "we did it";
}

require 'connectToDb.php';

?>

<?php foreach ($db->query('select * from race') as $row): ?>
    <label>
        <input type="checkbox" name="topics" value="<?php echo $row[1] ?>"> <?php echo $row[1] ?>
    </label>
    <br>
<?php endforeach; ?>
