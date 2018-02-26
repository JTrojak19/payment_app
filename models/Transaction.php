<?php

class Transaction
{
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function addTransaction($data)
    {
        //Prepare Query
        $this->db->query('INSERT INTO transactions (id, customer_Id, product, amount, currency, status) 
        VALUES (:id, :customer_Id, :product, :amount, :currency, :status)');
        //Bind Values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':customer_Id', $data['customer_Id']);
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':status', $data['status']);
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
    public function getTransactions()
    {
        $this->db->query('SELECT * FROM transactions ORDER by created_at DESC');

        $results = $this->db->resultset();
        return $results;
    }
}