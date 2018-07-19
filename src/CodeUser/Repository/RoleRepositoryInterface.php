<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\Contracts\RepositoryInterface;
use CodePress\CodeDatabase\Contracts\CriteriaCollectionInterface;

/**
 * Description of RoleRepositoryInterface
 *
 * @author gabriel
 */
interface RoleRepositoryInterface extends RepositoryInterface, CriteriaCollectionInterface
{
    public function addPermissions(int $id, array $permissions);
}
