<?php
class Product
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function all()
    {
        return $this->db->query('SELECT * FROM products ORDER BY id DESC')->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($d)
    {
        $stmt = $this->db->prepare(
            'INSERT INTO products (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)'
        );
        return $stmt->execute([$d['nombre'], $d['descripcion'], $d['precio'], $d['stock']]);
    }

    public function update($id, $d)
    {
        $stmt = $this->db->prepare(
            'UPDATE products SET nombre = ?, descripcion = ?, precio = ?, stock = ? WHERE id = ?'
        );
        return $stmt->execute([$d['nombre'], $d['descripcion'], $d['precio'], $d['stock'], $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM products WHERE id = ?');
        return $stmt->execute([$id]);
    }
}