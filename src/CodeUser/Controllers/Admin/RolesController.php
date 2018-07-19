<?php

namespace CodePress\CodeUser\Controllers;

use CodePress\CodeUser\Repository\RoleRepositoryInterface;
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

    public function __construct(ResponseFactory $response, RoleRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->response = $response;
    }

    public function index()
    {
        $roles = $this->repository->all();
        return $this->response->view('codeuser::admin.role.index', compact('roles'));
    }

    public function show(int $id)
    {
        $role = $this->repository->find($id);
        return $this->response->view('codeuser::admin.role.show', compact('role'));
    }

    public function create()
    {
        return $this->response->view('codeuser::admin.role.create');
    }

    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('admin.roles.index');
    }

    public function edit(int $id)
    {
        $role = $this->repository->find($id);
        return $this->response->view('codeuser::admin.role.edit', compact('roles'));
    }

    public function update(int $id, Request $request)
    {
        $this->repository->update($request->all(), $id);

        return redirect()->route('admin.roles.index');
    }

}
