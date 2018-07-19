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

    private $permissionRepository;

    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        parent::__construct();
        $this->permissionRepository = $permissionRepository;
    }

    public function model()
    {
        return Role::class;
    }

    public function addPermissions(int $id, array $permissions)
    {
        $model = $this->find($id);
        foreach ($permissions as $v) {
            $model->permissions()->save($this->permissionRepository->find($v));
        }
        return $model;
    }

}
