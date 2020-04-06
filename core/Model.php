<?php 

    abstract class Model{
        
        protected $dblink = false;
        protected $table = false;
        protected $niqueKey = false;
        
        public function setTable($table){
            $this->table = $table;
        }
        
        public function setUniqueKey($key){
            $this->niqueKey = $key;
        }
        
        public function __construct($link){
            $this->dblink = $link;
        }
        
        public function setLink($link){
            $this->dblink = $link;
        }
        
        public function insert($data = []){
            if($data){
                $canInsert = true;
                if($this->niqueKey){
                    if(isset($data[$this->niqueKey])){
                        $sql = "SELECT {$this->niqueKey} 
                                FROM {$this->table} 
                                WHERE {$this->niqueKey} = '{$data[$this->niqueKey]}'
                                LIMIT 1";
                        $check = $this->query($sql);
                        if($check->num_rows > 0){
                            $canInsert = false;   
                        }
                    }
                }
                if($canInsert){
                    $inputs = [];
                    $inputsString = "(";
                    $inputsValues = "(";
                    foreach($data as $key => $value){
                        $inputs[] = $key;
                        $inputsString .= $key.",";
                        $inputsValues .= "'".$value."',";
                    }
                    $inputsString = trim($inputsString, ",").")";
                    $inputsValues = trim($inputsValues, ",").")";

                    $sql = "INSERT INTO {$this->table} {$inputsString} VALUES {$inputsValues}";
                    return $this->query($sql);
                }
            }
            return false;
        }
        
        public function query($sql){
            $sql = strip_tags($sql);
            return mysqli_query($this->dblink, $sql);
        }
    }