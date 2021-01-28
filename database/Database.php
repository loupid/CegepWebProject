<?php
class Database {

    private $host = '127.0.0.1';
    private $port = 3306;
    private $username = 'root';
    private $password = '';

    private $conn = null;

    public function __construct($database, $host = '127.0.0.1', $port = 3306, $username = 'root', $password = '') {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        return $this;
    }

    public function setDatabase($database) {
        $this->database = $database;
        return $this;
    }

    public function setHost($host = '127.0.0.1') {
        $this->host = $host;
        return $this;
    }

    public function setPort($port = 3306) {
        $this->port = $port;
        return $this;
    }

    public function setUsername($username = 'root') {
        $this->username = $username;
        return $this;
    }

    public function setPassword($password = '') {
        $this->password = $password;
        return $this;
    }

    public function connect() {
        try {
            $this->conn = new PDO('mysql:dbname='.$this->database.';host='.$this->host.';port='.$this->port, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->conn;
    }

}