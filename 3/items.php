<?php
class Items {
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $conn;
    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "test";

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Ошибка соединения: " . $this->conn->connect_error);
        }
    }

    private function create () {
        $sql = "CREATE TABLE articles (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(30) NOT NULL,
            text VARCHAR(1000) NOT NULL,
            date TIMESTAMP
        )";

        if ($this->conn->query($sql) === TRUE) {
            echo "Таблица создана<br>";
        } else {
            echo "Таблица не создана: " . $this->conn->error . "<br>";
        }
    }

    private function add ($title, $text) {
        $sql = "INSERT INTO articles(title,text,date) VALUES('".strval($title)."','".strval($text)."',NOW())";

        if ($this->conn->query($sql) === TRUE) {
            echo "Запись добавлена<br>";
        } else {
            echo "Запись не добавлена: " . $this->conn->error . "<br>";
        }
    }

    public function get ($id) {
        $this->create();
        $this->add(odin, dva);

        $sql = "SELECT * FROM articles WHERE id=".intval($id);

        if ($res = $this->conn->query($sql)) {
            while ($row = $res->fetch_assoc()) {
                print_r($row);
            }
        } else {
            echo "Нечего выводить: " . $this->conn->error . "<br>";
        }

        $this->conn->close();
    }
}