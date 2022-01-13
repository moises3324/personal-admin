<?php


class Connection
{
    private string $host = 'localhost';
    private string $database = 'personal_admin';
    private string $username = 'nisferes';
    private string $password = 'nisferes1*';

    /**
     * Connection constructor.
     */
    public function __construct()
    {
    }

    public function getConnection(): PDO
    {
        $conn = null;
        try {
            $conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }
}