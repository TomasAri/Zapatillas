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
        require './plantillas/listas.phtml';
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

}
?>