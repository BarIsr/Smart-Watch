<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
</head>

<body>

    <?php
    include_once 'SqlController.php';
    include "header.html"; ?>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">

            </div>
            <div class="col-sm-8 text-left">


                <hr>
                <h3>The submitted times right now is:</h3>
                <p>
                    <?php //current settings page
                    $sql = "SELECT* FROM `clock_set`";  //query to get all the table
                    $rslt = mysqli_query($conn, $sql); // $rslt variable get the activation of the query



                    $rsltcheck = mysqli_num_rows($rslt); // checks if the table isnt empty
                    if ($rsltcheck > 0) {
                        while ($row = mysqli_fetch_assoc($rslt)) { //loop through the db rows to display them
                            // echo "<br>";
                            // echo $row["id"] . "<br>" . "<br>";
                            echo "<h3>date:</h3>";
                            echo $row["Day"] . "<br>";
                            echo "<h3>starting time :</h3>";
                            echo $row["startingTime"] . "<br>";
                            echo "<h3>ending time :</h3>";
                            echo $row["endingTime"] . "<br>";
                            echo "<h3>freq :</h3>";
                            if ($row["freq"] == 1)
                                echo " everyday" . "<br>";
                            else {

                                echo " only once" . "<br>";
                            }
                            //button to delete settings
                    ?>
                            <br>
                            <a href="Delete.php?id=<?php echo $row["id"]; ?>">Delete the row above</a>

                    <?php
                        }
                    }
                    ?>
                </p>

            </div>

            <?php include "footer.html" ?>
        </div>
    </div>



</body>

</html>