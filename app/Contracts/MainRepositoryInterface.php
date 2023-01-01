<?php


namespace App\Contracts;


interface MainRepositoryInterface
{
    public function all($columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

    public function create(array $data);

    /**
     * @param array $data values to be updated
     * @param mixed $id comparing value
     * @return mixed
     */
    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findOrFail($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));

    public function where($whereArr, $first = false, $columns = array('*'), $pluckColumn = null);

    public function model();

//    public function getTokenFromTokenService($guid);
//
//    public function checkIsTokenValid($token);
}
