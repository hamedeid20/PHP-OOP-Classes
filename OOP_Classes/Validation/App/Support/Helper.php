<?php 
    use Support\Session;
    use Validation\Http\Request;
    use Validation\Http\Response;
    
    require_once "Config.php";

    if(!function_exists('request')){
        function request($key = null){

            $instance = new Request();

            if($key){
                return $instance->get($key);
            }

            if(is_array($key)){
                return $instance->only($key);
            }

            return $instance;

        }
    }

    if(!function_exists('value')){
        function value($value){
            return ($value instanceof Closure) ? $value() : $value; // Closure == Anonymous Function
        }
    }

    if(!function_exists('back')){
        function back(){
            return (new Response())->back();
        }
    }

    if(!function_exists('old')){
        function old($key, Session $session){
            if($session->hasFlash('old')){  
                if(isset($session->getFlash('old')[$key])){
                    return $session->getFlash('old')[$key]; 
                }
            } 
        }
    }

?>