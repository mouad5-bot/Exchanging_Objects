<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        {
            $addProduct='add product';
            $editAllProducts = 'edit All product';
            $editMyProduct = 'edit My product';
            $deleteAllProducts = 'delete All product';
            $deleteMyProduct = 'delete My product';
            $viewProducts='view products';
    
            $addCategory='add category';
            $editCategory='edit category';
            $deleteCategory='delete category';
            $viewCategory='view category';
    
            $addRole='add role';
            $editRole='edit role';
            $deleteRole='delete role';
    
    
            $viewUsers='view users';
            $viewUser='view user';
            $editUsers='edit users';
            $editUser='edit user';
            $deleteUsers='delete users';
            $deleteUser='delete user';

            $viewDashboard = 'view dashboard';
    
            Permission::create(['name' => $addProduct]);
            Permission::create(['name' => $editAllProducts]);
            Permission::create(['name' => $editMyProduct]);
            Permission::create(['name' => $deleteAllProducts]);
            Permission::create(['name' => $deleteMyProduct]);
            Permission::create(['name' => $viewProducts]);
    
            Permission::create(['name' => $addCategory]);
            Permission::create(['name' => $editCategory]);
            Permission::create(['name' => $deleteCategory]);
            Permission::create(['name' => $viewCategory]); 

            Permission::create(['name' => $addRole]);
            Permission::create(['name' => $editRole]);
            Permission::create(['name' => $deleteRole]); 
    
            Permission::create(['name' => $viewUsers]);
            Permission::create(['name' => $viewUser]);
            Permission::create(['name' => $editUsers]);
            Permission::create(['name' => $editUser]);
            Permission::create(['name' => $deleteUsers]);
            Permission::create(['name' => $deleteUser]);

            Permission::create(['name' => $viewDashboard]);
    
            Role::create(['name' => 'Super_admin'])->givePermissionTo(Permission::all());
            Role::create(['name' => 'admin'])->givePermissionTo([
                $addProduct,
                $editAllProducts,
                $deleteAllProducts,
                $viewProducts,

                $addCategory,
                $editCategory,
                $deleteCategory,
                $viewCategory,
            
                $viewUsers,
                $editUsers,
                $deleteUsers,

                $viewDashboard,
            ]);
            Role::create(['name' => 'client'])->givePermissionTo([
                $addProduct,
                $editMyProduct,
                $deleteMyProduct,
                $viewProducts,                
     
                $viewUser,  
                $editUser,
                $deleteUser,
            ]);
        }
        
    }
}
