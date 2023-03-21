<?php
class Connection{
    
    //Attribute
    private $host = 'localhost';
    private $username = 'lendme';
    private $password = 'lendme123';
    private $database = 'lendme';
    private $conn;

    // Leerer Konstruktor
    public function __construct(){
       
    }

    // Verbindung zur Datenbank
    public function connect(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $this->conn->connect_error);
        }
    }


    // Methoden

    // Abfrage SQL
    public function query($query) {
        $result = $this->conn->query($query);
        if (!$result) {
            die("Abfrage fehlgeschlagen: " . $this->conn->error);
        }
        return $result;
    }
    

    // Verbindung schließen
    public function close() {
        $this->conn->close();
    }
}
?>