<?php 

    namespace Validation\Validator\Rules;
    use Validation\Validator\Rules\Contract\Rule;

    class PasswordRule implements Rule{

        public function apply($field, $value, $data){
            return preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/", $value);
        }

        public function __toString(){
            return 'must %s contains 8 characters ( Upper-Lower-Number-Special )';
        }
    }

?>