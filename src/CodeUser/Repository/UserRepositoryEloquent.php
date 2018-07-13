<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\User;

/**
 * Description of UserRepositoryEloquent
 *
 * @author gabriel
 */
class UserRepositoryEloquent extends AbstractRepository implements UserRepositoryInterface
{

    public function create(array $data)
    {
        $password = $data['password'];
        $data['password'] = bcrypt($password);
        $result = parent::create($data);
        return $result;
    }

    public function model()
    {
        return User::class;
    }

}
