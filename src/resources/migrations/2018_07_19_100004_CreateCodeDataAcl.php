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
        
        $permissionAccessCategories = Permission::create([
            'name' => 'access_categories',
            'description' => 'Permissão para o acesso a área de categorias'
        ]);
        
        $permissionAccessTags = Permission::create([
            'name' => 'access_tags',
            'description' => 'Permissão para o acesso a área de tags'
        ]);
        
        $permissionAccessUsers = Permission::create([
            'name' => 'access_users',
            'description' => 'Permissão para o acesso a área de usuários'
        ]);
        
        $permissionAccessPosts = Permission::create([
            'name' => 'access_posts',
            'description' => 'Permissão para o acesso a área de posts'
        ]);
        
        $roleEditor->permissions()->save($permissionPublishPost);
        $roleEditor->permissions()->save($permissionAccessPosts);
        
        $roleRedator->permissions()->save($permissionAccessPosts);
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
