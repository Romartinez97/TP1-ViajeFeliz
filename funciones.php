<?php

include_once("claseVuelos.php");

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Inicializa el arreglo con la información de los pasajeros.
 * return array
 */
function iniciarListaPasajeros(){
  $listadoPasajeros = [];
  return $listadoPasajeros;
}

/**
 * Inicializa el arreglo con la información de los vuelos.
 * return array
 */
function iniciarListaVuelos(){
  $listadoVuelos = [];
  return $listadoVuelos;
}

/**
 * Muestra el menú de opciones para que el usuario interactue
 * @return int
 */
function seleccionarOpcion()
{
    //int $opcion
    echo "\n -------- MENÚ --------\n";
    echo "\n   1) Cargar información de un viaje.";
    echo "\n   2) Modificar información de un viaje.";
    echo "\n   3) Ver información de un viaje.";
    echo "\n   4) Salir.";
    do {
        echo "\nIngrese un número del 1 al 4 para elegir la opción: ";
        $opcion = trim(fgets(STDIN));
        if ($opcion <= 0 || $opcion > 4) {
            echo "\nPor favor, ingrese un número valido.\n";
        }
    } while ($opcion <= 0 || $opcion > 8);
    return $opcion;
}

/**
* Función para verificar que la variable ingresada es numérica (entero) en su totalidad.
* return int
*/
function esEntero(){
  //int $numero
  $numero = trim(fgets(STDIN));
  while (!is_int($numero)){
      echo "El dato requerido debe estar compuesto solo por números enteros: ";
      $numero = trim(fgets(STDIN));
  }
  return $numero;
}

/**
* Función para verificar que la variable ingresada es un string en su totalidad.
* return string
*/
function esString(){
  //string $palabra
  $palabra = trim(fgets(STDIN));
  while (!ctype_alpha($palabra)){
      echo "El dato requerido debe estar compuesto solo por letras: ";
      $palabra = trim(fgets(STDIN));
  }
  return $palabra;
}

/**
* Función para verificar si un código corresponde a un viaje registrado.
* return int
*/
function esVuelo(){
  //int $auxiliar
  echo "Ingrese el código del vuelo a verificar: ";
  $codigoVuelo = esNumero();
  $auxiliar = 0;
  do{
    for ($i = 0; $i < count($listadoVuelos); $i++) {
          if (($listadoVuelos[$i]["codigo"] == $codigoVuelo)) {
              $auxiliar = 1;
          }
    }
    if ($auxiliar !=1){
      echo "El código ingresado no corresponde a ningún vuelo registrado. Ingrese un código válido:";
      $codigoVuelo = esNumero();                      
    }
  } while ($auxiliar !=1);
  return $codigoVuelo;
}

/**
* Función para verificar si un vuelo ya existe.
* return $int
*/
function esRepetido(){
  $codigoVuelo = esNumero();
  $auxiliar = 0;
  do{
    for ($i = 0; $i < count($listadoVuelos); $i++) {
          if (($listadoVuelos[$i]["codigo"] == $codigoVuelo)) {
              $auxiliar = 1;
          }
    }
    if ($auxiliar = 1){
      echo "El código ingresado corresponde a un vuelo ya registrado. Ingrese un código válido:";
      $codigoVuelo = esNumero();                      
    }
  } while ($auxiliar =1);
  return $codigoVuelo;
}  
/*
* Función para crear un pasajero y agregarlo al arreglo.
* return array
*/
function agregarPasajero(){
  //string $nombrePasaj, $apellidoPasaj
  //int $numeroDocPasaj
  echo "Indique el nombre del pasajero: ";
  $nombrePasaj = esString();
  $viaje = setNombreP($nombrePasaj);
  echo "Indique el apellido del pasajero: ";
  $apellidopasaj = esString();
  $viaje = setApellidoP($apellidoPasaj);
  echo "Indique el documento del pasajero (sin puntos): ";
  $numeroDocPasaj = esNumero();
  $viaje = setNumeroDocP($numeroDocPasaj);
  $pasajero = ["nombre" => $nombrePasaj, "apellido" => $apellidoPasaj, "numeroDoc" => $numeroDocPasaj];
  return $pasajero;
}
