<?php

namespace Tests\Browser;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\DuskTestCase;

class UsersCanManageCategoriesTest extends DuskTestCase
{
    use DatabaseMigrations;


    /**
     * A basic browser test example.
     */
    public function test_can_authorized_users_create_categories(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'create_categories']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)->visitRoute('categories.create')
                ->assertSee('Crear una categoría')
                ->type('name', 'Servicios')
                ->type('alias', \Str::slug('Servicios'))
                ->type('description', 'Categoría creada para mostrar los servicios disponibles en la página enoe')
                ->press('#create-category')
                ->assertPathIs('/admin/categories/create')
                ->assertSee('Categoría creada con éxito');
        });
    }

    /**
     * A basic browser test example.
     */
    public function test_can_users_see_required_error_name_when_try_to_create_categories(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'create_categories']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)->visitRoute('categories.create')
                ->assertSee('Crear una categoría')
                ->type('name', '')
                ->type('alias', \Str::slug('Servicios'))
                ->type('description', 'Categoría creada para mostrar los servicios disponibles en la página enoe')
                ->press('#create-category')
                ->screenshot('prueba')
                ->assertSee('The name field is required.');
        });
    }

    /**
     * A basic browser test example.
     */
    public function test_can_users_see_unique_error_name_when_try_to_create_categories(): void
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'create_categories']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);

        $this->browse(function (Browser $browser) use ($user, $category) {
            $browser->loginAs($user)->visitRoute('categories.create')
                ->assertSee('Crear una categoría')
                ->type('name', $category->name)
                ->type('alias', \Str::slug('Servicios'))
                ->type('description', 'Categoría creada para mostrar los servicios disponibles en la página enoe')
                ->press('#create-category')
                ->screenshot('prueba')
                ->assertSee('The name has already been taken');
        });
    }

    /**
     * A basic browser test example.
     */
    public function test_can_authorized_users_update_categories(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'update_categories']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);

        $category = Category::factory()->create();

        $this->browse(function (Browser $browser) use ($user, $category) {
            $browser->loginAs($user)->visitRoute('categories.edit', $category->id)
                ->assertSee('Actualizar una categoría')
                ->type('name', 'Edit text')
                ->type('alias', \Str::slug('Servicios'))
                ->type('description', 'Categoría creada para mostrar los servicios disponibles en la página enoe')
                ->press('#create-category')
                ->assertSee('Categoría actualizada con éxito');
        });
    }
}
