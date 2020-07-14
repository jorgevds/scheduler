<?php
function db()
{
    global $link;
    $link = mysqli_connect("localhost", "root", "5fe5a8af", "todolist")
    or die("Could not connect to database");
    return $link;
}

?>