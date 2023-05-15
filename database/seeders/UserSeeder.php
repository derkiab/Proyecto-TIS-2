<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role11 = Role::create(['name' => 'mod']);
        $permission1 = Permission::create(['name' => 'vista admin']);
        $permission11 = Permission::create(['name' => 'dashboard']);
        $permission12 = Permission::create(['name' => 'mantenedor usuarios']);
        $permission13 = Permission::create(['name' => 'mantenedor roles']);
        $permission14 = Permission::create(['name' => 'mantenedor permisos']);
        $permission15 = Permission::create(['name' => 'mantenedor productos']);
        $permission16 = Permission::create(['name' => 'mantenedor categorias']);
        $permission17 = Permission::create(['name' => 'mantenedor marcas']);
        $permission18 = Permission::create(['name' => 'mantenedor ventas']);
        $permission19 = Permission::create(['name' => 'mantenedor envio']);
        $permission110 = Permission::create(['name' => 'mantenedor tipo envio']);
        $permission111 = Permission::create(['name' => 'mantenedor metodo pago']);
        $permission112 = Permission::create(['name' => 'mantenedor ordenes']);
        $role1->givePermissionTo($permission1);
        $role1->givePermissionTo($permission11);
        $role1->givePermissionTo($permission12);
        $role1->givePermissionTo($permission13);
        $role1->givePermissionTo($permission14);
        $role1->givePermissionTo($permission15);
        $role1->givePermissionTo($permission16);
        $role1->givePermissionTo($permission17);
        $role1->givePermissionTo($permission18);
        $role1->givePermissionTo($permission19);
        $role1->givePermissionTo($permission110);
        $role1->givePermissionTo($permission111);
        $role1->givePermissionTo($permission112);
        $role11->givePermissionTo($permission1);
        
        $role11->givePermissionTo($permission15);
        $role11->givePermissionTo($permission16);
        $role11->givePermissionTo($permission17);

        $role2 = Role::create(['name' => 'analista']);
        $permission2 = Permission::create(['name' => 'vista analista']);
        $permission21 = Permission::create(['name' => 'reporte ventas']);
        $role2->givePermissionTo($permission2);
        $role2->givePermissionTo($permission11);
        $role2->givePermissionTo($permission21);

        $role3 = Role::create(['name' => 'cliente']);
        $permission3 = Permission::create(['name' => 'vista cliente']);
        $role3->givePermissionTo($permission3);

        $user = new User();
        $user->run = '12345678-K';
        $user->name = 'admin demo';
        $user->email = 'admin@test.cl';
        $user->password = bcrypt('asdf1234');
        $user->address = 'Calle 1 Los Lirios';
        $user->city_fk = 'Concepción';
        $user->region_fk = 'Bio-bio';
        $user->country_fk = 'Chile';

        $user->save();
        $user->assignRole($role1);

        $user = new User();
        $user->run = '12345678-1';
        $user->name = 'moderador demo';
        $user->email = 'mod@test.cl';
        $user->password = bcrypt('asdf1234');
        $user->address = 'Calle 2 Los Lirios';
        $user->city_fk = 'Talcahuano';
        $user->region_fk = 'Bio-bio';
        $user->country_fk = 'Chile';

        $user->save();
        $user->assignRole($role11);

        $user = new User();
        $user->run = '12345678-2';
        $user->name = 'analista demo';
        $user->email = 'analista@test.cl';
        $user->password = bcrypt('asdf1234');

        $user->address = 'Calle 3 Las Violetas';
        $user->city_fk = 'Santiago';
        $user->region_fk = 'Metropolitana';
        $user->country_fk = 'Chile';
        $user->save();
        $user->assignRole($role2);

        $user = new User();
        $user->run = '12345678-3';
        $user->name = 'cliente demo';
        $user->email = 'cliente@test.cl';
        $user->password = bcrypt('asdf1234');
        $user->address = 'Calle 4 Las Violetas';
        $user->city_fk = 'Arica';
        $user->region_fk = 'Arica y Parinacota';
        $user->country_fk = 'Chile';

        $user->save();
        $user->assignRole($role3);

    }
}
