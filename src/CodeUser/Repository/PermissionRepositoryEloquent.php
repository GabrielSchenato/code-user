<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\AbstractRepository;
use CodePress\CodeUser\Models\Permission;

/**
 * Description of PermissionRepositoryEloquent
 *
 * @author gabriel
 */
class PermissionRepositoryEloquent extends AbstractRepository implements PermissionRepositoryInterface
{

    public function model()
    {
        return Permission::class;
    }
    
    public function pluck($column, $key = null)
    {
        $this->applyCriteria();
        return $this->model->pluck($column, $key);
    }

}
