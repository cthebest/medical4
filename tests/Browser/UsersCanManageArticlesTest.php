<?php

namespace Tests\Browser;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Dotenv\Util\Str;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\DuskTestCase;

class UsersCanManageArticlesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     */
    public function test_can_authorized_users_create_articles(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'create_articles']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        $category = Category::create([
            'name' => 'Sin categoría',
            'alias' => \Str::slug('Sin categoría'),
            'description' => 'Permite establecer un control sobre los artículos o recursos
            que no dependan de una categoría'
        ]);

        $this->browse(function (Browser $browser) use ($user, $category) {
            $browser->loginAs($user)->visitRoute('articles.create')
                ->assertSee('Crear un artículo')
                ->type('title', 'Soy enoe')
                ->type('alias', \Str::slug('Soy enoe'))
                ->select('category_id', $category->id)
                ->select('status', 'published')
                ->type('body', 'Este es un artículo de prueba')
                ->press('#create-article')
                ->assertPathIs('/admin/articles/create')
                ->assertSee('Artículo creado con éxito');
        });
    }

    /**
     * A basic browser test example.
     */
    public function test_can_users_see_required_error_title_when_try_to_create_articles(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'create_articles']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        $category = Category::create([
            'name' => 'Sin categoría',
            'alias' => \Str::slug('Sin categoría'),
            'description' => 'Permite establecer un control sobre los artículos o recursos
            que no dependan de una categoría'
        ]);

        $this->browse(function (Browser $browser) use ($user, $category) {
            $browser->loginAs($user)->visitRoute('articles.create')
                ->assertSee('Crear un artículo')
                ->type('title', '')
                ->type('alias', \Str::slug('Soy enoe'))
                ->select('category_id', $category->id)
                ->select('status', 'published')
                ->type('body', 'Este es un artículo de prueba')
                ->press('#create-article')
                ->assertPathIs('/admin/articles/create')
                ->assertSee('The title field is required.');
        });
    }

    /**
     * A basic browser test example.
     */
    public function test_can_users_see_unique_error_title_when_try_to_create_categories(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'create_articles']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        $category = Category::create([
            'name' => 'Sin categoría',
            'alias' => \Str::slug('Sin categoría'),
            'description' => 'Permite establecer un control sobre los artículos o recursos
            que no dependan de una categoría'
        ]);

        $article = Article::factory()->create();

        $this->browse(function (Browser $browser) use ($user, $category, $article) {
            $browser->loginAs($user)->visitRoute('articles.create')
                ->assertSee('Crear un artículo')
                ->type('title', $article->title)
                ->type('alias', \Str::slug('Soy enoe'))
                ->select('category_id', $category->id)
                ->select('status', 'published')
                ->type('body', 'Este es un artículo de prueba')
                ->press('#create-article')
                ->assertPathIs('/admin/articles/create')
                ->assertSee('The title has already been taken');
        });
    }

    /**
     * A basic browser test example.
     */
    public function test_can_authorized_users_update_articles(): void
    {
        $user = User::factory()->create();
        $role = Role::create(['name' => 'editor']);
        $permission = Permission::create(['name' => 'update_articles']);
        $role->givePermissionTo($permission);
        $user->assignRole($role);
        $category = Category::create([
            'name' => 'Sin categoría',
            'alias' => \Str::slug('Sin categoría'),
            'description' => 'Permite establecer un control sobre los artículos o recursos
            que no dependan de una categoría'
        ]);

        $article = Article::factory()->create();

        $this->browse(function (Browser $browser) use ($user, $category, $article) {
            $browser->loginAs($user)->visitRoute('articles.edit', $article->id)
                ->assertSee('Actualizar un artículo')
                ->type('title', $article->title)
                ->type('alias', \Str::slug('Soy enoe'))
                ->select('category_id', $category->id)
                ->select('status', 'draft')
                ->type('body', 'Este es un artículo de prueba')
                ->press('#create-article')
                ->assertSee('Artículo actualizado con éxito');
        });
    }
}
