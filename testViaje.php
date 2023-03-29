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

function iniciarArregloPasajeros{
  $listadoPasajeros = [];
  return $listadoPasajeros;
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
  public function setListaPasajeros($listaPasajerosViaje){ //QUE ESTA FUNCIÓN ARME LOS PASAJEROS Y HAGA UN ARRAY
    $this -> listaPasajeros = $listaPasajerosViaje;
  }

  public function setListaPasajeros($pasajero){ //QUE ESTA FUNCIÓN ARME LOS PASAJEROS Y HAGA UN ARRAY
    if ($this -> maxPasajeros < len($listaPasajerosViaje)){
      array_push($listaPasajerosViaje, $pasajero)

    }
  }
  
  public function getListaPasajeros(){
    return $this -> listaPasajeros;
  }  
}

/**
* Esta función permite cargar la información de un pasajero.
* param string $nombrePasaj, $apellidoPasaj
* param int $numeroDocPasaj
* return array
*/
function agregarPasajero($nombrePasaj, $apellidoPasaj, $numeroDocPasaj){
  $pasajero = new Pasajero(nombre, apellido, documento) //MODIFICAR Y HACER UNA CLASE PASAJERO
  
  
  $pasajero["nombre"] = $nombrePasaj;
  $pasajero["apellido"] = $apellidoPasaj;
  $pasajero["numeroDocumento"] = $numeroDocPasaj; 
  return $pasajero;
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




/**************************************/
/********* PROGRAMA PRINCIPAL *********/
/**************************************/

do{
  $opcion = seleccionarOpcion();
  switch ($opcion){
    case 1:
      //Cargar información del viaje.
      echo "Ingrese el nombre con el cual guardar el viaje: ";
      $nombreViaje = trim(fgets(STDIN));
      echo "Ingrese el código del viaje: ";
      $codigoViaje = trim(fgets(STDIN));
      echo "Ingrese el destino: ";
      $destinoViaje = trim(fgets(STDIN));
      echo "Ingrese la cantidad máxima de pasajeros permitidos: ";
      $maxPasajerosVuelo = trim(fgets(STDIN));
      $nombreViaje = new Vuelo($codigoViaje, $destinoViaje, $maxPasajerosVuelo);
        // cant maxima y pasajeros del viaje (el array)
      break;
    case 2:
      //Modificar información del viaje.
      break;
    case 3:
      //Ver información de un viaje.
      break;
  } while ($opcion !=4);
}  
  echo "-- Fin del programa --";

// Preguntar si conviene hacer dos clases por separado (Viaje y Pasajero) porque Viaje no puede modificar valores de atributos que no estén incluídos en sí mismo (dijo mi amigo que trabaja en Ualá que no es buena practica).
