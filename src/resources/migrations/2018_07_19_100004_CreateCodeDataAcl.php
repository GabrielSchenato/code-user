<?php

use Illuminate\Database\Migrations\Migration;
use CodePress\CodeUser\Models\Role;
use CodePress\CodeUser\Models\Permission;
class CreateCodeDataAcl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $roleAdmin = Role::create([
            'name' => Role::ROLE_ADMIN
        ]);
        
        $roleEditor = Role::create([
            'name' => Role::ROLE_EDITOR
        ]);
        
        $roleRedator = Role::create([
            'name' => Role::ROLE_REDATOR
        ]);
        
        $permissionPublishPost = Permission::create([
            'name' => 'publish_post',
            'description' => 'Permissão para publicação de posts que estão em rascunho'
        ]);
        
        $roleEditor->permissions()->save($permissionPublishPost);
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
