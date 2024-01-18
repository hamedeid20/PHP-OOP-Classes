<?php 

    namespace Support;

    class Session {

        private static $instance;

        public function __construct(){

            $this->sessionExits();
            
            $flash_Messages = $_SESSION['flash_messages'] ?? [];
            foreach($flash_Messages as $key => &$flash_Message){
                $flash_Message['remove'] = true;
            }

            $_SESSION['flash_messages'] = $flash_Messages;

        }

        public function __destruct(){
            $this->removeFlashMessages();
        }

        public function sessionExits(){
            if (!self::$instance) {
                self::$instance = session_start();
            }
            return self::$instance;
        }

        public function set($key, $value){
            $_SESSION[$key] = $value;
        }

        public function get($key){
            return $_SESSION[$key] ?? false;
        }

        public function has($key){
            return (isset($_SESSION[$key]));
        }

        public function remove($key){
            unset($_SESSION[$key]);
        }

        public function setFlash($key, $message){
            $_SESSION['flash_messages'][$key] = [
                'remove' => false,
                'message' => $message
            ];
        }

        public function getFlash($key){
            return $_SESSION['flash_messages'][$key]['message'] ?? false;
        }

        public function removeFlashMessages(){
            $flashMessages = $_SESSION['flash_messages'] ?? [];

            foreach($flashMessages as $key => $flashMessage){
                if($flashMessage['remove']){
                    unset($flashMessages[$key]);
                }
            }

            $_SESSION['flash_messages'] = $flashMessages;
        }
    }

?>