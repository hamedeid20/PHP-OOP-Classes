<?php 

    namespace Validation\Validator\Rules;
    use Validation\Validator\Rules\Contract\Rule;

    class UsernameRule implements Rule{

        public function apply($field, $value, $data){
            return preg_match('/^[a-zA-Z0-9_]+$/', $value);
        }

        public function __toString(){
            return '%s must be a valid username ex:  john_123';
        }
    }

?>