<?php 
    namespace Validation\Http;

    use Validation\Support\Arr;

    class Request{


        public function method(){
            return strtolower($_SERVER['REQUEST_METHOD']);
        }

        public function path(){
            $path = $_SERVER['REQUEST_URI'] ?? '/'; 
            return str_contains($path, '?') ? explode('?', $path)[0] : $path;
        }

        public function all(){
            return $_REQUEST;
        }

        public function only($keys){
            return Arr::only($this->all(), $keys);
        }

        public function get($key){ 
            return Arr::get($this->all(), $key); 
        }


    }

?>