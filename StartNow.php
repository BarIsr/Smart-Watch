<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start now</title>
</head>

<body>
    <?php include "header.html";
    include_once 'SqlController.php';
    ?>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">

            </div>
            <div class="col-sm-8 text-left">
                <h1>Active now</h1>

                <div>

                    <form action="" method="get">
                        <label for="stop_time">set time in hours:</label><br>
                        <input type="time" class="form-control" id="stop_time" name="stop_time" required>
                        </br>

                        <button>Start</button>

                    </form>
                </div>
                <?php // page to start now for a limited time
                $date_now = date("Y-m-d"); //gets the date today
                $current_time = time(); // gets the time right now
                $time = Date('h:i:s', $current_time); //formats the time to make calculations

                if (isset($_GET["stop_time"])) { //check if variable is set to prevent errors
                    $stop_time = ($_GET["stop_time"]); //gets the stopping time from the user
                    $insertTimed = "INSERT INTO `clock_set` (`Day`, `startingTime`, `endingTime`, `freq`) VALUES (CURRENT_DATE(), CURRENT_TIME(), '$stop_time', '0')";
                    mysqli_query($conn, $insertTimed); //inserts the row to the db
                }

                $sql = "SELECT* FROM `clock_set`";
                $sql_delete = "DELETE FROM `clock_set` WHERE freq=0";
                $rslt = mysqli_query($conn, $sql);

                $rsltcheck = mysqli_num_rows($rslt);
                if ($rsltcheck > 0) {
                    while ($row = mysqli_fetch_assoc($rslt)) {
                        $row["endingTime"] = strtotime($row["endingTime"]);
                        $time = strtotime(time());
                    }
                }
                ?>



            </div>

            <?php include "footer.html" ?>
        </div>
    </div>

</body>

</html>