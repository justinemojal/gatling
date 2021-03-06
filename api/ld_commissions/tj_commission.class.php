<?php
//might want to include a base entity in the future include('../infusionsoftentity.class.php');
include('../gatlingentity.class.php');
class tj_commission extends GatlingEntity {

    public $rid;
    public $created_ts;
    public $email;
    public $amount;

    function __construct() {
       // unset($this->create_ts);//remove this property because affiliate table does not have it

        $this->className = "tj_commission";
        $this->tableName = "tj_commissions";
        $this->whereClause = "SELECT rid, 
        created_ts, 
        email, 
        amount";
        unset($this->create_ts);
        unset($this->guid);
    }

    function getInsertClause ($payload) {
        $sql = "INSERT INTO " .$this->tableName." (";
        $binds = array();
        $columns = array();
        foreach ($payload as $key=>$val)
        {
            $binds[] = $val;
            $columns[] = $key;
        }
        $sql = $sql . join(', ', $columns) . ') VALUES(:'. join(', :', $columns) . ')';
        return $sql;
    }

    function getSelectClause ($conn, $gatlingEntity, $numberToReturn) {

        if ($gatlingEntity -> rid !== undefined) {
            $handle = $conn->prepare($this->whereClause.' FROM '.$this->tableName.' where rid = ? limit ?');
            $handle->bindValue(1, $gatlingEntity -> rid, PDO::PARAM_INT);
        };
        if ($gatlingEntity -> email != undefined) {
            $handle = $conn->prepare($this->whereClause.' FROM '.$this->tableName.' where email = ? limit ?');
            $handle->bindValue(1, $gatlingEntity -> email);
        };
        $handle->bindValue(2, $numberToReturn, PDO::PARAM_INT);
        return $handle;
    }

}

?>