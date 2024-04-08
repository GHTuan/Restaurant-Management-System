<?php
include_once('Model/Database.php');
class BaseModel extends DataBase{
    protected $conn;
    

    function __construct() {
        $this -> conn = $this -> connect();
    }


    public function all($table ,
                        $select = ['*'],
                        $orderBy = [],
                        $limit = 15
                        )
    {

        $column = implode(',', $select);
        $orderByStr = implode(',', $orderBy);

        if ($orderByStr){
            $sql = "SELECT ${column} FROM ${table} ORDER BY ${orderByStr} LIMIT ${limit}";
        }
        else
        {
            $sql = "SELECT ${column} FROM ${table} LIMIT ${limit}";
        }
        
        $result = $this -> _query($sql);
        
        $data = [];
        while ($row = mysqli_fetch_assoc($result)){
            array_push($data, $row);
        }
        return $data;
    }

    public function get($id){
        echo __METHOD__;
    }
    public function store($data){
        echo __METHOD__;
    }
    public function update($id,$data){
        echo __METHOD__;
    }
    public function delete($id){
        echo __METHOD__;
    }
    public function _query($sql){
        
        return mysqli_query($this -> conn, $sql);
    }
    
    function __destruct() {
        $this -> closeDatabase($this->conn);
    }
}
?>