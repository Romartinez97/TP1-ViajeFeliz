<?php

/**
* 
*/
class Viaje{
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $listaPasajeros;
    
    public function __construct($codigoViaje, $destinoViaje, $maxPasajerosViaje, $listaPasajerosViaje){
      $this -> codigo = $codigoViaje;
      $this -> destino = $destinoViaje;
      $this -> maxPasajeros = $maxPasajerosViaje;
      $this -> listaPasajeros = $listaPasajerosViaje;
  
    }  
    public function setCodigo($codigoViaje){
      $this -> codigo = $codigoViaje;
    }
    public function getCodigo(){
      return $this -> codigo;
    }
    public function setDestino($destinoViaje){
      $this -> destino = $destinoViaje;
    }
    public function getDestino(){
      return $this -> destino;
    }
    public function setMaxPasajeros($maxPasajerosViaje){
      $this -> maxPasajeros = $maxPasajerosViaje;
    }
    public function getMaxPasajeros(){
      return $this -> maxPasajeros;
    }
    public function setListaPasajeros($listaPasajerosViaje){
      $this -> listaPasajeros = $listaPasajerosViaje;
    }  
    public function getListaPasajeros(){
      return $this -> listaPasajeros;
    }  
  }

//Meter lo de la clase Pasajero adentro de la clase Vuelo, esa clase tiene que modificar los arreglos de pasajeros además de setearlos.
  class Pasajero{
    private $nombre;
    private $apellido;
    private $numeroDoc;
    
    public function __construct($nombrePasaj, $apellidoPasaj, $numeroDocPasaj){
      $this -> nombre = $nombrePasaj;
      $this -> apellido = $apellidoPasaj;
      $this -> numeroDoc = $numeroDocPasaj;
    }
    
    public function setNombre($nombrePasajero){
      $this -> nombre = $nombrePasajero;
    }
    public function getNombre(){
      return $this -> nombre;
    }
    public function setApellido($apellidoPasajero){
      $this -> apellido = $apellidoPasajero;
    }
    public function getApellido(){
      return $this -> apellido;
    }
    public function setNumeroDoc($numeroDocPasajero){
      $this -> numeroDoc = $numeroDocPasajero;
    }
    public function getNumeroDoc(){
      return $this -> numeroDoc;
    }  
  }