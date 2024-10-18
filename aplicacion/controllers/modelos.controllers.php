<?php
    require_once './aplicacion/models/modelo.model.php';
    require_once './aplicacion/view/modelos.view.php';

class modelosControllers{
    private $models;
    private $view;

    public function __construct($res) {
        $this->models = new modelosModel(); // Inicializa la propiedad con una instancia de fabricaModel
        $this->view = new modelosView($res->user); // Asegúrate de inicializar también la vista si es necesario
    }

    public function showListarModelos(){
        $modelos = $this->models->getModelos();
        return $this->view->showListModelos($modelos);
    }

    public function getmodelos(){
        $modelos = $this->models->getModelos();
        return $modelos;
    }

    public function showModelos(){
        $modelos = $this->models->getModelos();
        return $this->view->showModelos($modelos);
    }

    public function showModelosid($id_fabrica){
        $modelos = $this->models->getModelosId($id_fabrica);
        return $modelos;
    }
    

    public function showModeloDetails($id_zapatilla) {
        $modelo = $this->models->getModelo($id_zapatilla);
        if ($modelo) {
            return $this->view->showdetailModelo($modelo);
        }
    }

    public function listaaddModelo() {
        $modelos = $this->models->getAllModelos();
        $fabricas = $this->models->getAllFabricas(); 
        $this->view->showListaModelos($modelos, $fabricas); 
    }

    public function addModelo() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta completar el nombre');
        }
    
        if (!isset($_POST['id_fabrica']) || empty($_POST['id_fabrica'])) {
            return $this->view->showError('Falta completar la fábrica');
        }
    
        if (!isset($_POST['stock']) || empty($_POST['stock'])) {
            return $this->view->showError('Falta completar el stock');
        }
    
        if (!isset($_POST['precio']) || empty($_POST['precio'])) {
            return $this->view->showError('Falta completar el precio');
        }
    
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio']; 
        $stock = $_POST['stock']; 
        $id_fabrica = $_POST['id_fabrica']; 
    
        
        $fabricas = $this->models->getAllFabricas();
        $fabrica_ids = array_map(function($fabrica) {
            return $fabrica->id; 
        }, $fabricas);

        if (!in_array($id_fabrica, $fabrica_ids)) {
            return $this->view->showError('El ID de la fábrica no existe');
        }
    
        $id = $this->models->insertModelo($nombre, $precio, $stock, $id_fabrica);
    
        header('Location: ' . 'showAddModelo/');
    }
}