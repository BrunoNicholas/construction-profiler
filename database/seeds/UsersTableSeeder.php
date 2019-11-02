<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Role;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('role_user');
    	
        $user_super = new User();
        $user_super->name = 'Bruno Nicholas';
        $user_super->email = 'sbnibro256@gmail.com';
        $user_super->password = bcrypt('dollar');
        $user_super->gender = 'Male';
        $user_super->telephone = '0782407042';
        $user_super->home_address = 'Kampala, Uganda';
        $user_super->role = 'super-admin';
        $user_super->nationality = 'Ugandan';
        $user_super->occupation = 'Software Developer';
        $user_super->bio = 'Am a loving very very good Christian!';
        $user_super->status = 'active';
        $user_super->save();
        
        $user_super->attachRole(Role::where('name','super-admin')->first());
        $user_admin = new User();
        $user_admin->name = 'Emma Katabaazi'; 
        $user_admin->email = 'katabemma@gmail.com';
        $user_admin->password = bcrypt('dollar');
        $user_admin->gender = 'Male';
        $user_admin->home_address = 'Kampala';
        $user_admin->role = 'admin';
        $user_admin->nationality = 'Ugandan';
        $user_admin->bio = 'Am a loving good Christian!';
        $user_admin->status = 'active';
        $user_admin->save();         
        $user_admin->attachRole(Role::where('name','admin')->first());
    }
}
