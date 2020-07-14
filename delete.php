<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your php to do list: delete an item</title>
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
        $query = "SELECT *
    FROM todo
    WHERE id = '$id'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row["todoTitle"];
            $description = $row["todoDescription"];
            if ($row) {

                echo "
            <h2 class='h2-header'>Delete your to do item</h2>
            
            <form action='delete.php?id=$id' method='POST'>
                <h3>Are you sure you want to delete <a href='detail.php?id=$id' class='todo'>$title</a> from your to do list?</h3>
                <h4 class='h4-description'>$description</h4>
                <input type='submit' name='submit' value='Delete' class='submit'>
            </form>
            ";
            }
        }
        if (isset($_POST["submit"])) {
            db();
            $query = "DELETE FROM todo
        WHERE id = '$id' ";
            $delete = mysqli_query($link, $query);
            if ($delete) {
                header("location:index.php");
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