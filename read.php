<?php



require('./database.php');



$querryAccount = "SELECT * FROM signup";

$sqlAccount = mysqli_query($connection, $querryAccount);

?>