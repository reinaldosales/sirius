<?php

namespace App\Repository;

use App\Connection\Database;
use App\Entities\Revenue;
use \PDO;

class RevenueRepository
{

    public function createRevenue($revenue)
    {
        $database = new Database('revenue');

        $revenue->id = $database->insert([
            'CardId' => $revenue->cardId,
            'Value' => $revenue->value,
            'UserId' => $revenue->userId,
            'CreationDate' => $revenue->creationDate,
            'UpdateDate' => $revenue->updateDate,
        ]);
    }

    public function updateRevenue($revenue)
    {
        $database = new Database('revenue');

        $database->update("RevenueId = $revenue->RevenueId", [
            'DeletionDate' => $revenue->DeletionDate,
            'UpdateDate' => $revenue->UpdateDate,
        ]);
    }

    public static function getRevenueById($revenueId)
    {
        $database = new Database('revenue');

        $where = "RevenueId = '$revenueId' AND DeletionDate IS NULL";

        return $database->select($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getRevenueByNameAndUserId($revenueName, $userId)
    {
        $database = new Database('revenue');

        $where = "Name = '$revenueName' AND UserId = '$userId' AND DeletionDate IS NULL";

        return $database->select($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getRevenueByUserId($userId)
    {
        $database = new Database('revenue');

        $where = "UserId = '$userId' AND DeletionDate IS NULL";

        return $database->select($where)
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getAllRevenues()
    {
        return (new Database('revenue'))->select('DeletionDate IS NULL')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getRevenuesByParams($userId, $value)
    {
        $database = new Database('revenue');
            
        $name = strlen($value) ? ' AND Value = ' . $value : '';

        $where = "UserId = '$userId' $name";
        $order = '1 DESC';

        return $database->select($where, $order, null)
            ->fetchAll(PDO::FETCH_OBJ);
    }
}
