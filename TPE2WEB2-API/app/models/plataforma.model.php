<?php

class PlataformaModel
{

    private $db;

    function __construct()
    {
        $this->db = $this->connect();
    }

    private function connect()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=tpe;charset=utf8', 'root', '');
        return $db; 
    }

    function getPlataformas($order = 'ASC')
    {
        $query = 'SELECT * from plataforma';

        if ($order == 'DESC' || $order == 'ASC') {
            $query = $query . ' ORDER BY nombre ' . $order;
        }

        $query = $this->db->prepare($query);
        $query->execute();

        $allPlataformas =  $query->fetchAll(PDO::FETCH_OBJ);

        return $allPlataformas;
    }

    function get($id) {
        $query = $this->db->prepare('SELECT * FROM plataforma WHERE id = ?');
        $query->execute([$id]);

        $plataformas =  $query->fetch(PDO::FETCH_OBJ);

        return $plataformas;

    }
    function insert($nombre, $anios_activo)
    {
        $query = $this->db->prepare('INSERT INTO plataforma (nombre, anios_activo) VALUES (?, ?)');
        $query->execute([$nombre, $anios_activo]);

        return $this->db->lastInsertId();
    }
    function remove($id)
    {
        $query = $this->db->prepare('DELETE FROM plataforma WHERE id = ?');
        $query->execute([$id]);
    }
    function update($id, $nombre, $anios_activo)
    {
        $query = $this->db->prepare('UPDATE plataforma SET nombre = ?, anios_activo = ? WHERE id= ?');
        $query->execute([$nombre, $anios_activo, $id]);
    }
}
