<?php

namespace Solo\TestPhp;

class Categories
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getCategories() {
        try {
            $connection = $this->db->connection();

            $query = "SELECT c.*, COUNT(r.category_id) as count 
                        FROM categories as c 
                        INNER JOIN relationships as r ON c.id = r.category_id
                        GROUP BY c.id
                        ORDER BY count DESC";

            $result = $connection->query($query);

            $categories = [];

            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }

            return $categories;
        }
        catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}