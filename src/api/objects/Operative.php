<?php
class Operative{

    private $connection;

    private $db_table = "operative";

    public $id;
    public $name;
    public $img;

    // database connection
    public function __construct($db){
        $this->connection = $db;
    }

    // ALL
    public function getEmployees(){
        $sqlQuery = "SELECT id, name, img FROM " . $this->db_table . "";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    // CREATE
    public function createEmployee(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        id = :id, 
                        name = :name, 
                        img = :img";

        $stmt = $this->connection->prepare($sqlQuery);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->age=htmlspecialchars(strip_tags($this->age));
        $this->designation=htmlspecialchars(strip_tags($this->designation));
        $this->created=htmlspecialchars(strip_tags($this->created));

        // биндим
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":age", $this->age);
        $stmt->bindParam(":designation", $this->designation);
        $stmt->bindParam(":created", $this->created);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // READ ONE
    public function getSingleEmployee(){
        $sqlQuery = "SELECT
                        id,
                        name,
                        img
                      FROM 
                        ". $this->db_table ."
                    WHERE 
                       id = ?
                    LIMIT 0,1";

        $stmt = $this->connection->prepare($sqlQuery);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $dataRow['id'];
        $this->name = $dataRow['name'];
        $this->img = $dataRow['img'];
    }

    // UPDATE
    public function updateEmployee(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET 
                        id = :id,
                        name = :name, 
                        img = :img
                    WHERE 
                        id = :id";

        $stmt = $this->connection->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->img=htmlspecialchars(strip_tags($this->img));

        // bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":img", $this->img);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    // DELETE
    function deleteEmployee(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->connection->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }

}
?>