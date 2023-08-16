<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function __construct()
    {
        $this->middleware('can:show-permissions')->only('index');
        $this->middleware('can:create-permission')->only(['create','store']);
        $this->middleware('can:edit-permission')->only(['edit' , 'update']);
        $this->middleware('can:delete-permission')->only(['destroy']);
    }
    public function index()
    {
        $permissions = Permission::query();

        $permissions = $permissions->latest()->paginate('20');
        return view('admin.permissions.all' , compact('permissions'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
           'name' =>['required' , 'string' , 'max:255' , 'unique:permissions'],
           'label' =>['required' , 'string' , 'max:255'],
        ]);

        $permission = Permission::create($data);


        return redirect(route('admin.permissions.index'));
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit' , compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
           'name'=>['required','string', 'max:255' ,Rule::unique('permissions')->ignore($permission->id)],
            'label'=>['required','string', 'max:255' ],
        ]);

        $permission->update($data);
        return redirect(route('admin.permissions.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return back();
    }
}
