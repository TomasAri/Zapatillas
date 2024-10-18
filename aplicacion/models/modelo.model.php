<?php

    class modelosModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=venta de zapatillas;charset=utf8', 'root', '');
        }
        public function getModelos(){
            //Ejecuto la consulta
            $query = $this->db->prepare('SELECT * FROM modelo');
            $query->execute();

            //Obtengo los datos en un arreglo de objetos
            $modelos = $query->fetchAll(PDO::FETCH_OBJ); 
    
            return $modelos;
        }

        public function getModelosId($id_fabrica) {
            $query = $this->db->prepare('SELECT * FROM modelo WHERE id_fabrica = ?');
            $query->execute([$id_fabrica]);

            $modelo = $query->fetchAll(PDO::FETCH_OBJ); 
            
            return $modelo;
        }

        public function getModelo($id_zapatilla) {
            $query = $this->db->prepare('SELECT * FROM modelo WHERE id_zapatilla = ?');
            $query->execute([$id_zapatilla]);

            $modelo = $query->fetch(PDO::FETCH_OBJ); 
            
            return $modelo;
        }
    
        public function getAllModelos(){
            $query = $this->db->prepare('SELECT * FROM modelo');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        }


        public function insertModelo($nombre, $precio, $stock, $id_fabrica) {
            $query = $this->db->prepare('INSERT INTO modelo(nombre, precio, stock, id_fabrica) VALUES (?, ?, ?, ?)');
            $query->execute([$nombre, $precio, $stock, $id_fabrica]);
            return $this->db->lastInsertId();
        }

        public function eraseModel($id){
            $query = $this->db->prepare('DELETE FROM modelo WHERE id_zapatilla = ?');
            $query->execute([$id]);
            
        }

        public function updateModelo($id_zapatilla, $nombre, $precio, $stock, $id_fabrica) {
            $query = $this->db->prepare('UPDATE modelo SET nombre = ?, precio = ?, stock = ?, id_fabrica = ? WHERE id_zapatilla = ?');
            $query->execute([$nombre, $precio, $stock, $id_fabrica, $id_zapatilla]);
        }

        public function getFabricaById($id_fabrica) {
            $query = $this->db->prepare('SELECT * FROM fabrica WHERE id = ?');
            $query->execute([$id_fabrica]);
            return $query->fetch(PDO::FETCH_OBJ); // Devuelve la fábrica como objeto
        }
    }


?>