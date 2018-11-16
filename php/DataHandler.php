<?php
class DataHandler {
    private $conn;
    public $usedID;
    function __construct($serverAddress, $dbname, $username, $password, $dbType = "mysql") {
        try {
            $this->conn = new PDO("mysql:host=$serverAddress;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function __destruct(){

    }

    public function create($table, $values, $columns = null) {
        if ($columns !== null) {
            $columns = "($columns)";
        }

        $sql = "INSERT INTO $table $columns
        VALUES ($values)";

        $this->conn->exec($sql);
        $this->usedID = $this->conn->lastInsertId();
        return TRUE;
    }

    public function read($sql) {
        $stmt = $this->conn->prepare();
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        var_dump($result);
    }

    public function update($sql, $where) {

    }

    public function delete($sql, $where) {

    }
}
?>
