<?php
$conn_error = 'Could not connect';
$mysql_host = 'localhost';
// $mysql_user = 'waithaka';
// $mysql_password = 'tinbird09';
$mysql_user = 'root';
$mysql_password = '';
$mysql_db = 'maintenance';
$conn = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// define("DB_HOST", "localhost");
// define("DB_USER", "johngachihi");
// define("DB_PASSWORD", "kbt134pp");
// define("DB_DATABASE", "tubonge_database");
// class Connect {
// 	public function connectToDatabase() {
//         $connection = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

//         if($connection->connect_error) {
//             die("Connection failed: ". $connection->connect_error);
//         }

// 		return $connection;
// 	}
// }

class DBConnection {

    private static $host = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $database = "maintenance";

    private static $connection = null;

    private function __construct() { }

    private static function createConnection() {
        self::$connection = new mysqli(
            self::$host, self::$user, self::$password, self::$database
        );
    }

    public static function getConnection() {
        if(self::$connection == null) {
            DBConnection::createConnection();
        }
        return self::$connection;
    }

}

?>