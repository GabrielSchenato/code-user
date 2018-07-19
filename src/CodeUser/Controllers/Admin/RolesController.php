<?php

namespace CodePress\CodeUser\Controllers\Admin;

use CodePress\CodeUser\Controllers\Controller;
use CodePress\CodeUser\Repository\RoleRepositoryInterface;
use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;

/**
 * Description of RolesController
 *
 * @author gabriel
 */
class RolesController extends Controller
{

    private $response;
    private $repository;
    private $permissionRepository;

    public function __construct(ResponseFactory $response, RoleRepositoryInterface $repository, PermissionRepositoryInterface $permissionRepository)
    {
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
        $this->response = $response;
    }

    public function index()
    {
        $this->auth();
        $roles = $this->repository->all();
        return $this->response->view('codeuser::admin.role.index', compact('roles'));
    }

    public function show(int $id)
    {
        $this->auth();
        $role = $this->repository->find($id);
        return $this->response->view('codeuser::admin.role.show', compact('role'));
    }

    public function create()
    {
        $this->auth();
        $permissions = $this->permissionRepository->pluck('name', 'id');
        return $this->response->view('codeuser::admin.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->auth();
        $role = $this->repository->create($request->all());
        $this->repository->addPermissions($role->id, $request->get('permissions'));
        return redirect()->route('admin.roles.index');
    }

    public function edit(int $id)
    {
        $this->auth();
        $role = $this->repository->find($id);
        $permissions = $this->permissionRepository->pluck('name', 'id');
        return $this->response->view('codeuser::admin.role.edit', compact('role', 'permissions'));
    }

    public function update(int $id, Request $request)
    {
        $this->auth();
        $role = $this->repository->update($request->all(), $id);
        $this->repository->addPermissions($role->id, $request->get('permissions'));
        return redirect()->route('admin.roles.index');
    }
    
    private function auth()
    {
        $this->authorize('access_users');
    }

}
