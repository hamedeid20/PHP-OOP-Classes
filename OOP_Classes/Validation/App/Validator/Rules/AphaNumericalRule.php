<?php 

    namespace Validation\Validator\Rules;
    use Validation\Validator\Rules\Contract\Rule;
    require_once 'Contract/Rule.php';

    class AlphaNumericalRule implements Rule{

        public function apply($field, $value, $data){ 
            return preg_match("/^[a-zA-Z0-9]+$/", $value);
        }

        public function __toString(){
            return '%s must be characters and numbers only';
        }
    }

?>