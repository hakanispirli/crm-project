<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function AllPermission()
    {
        return view('permissions.all_permission');
    }

    public function GetPermission()
    {
        $permission = Permission::all();
        return response()->json(['success' => true, 'permission' => $permission]);
    }

    public function AddPermission(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'group_name' => 'required|string|max:255',
        ]);

        $permission = new Permission();
        $permission->name = $validatedData['name'];
        $permission->group_name = $validatedData['group_name'];
        $permission->save();

        return response()->json(['success' => true, 'message' => 'İzin başarıyla eklendi']);
    }

    public function EditPermission($id)
    {
        $permission = Permission::find($id);
        return view('permissions.edit_permission', compact('permission'));
    }

    public function UpdatePermission (Request $request)
    {
        $permission_id = $request->id;

        Permission::find($permission_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    public function DeletePermission($id)
    {
        Permission::find($id)->delete();

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.permission')->with($notification);
    }

    // Rol İşlemleri

    public function AllRoles()
    {
        return view('permissions.all_roles');
    }

    public function GetRole()
    {
        $role = Role::all();
        return response()->json(['success' => true, 'role' => $role]);
    }

    public function AddRoles(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $role = new Role();
        $role->name = $validatedData['name'];
        $role->save();

        return response()->json(['success' => true, 'message' => 'Rol başarıyla eklendi']);
    }

    public function EditRoles($id)
    {
        $role = Role::find($id);
        return view('permissions.edit_roles', compact('role'));
    }

    public function UpdateRoles (Request $request)
    {
        $role_id = $request->id;

        Role::find($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Rol Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );

        return redirect()->route('all.roles')->with($notification);
    }

    public function DeleteRoles($id)
    {
        $role = Role::find($id);

        if (!$role) {
            // Role not found, handle error or return response
            $notification = array(
                'message' => 'Rol Bulunamadı.',
                'alert-type' => 'error'
            );
            return redirect()->route('all.roles')->with($notification);
        }

        Role::find($id)->delete();

        $notification = array(
            'message' => 'Rol Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles')->with($notification);
    }

    public function AllRolesPermission()
    {
        return view('permissions.all_roles_permission');
    }

    public function GetRolesPermission()
    {
        $role = Role::with('permissions')->get();
        return response()->json(['success' => true, 'role' => $role]);
    }

    public function AddRolesPermission()
    {
        $role = Role::all();
        $permission_groups = User::getpermissionGroups();
        $permissions = Permission::all();
        return view('permissions.add_roles_permission', compact('role','permission_groups','permissions'));
    }

    public function RolePermissionStore(Request $request)
    {
        $role_id = $request->role_id;
        $permissions = $request->permission;

        foreach ($permissions as $permission_id) {
            $existingPermission = DB::table('role_has_permissions')
                ->where('role_id', $role_id)
                ->where('permission_id', $permission_id)
                ->first();

            if ($existingPermission) {
                $notification = array(
                    'message' => 'Role zaten atanmış izinler var!',
                    'alert-type' => 'warning'
                );
                return redirect()->route('all.roles.permission')->with($notification);
            }

            DB::table('role_has_permissions')->insert([
                'role_id' => $role_id,
                'permission_id' => $permission_id
            ]);
        }

        $notification = array(
            'message' => 'Rol İzin Bilgileri Başarılı Şekilde Eklendi.',
            'alert-type' => 'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    public function EditRolesPermission($id)
    {
        $role = Role::find($id);
        $permission_groups = User::getpermissionGroups();
        $permissions = Permission::all();
        return view('permissions.edit_roles_permission', compact('role','permission_groups','permissions'));
    }

    public function UpdateRolesPermission(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = $request->permission;

        try {
            if (!empty($permissions)) {
                foreach ($permissions as $permissionId) {
                    $permission = Permission::find($permissionId);
                    if (!$permission) {
                        throw new \Exception("Permission with ID $permissionId does not exist.");
                    }
                }
                $role->syncPermissions($permissions);
            }

            $notification = array(
                'message' => 'İzin Başarılı Şekilde Güncellendi.',
                'alert-type' =>'success'
            );
            return redirect()->route('all.roles.permission')->with($notification);
        } catch (\Exception $e) {
            $notification = array(
                'message' => 'İzin güncellenirken bir hata oluştu.',
                'alert-type' => 'error'
            );
            return redirect()->route('all.roles.permission')->with($notification);
        }
    }

    public function DeleteRolesPermission($id)
    {
        $role = Role::find($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'İzin Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.roles.permission')->with($notification);
    }

    // Yönetici İşlemleri

    public function Yoneticiler()
    {
        $roles = Role::all();
        return view('admins.all_admins',compact('roles'));
    }

    public function GetYoneticiler()
    {
        $user = User::with('roles')->get();
        return response()->json(['success' => true, 'user' => $user]);
    }

    public function YoneticiEkle(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefon = $request->telefon;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $role = Role::find($request->get('roles'));
            $user->assignRole($role->name);
        }

        return response()->json(['success' => true, 'message' => 'Yönetici başarılı şekilde eklendi']);
    }

    public function YoneticiDuzenle($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admins.edit_admin',compact('user','roles'));
    }

    public function YoneticiUpdate (Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telefon = $request->telefon;
        $user->save();

        $user->roles()->detach();

        if ($request->roles) {
            $role = Role::find($request->get('roles'));
            $user->assignRole($role->name);
        }

        $notification = array(
            'message' => 'Yönetici Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('yoneticiler')->with($notification);
    }

    public function YoneticiSil($id)
    {
        $user = User::find($id);

        if (!$user) {
            $notification = array(
                'message' => 'Kullanıcı Bulunamadı.',
                'alert-type' => 'error'
            );
            return redirect()->route('yoneticiler')->with($notification);
        }

        // If the user exists, delete it
        $user->delete();

        // Redirect with success message
        $notification = array(
            'message' => 'Yönetici Başarılı Şekilde Silindi.',
            'alert-type' => 'success'
        );
        return redirect()->route('yoneticiler')->with($notification);
    }
}
