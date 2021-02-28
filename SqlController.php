<?php


/*
class Controller
{

   
    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $database = "smart_clock_db";

    public $con = null;

    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if ($this->con->connect_error) {
            echo "fail" . $this->con->connect_error;
        } else {
            echo "whoo!";
        }
    }
}*/

$host = "localhost";
$username = "root";
$password = "";
$database = "clock";
// Create connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "";
/*
$host = "localhost";
$user = "root";
$password = "";

$connection = mysqli_connect($host, $user, $password, $database);
*/
