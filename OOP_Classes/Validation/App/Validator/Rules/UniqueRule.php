<?php 

    namespace Validation\Validator\Rules;
    use Validation\Validator\Rules\Contract\Rule;

    class UniqueRule implements Rule{

        protected $table;
        protected $column;

        public function __construct($table, $column){
            $this->table = $table;
            $this->column = $column;
        }

        public function apply($field, $value, $data){
            
            $conn = new \PDO("mysql:host=localhost;dbname=php_mvc", 'root', '');
            $stmt = $conn->prepare("SELECT * FROM {$this->table} WHERE {$this->column} = ? ");
            $stmt->bindParam(1, $value);
            $stmt->execute();

            if(!$stmt->rowCount() > 0 ){
                return true;
            }

        }
        public function __toString(){
            return 'This %s is already taken';
        }
    }

?>