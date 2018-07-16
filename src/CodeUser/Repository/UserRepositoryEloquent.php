<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\User;
use CodePress\CodeUser\Event\UserCreatedEvent;

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
        #event(new UserCreatedEvent($result, $password));
        #event('event.codepress');
        event('event.numero1');
        event('event.numero2');
        return $result;
    }

    public function model()
    {
        return User::class;
    }

}
