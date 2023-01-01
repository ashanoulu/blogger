<?php


namespace App\Repositories;


use App\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Contracts\Container\Container as App;

class UsersRepository extends MainRepository implements UserRepositoryInterface
{
    private $user;

    /**
     * UsersRepository constructor.
     * @param App $app
     * @param User $user
     */
    public function __construct(App $app, User $user)
    {
        $this->user = $user;
    }


    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'App\User';
    }

    public function findUserByEmailAndPassword($email, $password)
    {
        return $this->user->where(['email' => $email])->first();
//        $this->user->where(['email' => $email, 'password' => $password])->first();
    }

    public function findUserById($id)
    {
        return $this->user->where(['id' => $id])->first();
    }
}
