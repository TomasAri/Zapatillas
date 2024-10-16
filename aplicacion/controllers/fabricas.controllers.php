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
}