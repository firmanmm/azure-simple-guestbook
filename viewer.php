<?php
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\FetchMode;

if (!\defined('RUNNER')) {
    die("Direct execution not allowed");
}

$guests = array();
/**
 * @var Connection $conn
 */
$conn = $conn;
$stmt = $conn->query("SELECT * FROM dbo.guestbook");
$guests = $stmt->fetchAll(FetchMode::ASSOCIATIVE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azure Guestbook</title>
    <link rel="stylesheet" href="asset/css/materialize.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col m4 offset-m4">
                <form class="section" action="" method="POST">
                    <h3 class="title center amber-text">Guest Form</h3>
                    <div class="section">
                        <div class="input-field col m12">
                            <input id="in_name" type="text" class="validate" name="name" required minlength="4">
                            <label for="in_name">Name</label>
                        </div>  
                        <div class="input-field col m12">
                            <input id="in_email" type="email" class="validate" name="email" required minlength="4">
                            <label for="in_email">Email</label>
                        </div>  
                    </div>
                    <div class="row center">
                        <button class="btn waves-effect waves-light" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <table class="highlight striped">
                <thead class="amber white-text">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody class="amber-text">
                    <?php foreach($guests as $guest) { ?>
                    <tr>
                        <td><?php echo $guest['id']; ?></td>
                        <td><?php echo $guest['name']; ?></td>
                        <td><?php echo $guest['email']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<script src="asset/js/jquery.min.js"></script>
<script src="asset/js/materialize.min.js"></script>