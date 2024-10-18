<?php
class modelosView {
    private $db;

    public $user = null;
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function showModelos($modelos) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($modelos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require './plantillas/listasmodel.phtml';
    }

    public function showListModelos($modelos) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($modelos);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require './plantillas/model.phtml';
    }

    public function showModelosid($modelos) {
        
        require './plantillas/detail_fabrica.phtml';
    }

    public function showdetailModelo($modelo){
        require './plantillas/detail_modelo.phtml';
    }

    public function showError($error) {
        require 'templates/error.phtml';
    }

    public function showListaModelos($modelos, $fabricas) {
        require './plantillas/lista_modelos.phtml'; // Cargar la lista de modelos
    }

    public function showEditModelo($modelo) {
        // Aca se carga una plantilla que incluye el formulario para editar una fábrica
        require './plantillas/edit_modelo.phtml';
    }
}
?>