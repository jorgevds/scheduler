<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your php to do list: add a new item</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="index.php">
        <h1>
            Scheduler
        </h1>
    </a>

    <form method="POST" action="create.php" autocomplete="off">
        <label for="todotitle">Item</label>
        <input name="todoTitle" type="text" class="input-text" id="todotitle">
        <label for="tododesc">Description</label>
        <input name="todoDescription" type="text" class="input-text long-text">
        <input type="submit" name="submit" value="Submit" class="submit" id="create-button" onclick="buttonEffect()">
    </form>


    <?php
    require_once 'db_connect.php';

    if (isset($_POST['submit'])) {
        $title = $_POST['todoTitle'];
        $description = $_POST['todoDescription'];
        db();
        global $link;
        $query = "INSERT INTO todo(todoTitle, todoDescription, date)
    VALUES ('$title', '$description', now())";
        $insertTodo = mysqli_query($link, $query);
        if ($insertTodo) {
            echo "<h2 class='h2-header'>Your to do list has been updated</h2>";
        } else {
            echo mysqli_error($link);
        }
        mysqli_close($link);
    }

    ?>
    <a href='index.php' class="home-link">Return to your to do list</a>

    <footer>
        <h2>Copyright © <?php echo date("Y"); ?></h2>
    </footer>
    <script src="script.js"></script>
</body>

</html>