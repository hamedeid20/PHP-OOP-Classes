<?php 

    namespace Validation\Validator\Rules\Contract;

    interface Rule{
        public function apply($field, $value, $data);
        public function __toString();
    }

?>