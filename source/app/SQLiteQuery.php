<?php

namespace App;

class SQLiteQuery {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    private function GetFetch($stmt) {
        $reg = [];

        while($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $reg[] = $rows;
        }
        // print json_encode($reg);
        return $reg;
    }

    public function Get() {
        $stmt = $this->pdo->query("SELECT * FROM registros");
        $reg = $this->GetFetch($stmt);
        return $reg;
    }

    public function GetType($type) {
        $stmt = $this->pdo->query("SELECT * FROM registros WHERE type = '$type'");
        $reg = $this->GetFetch($stmt);
        return $reg;
    }

    public function GetDeleted($deleted) {
        $stmt = $this->pdo->query("SELECT * FROM registros WHERE deleted = '$deleted'");
        $reg = $this->GetFetch($stmt);
        return $reg;
    }

    public function GetTypeAndDeleted($type, $deleted) {
        $stmt = $this->pdo->query("SELECT * FROM registros WHERE type = '$type' AND deleted = '$deleted'");
        $reg = $this->GetFetch($stmt);
        return $reg;
    }
}