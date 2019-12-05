<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
        		'name'			=> 'create_role',
	        	'display_name'	=> 'Create a role',
	        	'description'	=> 'Can create a new role',
        	],
        	[
        		'name'			=> 'edit_role',
	        	'display_name'	=> 'Edit a role',
	        	'description'	=> 'Can edit a role',
        	],
        	[
        		'name'			=> 'delete_role',
	        	'display_name'	=> 'Deletea role',
	        	'description'	=> 'Can delete a role',
        	],
        	// users
        	[
        		'name'			=> 'create_user',
	        	'display_name'	=> 'Create a user',
	        	'description'	=> 'Can create a new user',
        	],
        	[
        		'name'			=> 'edit_user',
	        	'display_name'	=> 'Can edit user profile',
	        	'description'	=> 'edit any user\'s profile',
        	],
        	[
        		'name'			=> 'delete_user',
	        	'display_name'	=> 'Can delete a user',
	        	'description'	=> 'Can delete any user\'s profile',
        	],
        	// messages
        	[
        		'name'			=> 'can_message',
	        	'display_name'	=> 'Can use messaging',
	        	'description'	=> 'User can use the messaging platform',
        	],
        	[
        		'name'			=> 'can_send_message',
	        	'display_name'	=> 'Can send message',
	        	'description'	=> 'User can send a message',
        	],
        	[
        		'name'			=> 'can_send_send_public_message',
	        	'display_name'	=> 'Can send a public message',
	        	'description'	=> 'User can send a public message to all',
        	],
        	// comments
            [
                'name'          => 'can_make_comment',
                'display_name'  => 'Can comment on system resources',
                'description'   => 'A user can add a comment',
            ],
            [
                'name'          => 'can_edit_comment',
                'display_name'  => 'Can edit a comment',
                'description'   => 'A user can edit a user comment',
            ],
            [
                'name'          => 'can_delete_comment',
                'display_name'  => 'Can delete a comment',
                'description'   => 'A user can delete a comment',
            ],
            // departments
            [
                'name'          => 'can_add_department',
                'display_name'  => 'Can create a system department',
                'description'   => 'A user can add a comment',
            ],
            [
                'name'          => 'can_make_image_upload',
                'display_name'  => 'Can upload images to the system',
                'description'   => 'A user can add a comment',
            ],
            [
                'name'          => 'can_add_content',
                'display_name'  => 'Can add content',
                'description'   => 'A user can add a content to the system pages',
            ],
            [
                'name'          => 'can_add_projects',
                'display_name'  => 'Can add a system project',
                'description'   => 'A user can add a department project',
            ],
            [
                'name'          => 'can_add_questions',
                'display_name'  => 'Can ask a question',
                'description'   => 'A user can ask questions to the system',
            ],
            // permissions
            [
                'name'          => 'can_view_permissions',
                'display_name'  => 'Can view system permissions',
                'description'   => 'A user can view permissions',
            ],
            [
                'name'          => 'can_add_perm',
                'display_name'  => 'Can add a permission',
                'description'   => 'User can add a permission',
            ],
            [
                'name'          => 'can_delete_perm',
                'display_name'  => 'Can delete a permission',
                'description'   => 'A user ca delete a system permission',
            ],
            // posts
            [
                'name'          => 'can_view_posts',
                'display_name'  => 'Can view all Posts',
                'description'   => 'A user can view system posts',
            ],
            [
                'name'          => 'can_add_post',
                'display_name'  => 'Can Add a post',
                'description'   => 'A user can add a post',
            ],
            [
                'name'          => 'can_delete_post',
                'display_name'  => 'Can delete a post',
                'description'   => 'A user can delete a post',
            ],
            // project
            [
                'name'          => 'can_view_projects',
                'display_name'  => 'Can view projects',
                'description'   => 'A user can view projects',
            ],
            [
                'name'          => 'can_add_project',
                'display_name'  => 'Can add a project',
                'description'   => 'A user can add a project',
            ],
            [
                'name'          => 'can_delete_project',
                'display_name'  => 'Can delete a project',
                'description'   => 'A user can delete a project',
            ],
            // questions
            [
                'name'          => 'can_view_questions',
                'display_name'  => 'Can view questions',
                'description'   => 'A user can view a questions',
            ],

            // ratings
            [
                'name'          => 'can_rate',
                'display_name'  => 'Can make rating',
                'description'   => 'A user can make a rating',
            ],

            // reviews
            [
                'name'          => 'can_review',
                'display_name'  => 'Can make reviews',
                'description'   => 'A user can make reviews',
            ],

            // worker profile
            [
                'name'          => 'access_worker_profile',
                'display_name'  => 'Can access worker profile',
                'description'   => 'A user can create a worker\'s profile',
            ],

            // 
            // [
            //     'name'          => '',
            //     'display_name'  => '',
            //     'description'   => '',
            // ],
            // [
            //     'name'          => '',
            //     'display_name'  => '',
            //     'description'   => '',
            // ],
            // [
            //     'name'          => '',
            //     'display_name'  => '',
            //     'description'   => '',
            // ],
        ];
        foreach ($permissions as $key => $value) {
        	Permission::create($value);
        }
    }
}
