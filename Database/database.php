<?php
class Connection {
    private string $host = 'bfi.bbs-me.org';
    private string $username = 'lendme';
    private string $password = 'lendme123';
    private string $database = 'lendme';

    private int $port = 1568;
    private $conn;

    public function __construct() {}

    public function connect(): mysqli {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database, $this->port);
        if ($this->conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function query($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Abfrage fehlgeschlagen: " . mysqli_error($this->conn));
        }
        return $result;
    }

    public function close() {
        $this->conn->close();
    }
}
?>