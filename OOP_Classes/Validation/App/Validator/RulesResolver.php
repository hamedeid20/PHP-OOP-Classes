<?php 

    namespace Validation\Validator;

    trait RulesResolver{

        public static function make($rules){
            $rules = (array) (str_contains($rules, '|') ? explode('|', $rules) : $rules);
            
            return array_map(function($rule){

                if(is_string($rule)){
                    return static::getRuleFromString($rule);
                }
                return $rule;

            }, $rules);
        }

        public static function getRuleFromString(string $rule){

            return RulesMapper::resolve(
                ($explode = explode(':', $rule))[0] , explode(",", end($explode))
            );

        }

    }

?>