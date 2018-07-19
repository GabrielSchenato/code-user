<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\Role;

/**
 * Description of RoleRepositoryEloquent
 *
 * @author gabriel
 */
class RoleRepositoryEloquent extends AbstractRepository implements RoleRepositoryInterface
{

    public function model()
    {
        return Role::class;
    }

}
