<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your php to do list</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="index.php">
        <h1>
            Scheduler
        </h1>
    </a>
    <div class="card">
        <a class="add-item" href="create.php">Add to my schedule</a>

        <?php
        require_once "db_connect.php";
        db();
        global $link;
        $query = "SELECT *
        FROM todo";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) !== 0) {

            while ($row = mysqli_fetch_array($result)) {
                $id = $row["id"];
                $title = $row["todoTitle"];
                $date = $row["date"];

        ?>
                <ul>
                    <li>
                        <a href="detail.php?id=<?php echo $id ?>" id="strikethrough"><?php echo $title ?>
                        </a>
                    </li>
                    <div class="ul-buttons">
                        <button type="button"><a href="edit.php?id=<?php echo $id ?>">Edit</a></button>
                        <button type="button"><a href="delete.php?id=<?php echo $id ?>">Delete</a></button>
                        <button type="button" class="to-strike" onclick="strikethrough()">Complete</button>
                    </div>

                </ul>

        <?php
            }
        } else {
            echo "
        <h2 class='h2-header'>Looks like you've got nothing to do…</h2>
        <h3 class='h3-header'>Click on the link above to add to your to do list and get started!</h3>";
        }
        ?>
    </div>

    <footer>
        <h2>Copyright © <?php echo date("Y"); ?></h2>
    </footer>
    <script src="script.js"></script>

</body>

</html>