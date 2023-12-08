<?php
namespace OrangDalam\PeminjamanRuangan\Models;

use config\Database;

class AuthModel {
    private $table = "user";
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($username) {
        $this->db->query("SELECT id, username, password, level FROM " . $this->table . " WHERE username = :user");
        $this->db->bind(":user", $username);
        return $this->db->single();
    }
}