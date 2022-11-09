<?php

namespace App\Repository;

use App\Connection\Database;
use App\Entities\Card;
use \PDO;

class CardRepository
{

    public function createCard($card)
    {
        $database = new Database('card');

        $card->id = $database->insert([
            'Number' => $card->cardNumber,
            'Type' => $card->type,
            'Brand' => $card->brand,
            'LimitValue' => $card->limitValue,
            'CurrentValue' => $card->currentValue,
            'ClosedDate' => $card->closedDate,
            'UserId' => $card->userId,
            'CreationDate' => $card->creationDate,
            'UpdateDate' => $card->updateDate,
        ]);
    }

    public function updateCard($card)
    {
        $database = new Database('card');

        $database->update("CardId = $card->CardId", [
            'LimitValue' => $card->CardLimit,
            'DeletionDate' => $card->DeletionDate,
            'UpdateDate' => $card->UpdateDate,
            'ClosedDate' => $card->ClosedDate
        ]);
    }

    public function updateBalance($card)
    {
        $database = new Database('card');

        $database->update("CardId = $card->CardId", [
            'CurrentValue' => $card->CurrentValue,
            'UpdateDate' => $card->UpdateDate,
        ]);
    }

    public static function getCardByCardNumber($cardNumber)
    {
        $database = new Database('card');

        $where = "Number LIKE '%$cardNumber%' AND DeletionDate IS NULL";

        return $database->select($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCardById($cardId)
    {
        $database = new Database('card');

        $where = "CardId = '$cardId' AND DeletionDate IS NULL";

        return $database->select($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCardByIdForRevenue($cardId)
    {
        $database = new Database('card');

        $where = "CardId = '$cardId'";

        return $database->selectNoDeletionDate($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCardByIdForExpense($cardId)
    {
        $database = new Database('card');

        $where = "CardId = '$cardId'";

        return $database->selectNoDeletionDate($where, null, '1')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getAllCards()
    {
        return (new Database('card'))->select('DeletionDate IS NULL')
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCardsByUserId($userId)
    {
        $database = new Database('card');

        $where = "UserId = '$userId'";

        return $database->select($where, null, null)
            ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getCardsByParams($userId, $cardNumber = null, $closedDate = null, $cardLimit = null, $cardType = null, $cardBrand = null)
    {
        $database = new Database('card');

        $cardNumber = strlen($cardNumber) ? ' AND Number = ' . $cardNumber : '';
        $closedDate = strlen($closedDate) ? ' AND ClosedDate = ' . $closedDate : '';
        $cardLimit = strlen($cardLimit) ? ' AND LimitValue = ' . $cardLimit : '';
        $cardType = strlen($cardType) ? ' AND Type = ' . $cardType : '';
        $cardBrand = strlen($cardBrand) ? ' AND Brand = ' . $cardBrand : '';

        $where = "UserId = '$userId' $cardNumber $closedDate $cardLimit $cardType $cardBrand";
        $order = '1 DESC';

        return $database->select($where, $order, null)
            ->fetchAll(PDO::FETCH_OBJ);
    }
}
