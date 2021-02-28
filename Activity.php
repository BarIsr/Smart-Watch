<?php

include_once 'SqlController.php';
//$cont = new Controller();
if (isset($_GET["day"]) && isset($_GET["s_time"]) && isset($_GET["e_time"])) {
    if (isset($_GET["freq"]))
        $freq = ($_GET["freq"]);
    $day = ($_GET["day"]);
    $s_time = ($_GET["s_time"]);
    $e_time = ($_GET["e_time"]);
    $current_time = time();
    $now = DateTime::createFromFormat('h:i a', $current_time);
    $start = DateTime::createFromFormat('h:i a', $s_time);
    $end = DateTime::createFromFormat('h:i a', $e_time);

    $sql = "INSERT INTO `clock_set` (`Day`, `startingTime`, `endingTime`, `freq`) VALUES ('$day', '$s_time', '$e_time', '$freq')";
    mysqli_query($conn, $sql);

    if ($now > $start && $now < $end) {
        echo "onnnnn";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Avtivity</title>
</head>

<body>
    <?php include "header.html"; ?>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">

            </div>
            <div class="col-sm-8 text-left">
                <div class="mx-auto">
                    <h1>Add Your Activity</h1>
                </div>

                <form action="" method="get">
                    <label for="day">Day:</label><br>
                    <input type="date" id="day" class="form-control" name="day" required>
                    <br>

                    <label for="s_time">Starting time:</label><br>
                    <input type="time" class="form-control" id="s_time" name="s_time" required>
                    </br>

                    <label for="e_time">Ending time:</label><br>
                    <input type="time" class="form-control" id="e_time" name="e_time" required>
                    </br>

                    <div class="input-group-text">
                        <input type="radio" id="everyday" name="freq" value="1">
                        <label for="everyday"> Everyday</label><br>


                        <input type="radio" id="only_once" name="freq" value="0">
                        <label for="only_once">Only once</label><br>


                        <button>Submit</button>
                    </div>

                </form>
            </div>

            <?php include "footer.html" ?>
        </div>
    </div>


</body>

</html>