<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your php to do list: edit an item</title>
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
        $query = "SELECT todoTitle, todoDescription
    FROM todo
    WHERE id = '$id'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            if ($row) {
                $title = $row["todoTitle"];
                $description = $row["todoDescription"];

                echo "
            <h2 class='h2-header'>Edit your to do item</h2>
            
            <form action='edit.php?id=$id' method='POST' autocomplete='off'>
                <label for='title' class='edit-label'>Title</label>
                <input type='text' name='title' value='$title' class='input-text' id='title'>
                <label for='description' class='edit-label'>Description</label>
                <input type='text' name='description' value='$description' class='input-text long-text' id='description'>
                <input type='submit' name='submit' value='Edit' class='submit'>
            </form>
            ";
            }
        }
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            $description = $_POST["description"];
            db();
            $query = "UPDATE todo
        SET todoTitle = '$title', todoDescription = '$description'
        WHERE id = '$id' ";
            $insertEdited = mysqli_query($link, $query);
            if ($insertEdited) {
                echo "<h2 class='h2-header'>Edit successful</h2>";
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