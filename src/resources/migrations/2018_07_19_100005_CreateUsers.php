<?php

use Illuminate\Database\Migrations\Migration;
use CodePress\CodeUser\Models\Role;
use CodePress\CodeUser\Models\User;

class CreateUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleAdmin = Role::where('name', Role::ROLE_ADMIN)->first();

        $admin = User::create([
                    'name' => 'Administrador',
                    'email' => 'admin@codepress.com',
                    'password' => bcrypt(123456)
        ]);

        $admin->roles()->save($roleAdmin);

        $roleEditor = Role::where('name', Role::ROLE_EDITOR)->first();

        $editor = User::create([
                    'name' => 'Editor',
                    'email' => 'editor@codepress.com',
                    'password' => bcrypt(123456)
        ]);

        $editor->roles()->save($roleEditor);

        $roleRedator = Role::where('name', Role::ROLE_REDATOR)->first();

        $redator = User::create([
                    'name' => 'Redator',
                    'email' => 'redator@codepress.com',
                    'password' => bcrypt(123456)
        ]);

        $redator->roles()->save($roleRedator);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }

}
