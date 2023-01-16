<?php

class Manager{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getProducts(){
        $this->db->query('SELECT * 
                        FROM produit
                        ');

        $results = $this->db->resultSet();

        return $results;
    }

    public function addProduct($data){
        $this->db->query('INSERT INTO `produit`(`name`, `price`, `image`, `nights_number`, `departure_port_ID`, `departure_date`) VALUES(:name,:price,:image,:nights,:depPort,:depDate)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['img']);
        $this->db->bind(':nights', $data['nights']);
        $this->db->bind(':depPort', $data['depPort']);
        $this->db->bind(':depDate', $data['date']);

        return $this->db->execute();
    }

    public function updateProduct($data){

        if (empty($data->image)) {
        
            $this->db->query('UPDATE `produit` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`price`=:price,`departure_port_ID`=:idd WHERE `ID_croisere`=:id');
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':id', $data['id']);
            
            $this->db->execute();
            return true;
            
        }else{
            $this->db->query('UPDATE `cruise` SET `name`= :name ,`departure_date`= :date,`nights_number`=:nbr,`Price`=:price,`departure_port_ID`=:idd,`image`=:img WHERE `ID_croisere`=:id');
    
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':date', $data['date']);
            $this->db->bind(':nbr', $data['nights']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idd', $data['depPort']);
            $this->db->bind(':img', $data['image']);
            $this->db->bind(':id', $data['id']);
    
            $this->db->execute();
            return true;
        }

    }
}

?>