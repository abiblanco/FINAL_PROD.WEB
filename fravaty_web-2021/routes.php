<?php

function call($controller,$action){

    require_once("controller/$controller.php");
  
    $controller=new $controller;
    $controller->{$action}();
  
  }
  
  // Aca se configuran los controlares y actions disponibles
  $controllers = array('home' => ['inicio',"registrar","ingresar","subirProd","listarProd","admin2"],
                      "usuarios" => ["login", "registrar"],
                      "productos"=>["subir","listar"] );
  
  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          call($controller, $action);
      } else {
          call('errorController', 'error');
      }
  } else {
      call('errorController', 'error');
  }
  
?>