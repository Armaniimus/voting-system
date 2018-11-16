<?php
/**
 *
 */
class DataHandler {

    function __construct($serverAddress, $dbname, $username, $password, $dbType = "mysql") {
        // $password = hash('sha256', $password);
        try {
            $this->conn = new PDO("mysql:host=$serverAddress;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function select() {
        $stmt = $this->conn->prepare("SELECT * FROM species");
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        var_dump($result);

    }
}



$DataHandler = new DataHandler("localhost", "monkey", "root", "password");
echo $DataHandler->select();




?>
