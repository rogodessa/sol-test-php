<?php

namespace Solo\TestPhp;

use Solo\TestPhp\Database;

class Products
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProducts($args = []) {
        try {
            $connection = $this->db->connection();

            $where = "WHERE 1";

            $orderby_value = $_GET['order'] ?? 'date';

            $orderby = "ORDER BY p.{$orderby_value} " . ($orderby_value == 'date' ? 'DESC' : 'ASC');

            if(!empty($_GET['category']) && $_GET['category'] != 'all') {
                $category_id = (int) $_GET['category'];
                $where .= " AND c.id = {$category_id}";
            }

            $query = "SELECT p.*, GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') as categories
                        FROM products as p
                        INNER JOIN relationships as r ON p.id = r.product_id
                        INNER JOIN categories as c ON c.id = r.category_id
                        {$where}
                        GROUP BY p.id
                        {$orderby}";

            $result = $connection->query($query);

            $products = [];

            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }

            return $products;
        }
        catch (\Exception $e) {
            die($e->getMessage());
        }
    }
}