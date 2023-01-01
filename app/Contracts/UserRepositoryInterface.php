<?php


namespace App\Contracts;


interface UserRepositoryInterface extends MainRepositoryInterface
{
    public function findUserByEmailAndPassword($email, $password);
    public function findUserById($id);
}
