<?php 

    namespace Validation\Validator\Rules;
    use Validation\Validator\Rules\Contract\Rule;
    require_once 'Contract/Rule.php';

    class BetweenRule implements Rule{
        protected int $min,$max;

        public function __construct(int $min, int $max){
            $this->min = $min;
            $this->max = $max;
        }

        public function apply($field, $value, $data){
            if(strlen($value) < $this->min){
                return false;
            }

            if(strlen($value) > $this->max){
                return false;
            }

            return true;
        }

        public function __toString(){
            return "%s must be between {$this->min} and {$this->max} characters";
        }
    
    }

?>