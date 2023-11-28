<?php
    
namespace App\Http\Controllers;

use app\Models\Role;
use Illuminate\Http\Request;

/**
 * Summary of RoleController
 */
class RoleController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $roleModel = new Role();

        $roles = $roleModel->getRolesData();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Summary of create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Summary of store
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);

        Role::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Roles created successfully.');
    }

    /**
     * Summary of show
     * @param \app\Models\Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    /**
     * Summary of edit
     * @param \app\Models\Role $role
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param \app\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $role->update($request->all());

        return redirect()->route('admin.role.index')
            ->with('success', 'Roles updated successfully.');
    }

    /**
     * Summary of destroy
     * @param \app\Models\Role $role
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.role.index')
            ->with('success', 'Roles deleted successfully.');
    }
}