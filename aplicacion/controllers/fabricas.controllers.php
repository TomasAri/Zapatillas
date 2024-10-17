<?php
    require_once './aplicacion/models/fabricas.model.php';
    require_once './aplicacion/view/fabricas.view.php';

class fabricasControllers{
    private $models;
    private $view;

    public function __construct($res) {
        $this->models = new fabricaModel(); // Inicializa la propiedad con una instancia de fabricaModel
        $this->view = new fabricasView($res->user); // Asegúrate de inicializar también la vista si es necesario
    }


    public function showFabricas(){
        $fabricas = $this->models->getFabricas();
        return $this->view->showFabricas($fabricas);
    }

    public function showFabricaDetails($id, $models) {
        $fabrica = $this->models->getFabrica($id);
        if ($fabrica) {
            return $this->view->showdetailFabrica($fabrica, $models);
        }
    }

    public function addFab(){
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Falta completar el nombre');
        }
    
        if (!isset($_POST['importador']) || empty($_POST['importador'])) {
            return $this->view->showError('Falta completar el importador');
        }

        if (!isset($_POST['pais']) || empty($_POST['pais'])) {
            return $this->view->showError('Falta completar el pais');
        }

        if (!isset($_POST['cantidad']) || empty($_POST['cantidad'])) {
            return $this->view->showError('Falta completar el stock');
        }
    
        $nombre = $_POST['nombre'];
        $importador = $_POST['importador'];
        $pais = $_POST['pais'];
        $cantidad = $_POST['cantidad'];
    
        $id = $this->models->insertFabrica($nombre, $importador, $pais, $cantidad);
       
    
        // redirijo al home (también podriamos usar un método de una vista para motrar un mensaje de éxito)
        header('Location: ' . 'showAddFabrica/');
    }

    public function ListaaddFab(){
        $fabricas = $this->models->getAllFabricas();
        $this->view->showListaFabricas($fabricas);
    }

}