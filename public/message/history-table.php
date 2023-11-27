<?php 
    include_once "../../src/features/history.php";
    // Instantiate the History class
    $gameHistory = getGameHistory();


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Game History</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../../public/assets/css/history.css" />  
</head>

<body>
    <div class="main">

        <?php include '../../public/template/nav.php'; ?>
       
        
        <div class="container_2">
            <div class="promo-container ">
                <h2>Game History</h2>
            </div>
            <!--------- This is where the table will go to show the game history data that will be retreived from the DB --------->
            <div class="promo-container ">
                <table class = "history-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Outcome</th>
                            <th>Lives Used</th>
                            <th>Date and Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($gameHistory as $row) : ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['fName']; ?></td>
                                <td><?php echo $row['lName']; ?></td>
                                <td><?php echo $row['result']; ?></td>
                                <td><?php echo $row['livesUsed']; ?></td>
                                <td><?php echo $row['scoreTime']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</body>

</html>