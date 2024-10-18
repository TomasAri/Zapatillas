<?php
class fabricasView {
    private $db;

    public $user = null;
    
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function showFabricas($fabricas) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($fabricas);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require './plantillas/listasfab.phtml';
    }

    public function showListFabricas($fabricas, $modelos) {
        // la vista define una nueva variable con la cantida de tareas
        $count = count($fabricas);

        // NOTA: el template va a poder acceder a todas las variables y constantes que tienen alcance en esta funcion
        require './plantillas/lista.phtml';
    }

    public function showdetailFabrica($fabrica, $models) {
        
        require './plantillas/detail_fabrica.phtml';
    }

    public function showError($error) {
        require 'plantillas/error.phtml';
    }
    
    public function showListaFabricas($fabricas) {
        require './plantillas/lista_fabricas.phtml';
    }

    public function showEditFabrica($fabrica) {
        // Aca se carga una plantilla que incluye el formulario para editar una fábrica
        require './plantillas/edit_fabrica.phtml';
    }

    
}
?>