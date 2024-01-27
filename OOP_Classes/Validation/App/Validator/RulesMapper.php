<?php 

    namespace Validation\Validator;
    use Validation\Validator\Rules\AlphaNumericalRule;
    use Validation\Validator\Rules\BetweenRule;
    use Validation\Validator\Rules\ConfirmedRule;
    use Validation\Validator\Rules\EmailRule;
    use Validation\Validator\Rules\MaxRule;
    use Validation\Validator\Rules\PasswordRule;
    use Validation\Validator\Rules\RequiredRule;
    use Validation\Validator\Rules\UniqueRule;
    use Validation\Validator\Rules\UsernameRule;

    require_once  "Rules/AphaNumericalRule.php";
    require_once  "Rules/BetweenRule.php";
    require_once  "Rules/EmailRule.php";
    require_once  "Rules/PasswordRule.php";
    require_once  "Rules/ConfirmedRule.php";
    require_once  "Rules/RequiredRule.php";
    require_once  "Rules/MaxRule.php";
    require_once  "Rules/UniqueRule.php";
    require_once  "Rules/UsernameRule.php";

    trait RulesMapper{

        protected static $map = [
            'required' => RequiredRule::class,
            'alnum' => AlphaNumericalRule::class,
            'max' => MaxRule::class,
            'between' => BetweenRule::class,
            'email' => EmailRule::class,
            'username' => UsernameRule::class,
            'password' => PasswordRule::class,
            'confirmed' => ConfirmedRule::class,
            'unique' => UniqueRule::class,
        ];

        public static function resolve(string $rule, $options){
            return  new static::$map[$rule](...$options);
        }
    }

?>