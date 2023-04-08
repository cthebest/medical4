<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categorías
        Permission::create([
            'name' => 'index_categories'
        ]);
        Permission::create([
            'name' => 'create_categories'
        ]);
        Permission::create([
            'name' => 'update_categories'
        ]);
        Permission::create([
            'name' => 'delete_categories'
        ]);
        //Artículos
        Permission::create([
            'name' => 'index_articles'
        ]);

        Permission::create([
            'name' => 'create_articles'
        ]);

        Permission::create([
            'name' => 'update_articles'
        ]);

        Permission::create([
            'name' => 'delete_articles'
        ]);

        //ïtems de menú
        Permission::create([
            'name' => 'index_menu_items'
        ]);

        Permission::create([
            'name' => 'create_menu_items'
        ]);

        Permission::create([
            'name' => 'update_menu_items'
        ]);

        Permission::create([
            'name' => 'delete_menu_items'
        ]);
        //Roles
        Permission::create([
            'name' => 'index_roles'
        ]);

        Permission::create([
            'name' => 'create_roles'
        ]);

        Permission::create([
            'name' => 'update_roles'
        ]);

        Permission::create([
            'name' => 'delete_roles'
        ]);

         //Preguntas
         Permission::create([
            'name' => 'index_faq'
        ]);

        Permission::create([
            'name' => 'create_faq'
        ]);

        Permission::create([
            'name' => 'update_faq'
        ]);

        Permission::create([
            'name' => 'delete_faq'
        ]);
    }
}
