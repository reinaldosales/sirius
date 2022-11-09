<?php

namespace App\Repository;

use App\Connection\Database;
use App\Entities\User;
use \PDO;

class UserRepository
{

    public function createUser($user)
    {
        $database = new Database('user');

        $user->id = $database->insert([
            'Name' => $user->name,
            'Mail' => $user->mail,
            'Password' => $user->password,
            'CreationDate' => $user->creationDate,
            'UpdateDate' => $user->updateDate,
            'IsAdmin' => $user->isAdmin
        ]);
        
    }

    public function updateUser($user){
        $database = new Database('user');

        $database->update("UserId = $user->UserId", [
            'Name' => $user->Name,
            'Mail' => $user->Mail,
            'Avatar' => $user->Avatar,
            'DeletionDate' => $user->DeletionDate
        ]);
    }

    public static function getUserByMail($mail){
        $database = new Database('user');

        $where = "Mail LIKE '%$mail%' AND DeletionDate IS NULL";

        $user = $database->select($where, null, '1')
        ->fetchAll(PDO::FETCH_OBJ);

        return $database->select($where, null, '1')
                        ->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getUserById($userId){
        $database = new Database('user');

        $where = "UserId = '$userId' AND DeletionDate IS NULL";

        $user = $database->select($where, null, '1')
        ->fetchAll(PDO::FETCH_OBJ);

        return $database->select($where, null, '1')
                        ->fetchObject(self::class);
    }

    public static function getAllUsers(){
        return (new Database('user'))->select()
                                     ->fetchAll(PDO::FETCH_OBJ);
    }

}
