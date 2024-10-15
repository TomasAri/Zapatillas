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
    
    }

?>