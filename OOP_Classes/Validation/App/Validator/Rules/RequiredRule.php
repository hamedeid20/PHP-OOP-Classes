<?php 

    namespace Validation\Validator\Rules;
    use Validation\Validator\Rules\Contract\Rule;

    class RequiredRule implements Rule{

        public function apply($field, $value, $data){
            return !empty($value);
        }

        public function __toString(){
            return '%s is required and cannot be empty';
        }


    }

?>