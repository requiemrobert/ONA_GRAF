<?php
/**
* Clase para manejo de sesiones seguras.
*
* @version: 1.0.1
*
* @author: dnolasco.
*
*/

include 'helpers/connection_helper.php';
require 'config/base_url_ws.php';
require 'interface/interface_controller.php';

class Session implements iCallWs
{

public $session_id;
private $arrayData;

public function __construct($arrayUser=[])
{
   
    $this->initSession();
    $this->setSessionValue('session_user', $arrayUser);
}


public function setArrayData($array = [])
{
   $this->arrayData = $array ;
}

public function getArrayData()
{
   return $this->arrayData;
}

public function decodeRequest()
{
    $decode_data = [ 'rc' => 'get_menu', 'data' => $this->getArrayData() ];

    return json_encode($decode_data);
}

public function sendRequest()
{   
    return getWS( $this->decodeRequest() , BASE_URL_WS );
}

public function response(){

   $stdClass = json_decode($this->sendRequest());

   $arrayData = [];

   $contador = 0;

   if ($stdClass->rc == 200) {
       
        foreach ($stdClass->data as $key => $value) {
      
            $arrayData[$contador] = [ $key => $value ];
            $contador++;

        } 
   }
   
    return array_values($arrayData);
}


/**
* Configura caché de sesión y la inicializa
* @params: void
* @return: void
*/
private function initSession()
{
    $this->setSessionCacheLimiter('private');
    $this->setSessionCacheExpire(0);
    $this->setCookieParams();
    $this->sessionRegenerateId();
}

/**
* Establece el limitador del caché actual
* @params: String limiter: el limitador
* @return: void
*/
private function setSessionCacheLimiter($limiter)
{
    session_cache_limiter($limiter);
}

/**
* Establece la caducidad del caché en minutos
* @params: Int minutes: duración del caché
* @return: void
*/
private function setSessionCacheExpire($minutes)
{
    session_cache_expire($minutes);
}

/**
* Establece los parámetros de la cookie. Su efecto dura lo mismo que el script invocador
* @params: Int minutes: duración del caché
* @return: void
*/
private function setCookieParams()
{
    $cookie_params = session_get_cookie_params();

    session_set_cookie_params(
            $cookie_params['path'],
            $cookie_params['domain'],
            'SECURE',
            true);
}

/**
* Crea un nuevo valor al array $_SESSION
* @params:
*       String name_key: nombre de la llave del array de sesión
*   String value: el valor asociado a la llave
* @return: void
*/
public function setSessionValue($name_key, $value)
{
    $_SESSION[$name_key] = $value;
}

/**
* Recupera un elemento del array $_SESSION
*
* @params: String session_value: la llave del array a recuperar
*
* @return: el valor del elemento del array solicitado. Si no existe, false
*/
public function getSessionValue($session_value)
{
    if (! empty($_SESSION[$session_value]))
        return $_SESSION[$session_value];

    return false;
}

/**
* Regenera el session_id cuando se deje de hacer referencia al objeto
* @params: void
* @return: void
*/
public function __destruct()
{
    $this->sessionRegenerateId();
}

/**
* Regenera el session_id
* @params: void
* @return: void
*/
private function sessionRegenerateId()
{
    session_regenerate_id();
}


}
