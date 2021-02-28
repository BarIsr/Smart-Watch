<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active</title>
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
                <?php
                date_default_timezone_set('Asia/Jerusalem');
                $date_now = date("Y-m-d");
                $current_time = time();

                $sql = "SELECT* FROM `clock_set`";
                $sql_delete = "DELETE FROM `clock_set` WHERE freq=0";
                $rslt = mysqli_query($conn, $sql);

                $rsltcheck = mysqli_num_rows($rslt);
                if ($rsltcheck > 0) {
                    while ($row = mysqli_fetch_assoc($rslt)) {
                        $row["startingTime"] = strtotime($row["startingTime"]);
                        $row["endingTime"] = strtotime($row["endingTime"]);

                        if (($date_now == $row["Day"] && (time()) <= $row["endingTime"] && (time()) >= $row["startingTime"])) {

                            echo "oN!" . "<br>";
                        } else {
                            echo "Off" . "<br>";
                        }
                        if ($row["freq"] == 0 && $row["endingTime"] <= (time()))
                            mysqli_query($conn, $sql_delete);
                    }
                }
                ?>
            </div>

            <?php include "footer.html" ?>
        </div>
    </div>
</body>
</body>

</html>