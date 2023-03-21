<?php
class Connection{
    
    //Attribute
    private string $host = 'localhost';
    private string $username = 'lendme';
    private string $password = 'lendme123';
    private string $database = 'lendme';
    private $conn;

    // Leerer Konstruktor
    public function __construct(){
       
    }

    // Verbindung zur Datenbank
    public function connect(): void
    {
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
    public function close(): void
    {
        $this->conn->close();
    }
}
?>