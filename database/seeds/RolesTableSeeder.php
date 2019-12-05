<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = new Role();
        $super_admin->name = 'super-admin';
        $super_admin->display_name = 'Super Administrator';
        $super_admin->description = 'Admin with all rights of the System';
        $super_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->display_name = 'Administrator';
        $role_admin->description = 'System\'s Head Administrator';
        $role_admin->save();

        // 

        $role_donor = new Role();
        $role_donor->name = 'company-admin';
        $role_donor->display_name = 'Company Admin';
        $role_donor->description = 'User who is an administrator of a company';
        $role_donor->save();

        $role_volunteer = new Role();
        $role_volunteer->name = 'company-worker';
        $role_volunteer->display_name = 'Company Worker';
        $role_volunteer->description = 'A user who works under a company';
        $role_volunteer->save();
        //
        $role_editor = new Role();
        $role_editor->name = 'free-lancer';
        $role_editor->display_name = 'Freelance Worker';
        $role_editor->description = 'A user who is a service provider but with individual services';
        $role_editor->save();

        $role_user = new Role();
        $role_user->name = 'subscriber';
        $role_user->display_name = 'Subscriber';
        $role_user->description = 'A user signed up with a subscription account to ' . config('app.name');
        $role_user->save();

        $role_guest = new Role();
        $role_guest->name = 'guest';
        $role_guest->display_name = 'Guest User';
        $role_guest->description = 'A user reviewing the system';
        $role_guest->save();
    }
}
