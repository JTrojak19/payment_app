<?php

class Customer
{
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCustomer($data)
    {
        //Prepare Query
        $this->db->query('INSERT INTO customers (id, first_Name, last_Name, email) 
        VALUES (:id, :first_Name, :last_Name, :email)');
        //Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_Name', $data['first_Name']);
        $this->db->bind(':last_Name', $data['last_Name']);
        $this->db->bind(':email', $data['email']);
        //Execute
        if ($this->db->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getCustomers()
    {
        $this->db->query('SELECT * FROM customers ORDER by created_at DESC');

        $results = $this->db->resultset();
        return $results;
    }
}