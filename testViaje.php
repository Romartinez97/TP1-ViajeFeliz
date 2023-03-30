<?php

include_once("claseVuelos.php");
include_once("funciones.php");

#De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
#Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros).
#Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
#Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.

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
      echo "¿Desea ingresar los datos de un pasajero? (S/N) ";
      $respuesta = trim(fgets(STDIN));
      $respuesta = strtolower($respuesta);
      do{
        if ($respuesta != "s" && $respuesta != "n"){
          echo "Indique si desea (S) o no (N) agregar a un pasajero: ";
          $respuesta = trim(fgets(STDIN));
          $respuesta = strtolower($respuesta);
        }
      } while ($respuesta != "s" && $respuesta != "n");
      if ($respuesta == "s"){
        do{
          $pasajero = agregarPasajero();
          array_push($listadoPasajeros, $pasajero);
          echo "Se agregó al pasajero ".$viaje -> getNombreP()." ".$viaje -> getApellidoP().", DNI ".$viaje -> getNumeroDocP()." al registro de pasajeros del viaje.";
          echo "¿Desea ingresar los datos de otro pasajero? (S/N) ";
          $respuesta = trim(fgets(STDIN));
          $respuesta = strtolower($respuesta);
          do{
            if ($respuesta != "s" && $respuesta != "n"){
            echo "Indique si desea (S) o no (N) agregar a un pasajero: ";
            $respuesta = trim(fgets(STDIN));
            $respuesta = strtolower($respuesta);
            }
          } while ($respuesta != "s" && $respuesta != "n");
          if (count($listadoPasajeros) > $maxPasajerosViaje){
            echo "El vuelo ya llegó al límite de pasajeros a bordo, no se permite el ingreso de otro más.";
            $respuesta = "n";
          }
        } while ($respuesta == "s");
      $vuelo = new Viaje($codigoViaje, $destinoViaje, $maxPasajerosViaje, $listadoPasajeros);
      array_push($listadoVuelos, $vuelo);
      break;
    case 2:
      //Modificar información del viaje.
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
      echo "\n   1) Modificar información del vuelo.";
      echo "\n   2) Modificar información de un pasajero.";
      echo "\n   3) Volver al menú anterior.";
      do {
        echo "\nIngrese un número del 1 al 3 para elegir la opción: ";
        $opcion = trim(fgets(STDIN));
        if ($opcion <= 0 || $opcion > 3) {
          echo "\nPor favor, ingrese un número valido.\n";
        }
      }while ($opcion <= 0 || $opcion > 3);
      switch ($opcion){
        case 1:
          echo "\n   1) Modificar código del vuelo.";
          echo "\n   2) Modificar destino del vuelo.";
          echo "\n   3) Modificar número máximo de pasajeros del vuelo.";
          echo "\n   4) Volver al menú anterior.";
          do{
            echo "\nIngrese un número del 1 al 4 para elegir la opción: ";
            $opcion = trim(fgets(STDIN));
            if ($opcion <= 0 || $opcion > 4) {
              echo "\nPor favor, ingrese un número valido.\n";
            } 
          }while ($opcion <= 0 || $opcion > 4);
          switch ($opcion){
            case 1:
              echo "Ingrese el código nuevo: ";
              $codigoNuevo = esRepetido();
              $viaje -> codigo = setCodigo($codigoNuevo);
              $arrayReemplazo [$i] = $viaje;
              $listadoViajes = array_replace ($listadoViajes, $arrayReemplazo); //array_replace reemplaza del primer parámetro lo que tenga el mismo índice que el segundo 
              echo "El nuevo código es ".$nombreViaje -> getCodigo().".";
            break;
            case 2:
              echo "Ingrese el nuevo destino: ";
              $destinoNuevo = esString();
              $viaje -> destino = setDestino($destinoNuevo);
              $arrayReemplazo [$i] = $viaje;
              $listadoViajes = array_replace ($listadoViajes, $arrayReemplazo);
              echo "El nuevo destino es ".$viaje -> getDestino().".";
            break;
            case 3:
              echo "Ingrese el nuevo número máximo de pasajeros: ";
              $numMaxNuevo = esNumero();
              do{
                if ($numMaxNuevo < $listadoViajes[$i]["maxPasajeros"]){
                  echo "El número ingresado no puede ser menor al que ya está registrado (."$listadoViajes[$i]["maxPasajeros"]).", ya que se deberían eliminar pasajeros. Ingrese el nuevo máximo nuevamente: ";
                  $numMaxNuevo = esNumero();
                }
              } while ($numMaxNuevo < $listadoViajes[$i]["maxPasajeros"]);
              $viaje -> maxPasajeros = setMaxPasajeros($numMaxNuevo);
              $arrayReemplazo [$i] = $viaje;
              $listadoViajes = array_replace ($listadoViajes, $arrayReemplazo);
              echo "El nuevo número máximo de pasajeros es ".$nombreViaje -> getMaxPasajeros().".";
            break;
          }
        }
        break;
        case 2:    
          do{
            echo "Ingrese el documento del pasajero a modificar (sin puntos): ";
            $documentoPasajero = esNumero();
            $auxiliar = 0;
            do{
              for ($j = 0; $j < count($listadoPasajeros); $j++) {
                if (($listadoVuelos[$i]["listaPasajeros"][$j]["numeroDoc"] == $documentoPasajero)) {
                  $auxiliar = 1;
                }
              }
              if ($auxiliar !=1){
                echo "El documento ingresado no corresponde a ningún pasajero registrado en este vuelo.";
                $codigoVuelo = esNumero();                      
              }
            } while ($auxiliar !=1); 
            echo "\n   1) Modificar nombre y apellido del pasajero.";
            echo "\n   2) Modificar documento del pasajero.";
            echo "\n   3) Volver al menú anterior.";
            do {
              echo "\nIngrese un número del 1 al 3 para elegir la opción: ";
              $opcion = trim(fgets(STDIN));
              if ($opcion <= 0 || $opcion > 3) {
                echo "\nPor favor, ingrese un número valido.\n";
              } 
            }while ($opcion <= 0 || $opcion > 3);
          switch ($opcion){ //En todos los cases tengo que hacer un recorrido parcial hasta ubicar el número de documento del pasajero en el array $listadoPasajeros
            case 1:                    
              echo "Ingrese el nuevo nombre y apellido del pasajero.";
              echo "Nombre: ";
              $nombreNuevo = esString();
              echo "Apellido:";
              $apellidoNuevo = esString();
              $pasajero = ["nombre" => $nombreNuevo, "apellido" => $apellidoNuevo, "numeroDoc" => $numeroDocumento];
              $arrayReemplazo [$j] = $pasajero;
              $listadoPasajeros = array_replace ($listadoVuelos[$i]["listaPasajeros"], $arrayReemplazo);
              echo "El nuevo nombre y apellido del pasajero es ".$listadoVuelos[$i]["listaPasajeros"][$j]["nombre"]." ".$listadoVuelos[$i]["listaPasajeros"][$j]["apellido"].".";
            break;
            case 2:
              echo "Ingrese el nuevo número de documento del pasajero (sin puntos): ";
              $nuevoDocumento = esNumero();
              $nombrePasaj = $listadoVuelos[$i]["listaPasajeros"][$j]["nombre"];
              $apellidoPasaj = $listadoVuelos[$i]["listaPasajeros"][$j]["apellido"]; 
              $pasajero = ["nombre" => $nombrePasaj, "apellido" => $apellidoPasaj, "numeroDoc" => $nuevoDocumento];
              $arrayReemplazo [$j] = $pasajero;
              $listadoPasajeros = array_replace ($listadoPasajeros, $arrayReemplazo);
              echo "El nuevo documento del pasajero es ".$listadoVuelos[$i]["listaPasajeros"][$j]["numeroDoc"].".";
            break;
          } 
        break;
    case 3:
    //Ver información de un viaje.
      echo "Ingrese el código del vuelo del cual desea ver la información: ";
        $codigoVuelo = esVuelo();
        for ($k = 0; $k < count($listadoVuelos); $k++) {
            if (($listadoVuelos[$k]["codigo"] == $codigoVuelo)) {
              echo "Código del vuelo: "$listadoVuelos[$k]["codigo"];
              echo "Destino del vuelo: ".$listadoVuelos[$k]["destino"];
              echo "Cantidad máxima de pasajeros en el vuelo: ".$listadoVuelos[$k]["maxPasajeros"];
              echo "Cantidad de pasajeros registrados en el vuelo: ".count($listaPasajeros);
              echo "¿Desea ver el registro de todos los pasajeros registrados en el vuelo? (S/N): ";
              $respuesta = trim(fgets(STDIN));
              $respuesta = strtolower($respuesta);
              do{
                if ($respuesta != "s" && $respuesta != "n"){
                  echo "Indique si desea (S) o no (N) ver el registro de pasajeros: ";
                  $respuesta = trim(fgets(STDIN));
                  $respuesta = strtolower($respuesta);
                }
              } while ($respuesta != "s" && $respuesta != "n");
              if ($respuesta == "s"){
                print_r($listaPasajeros);
              }
            }
        }
    break;
  } 
} while ($opcion != 4);
