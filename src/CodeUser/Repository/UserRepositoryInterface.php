<?php

namespace CodePress\CodeUser\Repository;

use CodePress\CodeDatabase\Contracts\RepositoryInterface;
use CodePress\CodeDatabase\Contracts\CriteriaCollectionInterface;

/**
 * Description of UserRepositoryInterface
 *
 * @author gabriel
 */
interface UserRepositoryInterface extends RepositoryInterface, CriteriaCollectionInterface
{
    public function addRoles(int $id, array $roles);
}
