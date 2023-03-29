<?php

#De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
#Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros).
#Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
#Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Inicializa el arreglo con la información de los pasajeros.
 * @return array
 */
function iniciarListaPasajeros{
  $listadoPasajeros = [];
  return $listadoPasajeros;
}

/**
 * Inicializa el arreglo con la información de los vuelos.
 * @return array
 */
function iniciarListaVuelos{
  $listadoVuelos = [];
  return $listadoVuelos;
}

/**
* 
*/
class Viaje{
  private $codigo;
  private $destino;
  private $maxPasajeros;
  private $listaPasajeros
  
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

/**
* Esta función crea una instancia del objeto Pasajero.
* param string $nombrePasaj, $apellidoPasaj
* param int $numeroDocPasaj
* return array
*/
function agregarPasajero($nombrePasaj, $apellidoPasaj, $numeroDocPasaj){
  $pasajero = new Pasajero($nombrePasaj, $apellidoPasaj, $numeroDocPasaj);
  echo '<pre>'; print_r($pasajero); echo '</pre>';
  array_push($listadoPasajeros, $pasajero);
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

function editPasajero(documento){

}

for ($i = 0; $i <= len(getListaPasajeros); $i++) {
  if ($listaPasajeros[$i,"numeroDoc"] == documento) {
    $nombreNuevo=trim(fgets(STDIN));
    $listaPasajeros[$i,"nombre"] = $listaPasajeros[$i] -> setNombrePasajero($nombreNuevo);
  }
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
* Función para verificar si un pasajero ya se encuentra registrado en base a su número de documento.
* return int
*/
function esPasajero(){
  //int $auxiliar, $docPasajero
  echo "Ingrese el número de documento del pasajero: ";
  $docPasajero = esNumero();
  $auxiliar = 0;
  do{
  for ($i = 0; $i < count($listadoPasajeros); $i++) {
        if (($listadoPasajeros[$i]["numeroDoc"] == $docPasajero)) {
            $auxiliar = 1;
        }
    }
  if ($auxiliar !=1){
    echo "El número de documento ingresado no corresponde a ningún pasajero registrado en el vuelo. Ingrese un documento válido:";
    $docPasajero = esNumero();                     
  }
  } while ($auxiliar !=1);
  return $docPasajero;
}
                        
/**
* Función para verificar si un código corresponde a un viaje registrado.
* return int
*/
function esVuelo(){
  //int $auxiliar
  echo "Ingrese el código del vuelo a modificar: ";
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
  

/**************************************/
/********* PROGRAMA PRINCIPAL *********/
/**************************************/

$listadoPasajeros = iniciarListaPasajeros();
$listadoVuelos = iniciarListaVuelos();

do{
  $opcion = seleccionarOpcion();
  switch ($opcion){
    case 1:
      //Cargar información del viaje.
      echo "Ingrese el código del viaje: ";
      $codigoViaje = esRepetido();
      echo "Ingrese el destino: ";
      $destinoViaje = esString();
      echo "Ingrese la cantidad máxima de pasajeros permitidos: ";
      $maxPasajerosViaje = esNumero();
      echo "Ingrese la cantidad de pasajeros que van a viajar en el vuelo ".$codigoViaje.": ";
      $cantPasajerosViaje = esNumero();
      while ($cantPasajerosViaje > $maxPasajerosViaje){
        echo "La cantidad de pasajeros ingresada excede el máximo permitido en el vuelo. Ingrese nuevamente la cantidad de pasajeros en el viaje: ";
        $cantPasajerosViaje = trim(fgets(STDIN));
      }
      //Usar la función para armar pasajeros y armar el array $listadoPasajero para después incluirlo en una instancia de Viaje
      //PROBAR ESTO EN LA CLASE VIAJE (para nombrar las instancias como v+código de vuelo) -> ${"string".$variableConResultadoAUsar}
      ${"v".$codigoViaje} = new Vuelo($codigoViaje, $destinoViaje, $maxPasajerosViaje, $listadoPasajeros);
      array_push($listadoVuelos, ${"v".$codigoViaje);
      break;
    case 2:
      //Modificar información del viaje.
      do{
        echo "Ingrese el código del vuelo del cual desea modificar un dato: ";
        $codigoVueloAMod = esNumero(); 
        echo "\n   1) Modificar información del vuelo.";
        echo "\n   2) Modificar información de un pasajero.";
        echo "\n   3) Volver al menú anterior.";
        do {
        echo "\nIngrese un número del 1 al 3 para elegir la opción: ";
        $opcion = trim(fgets(STDIN));
        if ($opcion <= 0 || $opcion > 3) {
          echo "\nPor favor, ingrese un número valido.\n";
      } while ($opcion <= 0 || $opcion > 3);
      switch ($opcion){
        case 1:
          do{
          echo "\n   1) Modificar código del vuelo.";
          echo "\n   2) Modificar destino del vuelo.";
          echo "\n   3) Modificar número máximo de pasajeros del vuelo.";
          echo "\n   4) Volver al menú anterior.";
          do {
            echo "\nIngrese un número del 1 al 4 para elegir la opción: ";
            $opcion = trim(fgets(STDIN));
            if ($opcion <= 0 || $opcion > 4) {
              echo "\nPor favor, ingrese un número valido.\n";
          } while ($opcion <= 0 || $opcion > 4);
            switch ($opcion){
              case 1:
                //Buscar cómo ubicar al objeto ya creado.
                echo "Ingrese el código nuevo: ";
                $codigoVueloNuevo = esNumero();
                $nombreViaje -> codigo = setCodigo($codigoVueloNuevo) //Usar $codigoVueloAMod para buscar el vuelo?
                  echo "El nuevo código es ".$nombreViaje -> getCodigo().".";
              break;
              case 2:
                echo "Ingrese el nuevo destino: ";
                $destinoNuevo = esString();
                $nombreViaje -> destino = setDestino($destinoNuevo);
                echo "El nuevo destino es ".$nombreViaje -> getDestino().".";
              break;
              case 3:
                echo "Ingrese el nuevo número máximo de pasajeros: ";
                $numMaxNuevo = esNumero();
                $nombreViaje -> maxPasajeros = setMaxPasajeros($numMaxNuevo);
                echo "El nuevo número máximo de pasajeros es ".$nombreViaje -> getMaxPasajeros().".";
              break;
            }while ($opcion !=4);
        break;
        case 2:
            do{
              echo "Ingrese el documento del pasajero a modificar: ";
              $documentoPasajero = esPasajero();
              echo "\n   1) Modificar nombre y apellido del pasajero.";
              echo "\n   2) Modificar documento del pasajero.";
              echo "\n   3) Volver al menú anterior.";
              do {
            echo "\nIngrese un número del 1 al 3 para elegir la opción: ";
            $opcion = trim(fgets(STDIN));
            if ($opcion <= 0 || $opcion > 3) {
              echo "\nPor favor, ingrese un número valido.\n";
          } while ($opcion <= 0 || $opcion > 3);
                switch ($opcion){ //En todos los cases tengo que hacer un recorrido parcial hasta ubicar el número de documento del pasajero en el array $listadoPasajeros
                  case 1:                    
                    echo "Ingrese el nuevo nombre y apellido del pasajero.";
                    echo "Nombre: ";
                    $nombreNuevo = esString();
                    echo "Apellido:";
                    $apellidoNuevo = esString();
                    $n = count($listadoPasajero);
                    $i = 0;
                    while ($i << $n && ($listadoPasajeros["numeroDoc"] != $documentoPasajero)){
                    $i = $i+1;
                    }
                    $listadoPasajeros[$i]["nombre"] = $nombreNuevo;
                    $listadoPasajeros[$i]["apellido"] = $apellidoNuevo;
                    echo "El nuevo nombre y apellido del pasajero es ".$listadoPasajeros[$i]["nombre"]." ".$listadoPasajeros[$i]["apellido"]".";
                  break;
                  case 2:
                    echo "Ingrese el nuevo número de documento del pasajero: ";
                    $nuevoDocumento = esNumero();
                    while ($i << $n && ($listadoPasajeros["numeroDoc"] != $documentoPasajero)){
                    $i = $i+1;
                    }
                    $listadoPasajeros[$i]["numeroDoc"] = $documentoNuevo;
                    echo "El nuevo documento del pasajero es ".$listadoPasajeros[$i]["numeroDoc"].".";
                  break;
            } while ($opcion !=3); 
        break;
      }
      } while ($opcion !3);
      break;
    case 3:
    //Ver información de un viaje.
      echo "Ingrese el código del vuelo del cual desea ver la información: ";
        $codigoVueloInfo = esVuelo();
        
    break;
  } while ($opcion !=4);
}  
  echo "-- Fin del programa --";
