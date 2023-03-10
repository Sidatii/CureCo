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

        return $this->db->resultSet();
    }

    public function addProduct($data){
        $this->db->query('INSERT INTO `produit`(`name`, `price`, `image`, `quantity`, `IDC`, `discription`) VALUES(:name,:price,:image,:qty,:IDC,:disc)');

        $this->db->bind(':name', $data['post']['name']);
        $this->db->bind(':price', $data['post']['price']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':qty', $data['post']['qty']);
        $this->db->bind(':IDC', $data['post']['IDC']);
        $this->db->bind(':disc', $data['post']['disc']);

        return $this->db->execute();
    }

    public function updateProduct($data){

        if (empty($data['image'])) {
        
            $this->db->query('UPDATE `produit` SET `name`= :name ,`discription`= :disc,`quantity`=:qty,`price`=:price,`IDC`=:idc WHERE `ID`=:id');
            
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':disc', $data['disc']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idc', $data['IDC']);
            $this->db->bind(':id', $data['id']);

            return $this->db->execute();
            
        }else{
            $this->db->query('UPDATE `produit` SET `name`= :name ,`discription`= :disc,`quantity`=:qty,`price`=:price,`IDC`=:idc, `image`=:img WHERE `ID`=:id');

    
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':disc', $data['disc']);
            $this->db->bind(':qty', $data['qty']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':idc', $data['IDC']);
            $this->db->bind(':img', $data['image']);
            $this->db->bind(':id', $data['id']);
    
            if($this->db->execute()){
                return true;
            }

        }

    }

    public function getCategories(){
        $this->db->query('SELECT * FROM category');
        return $this->db->resultSet();

    }

    public function delete($id){
        $this->db->query('DELETE FROM produit WHERE ID=:id');
        $this->db->bind('id', $id);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function Sort($by, $order){
        $this->db->query("SELECT * FROM produit ORDER BY $by $order");
        return $this->db->resultSet();
    }

    public  function search($input){
        $this->db->query("SELECT * FROM produit WHERE name LIKE '%$input%' OR discription LIKE '%$input%' OR price LIKE '%$input%'");
        return $this->db->resultSet();
    }

    public function selectById($id){
        $this->db->query('SELECT * FROM produit WHERE ID=:id');
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function totalProducts(){
        $this->db->query('SELECT COUNT(ID) AS totalProducts FROM produit');
        return $this->db->resultSet();
    }

    public function avgPrice(){
        $this->db->query('SELECT AVG(price) AS avgPrice FROM produit');
        return $this->db->resultSet();
    }

    public function totalCategories(){
        $this->db->query('SELECT COUNT(ID) AS totalCategories FROM category');
        return $this->db->resultSet();
    }

    public function minPrice(){
        $this->db->query('SELECT MIN(price) AS minPrice FROM produit');
        return $this->db->resultSet();
    }
}
