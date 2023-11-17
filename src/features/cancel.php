<?php
session_start();
session_unset();
session_destroy();

// this is where you will need to add the logic that involves adding an incomplete status in the DB

// Redirect back to the game-form page with a brand new session
header("Location: ../../public/form/game-form.php");
exit();
?>
