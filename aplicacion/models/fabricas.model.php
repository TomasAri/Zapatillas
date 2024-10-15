<?php

    class fabricaModel{
        private $db;

        public function __construct(){
            $this->db = new PDO('mysql:host=localhost;dbname=venta de zapatillas;charset=utf8', 'root', '');
        }

        public function getFabricas(){
            //Ejecuto la consulta
            $query = $this->db->prepare('SELECT * FROM fabrica');
            $query->execute();

            //Obtengo los datos en un arreglo de objetos
            $fabricas = $query->fetchAll(PDO::FETCH_OBJ); 
    
            return $fabricas;
        }

        public function getFabrica($id) {
            $query = $this->db->prepare('SELECT * FROM fabrica WHERE id = ?');
            $query->execute([$id]);

            $fabrica = $query->fetch(PDO::FETCH_OBJ); 
            
            return $fabrica;
        }
    }

?>