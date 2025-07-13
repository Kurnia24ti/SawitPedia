<?php
class Database {
    private $host = 'localhost'; // Sesuaikan jika host database Anda berbeda
    private $db_name = 'sawitpedia'; // Ganti dengan nama database Anda
    private $username = 'root'; // Ganti dengan username database Anda
    private $password = ''; // Ganti dengan password database Anda (biasanya kosong untuk XAMPP/WAMP)
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                                  $this->username,
                                  $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
            exit(); // Hentikan eksekusi jika koneksi gagal
        }
        return $this->conn;
    }
}

?>