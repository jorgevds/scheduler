<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your to do list: your item</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="index.php">
        <h1>
            Scheduler
        </h1>
    </a>
    <?php
    require_once "db_connect.php";

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        db();
        global $link;
        $query = "SELECT todoTitle, todoDescription, date
    FROM todo
    WHERE id = '$id'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) !== 0) {
            $row = mysqli_fetch_array($result);
            if ($row) {
                $title = $row['todoTitle'];
                $description = $row['todoDescription'];
                $date = $row['date'];

                echo "
                <div class='card'>
                    <h2 class='h2-header'>$title</h2>
                    <label for='todo-text'>Description</label>
                    <h4 id='todo-text'>$description</h4>
                    <small>Date added: $date</small>
                </div>

                ";
            } else {
                echo "You've got nothing to do. Head on over to <a href='create.php'>your schedule</a> to get started!";
            }
        }
    }

    ?>
    <a href='index.php' class='home-link'>Return to your to do list</a>
    <footer>
        <h2>Copyright © <?php echo date("Y"); ?></h2>
    </footer>

</body>

</html>