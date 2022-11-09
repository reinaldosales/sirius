<?php

namespace App\Repository;

use App\Connection\Database;
use App\Entities\Category;
use \PDO;

class CategoryRepository
{

    public function createCategory($category)
    {
        $database = new Database('category');

        $category->id = $database->insert([
            'Name' => $category->name,
            'UserId' => $category->userId,
            'CreationDate' => $category->creationDate,
            'UpdateDate' => $category->updateDate,
        ]);
    }

    public function updateCategory($category)
    {
        $database = new Database('category');

        $database->update("CategoryId = $category->CategoryId", [
            'Name' => $category->Name,
            'DeletionDate' => $category->DeletionDate,
            'UpdateDate' => $category->UpdateDate,
        ]);
    }

    public static function getCategoryById($categoryId)
    {
        $database = new Database('category');

        $where = "CategoryId = '$categoryId' AND DeletionDate IS NULL";

        return $database->select($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCategoryByNameAndUserId($categoryName, $userId)
    {
        $database = new Database('category');

        $where = "Name = '$categoryName' AND UserId = '$userId' AND DeletionDate IS NULL";

        return $database->select($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCategoryByUserId($userId)
    {
        $database = new Database('category');

        $where = "UserId = '$userId' AND DeletionDate IS NULL";

        return $database->select($where)
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getAllCategories()
    {
        return (new Database('category'))->select('DeletionDate IS NULL')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCategoriesByParams($userId, $name)
    {
        $database = new Database('category');
        
        if(strlen($name))        
            $name = "'$name'";
            
        $name = strlen($name) ? ' AND Name = ' . $name : '';

        $where = "UserId = '$userId' $name";
        $order = '1 DESC';

        return $database->select($where, $order, null)
            ->fetchAll(PDO::FETCH_OBJ);
    }
}
