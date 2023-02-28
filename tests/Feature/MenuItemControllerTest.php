<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Component;
use App\Models\ComponentOption;
use App\Models\MenuItem;
use App\Models\User;
use App\Services\CategoryArticleFilter;
use App\Services\RouterCMS;
use App\Services\SingleArticleFilter;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('Can admin user create a menu item', function () {
    $role = Role::create(['name' => 'admin']);
    $user = User::factory()->create();
    $user->assignRole($role);
    $category = Category::factory()->create();

    $article = new Article([
        'title' => 'Mi primer artículo',
        'alias' => Str::slug('Mi primer artículo'),
        'status' => 'published',
        'description' => 'Test descripción'
    ]);

    $article->category()->associate($category);
    $article->user()->associate($user);
    $article->save();

    //Construimos los compoentes
    $component = Component::create([
        'name' => 'articles',
        'label' => 'Artículos',
        'route' => 'p_articles.show'
    ]);

    // Construimos una opción
    $c_option = new ComponentOption([
        'name' => 'Artículo simple',
        'livewire_field' => 'choose_article_resource',
        'filter' => SingleArticleFilter::class,
        'route' => 'p_articles.show'
    ]);
    $component->component_options()->save($c_option);

    $menuItem = [
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'component_id' => 1,
        'component_option_id' => 1,
        'resource_id' => 1
    ];

    $response = $this->actingAs($user)
        ->post(route('menu-items.store'), $menuItem)
        ->assertRedirect(route('menu-items.create'));

    // Then
    $this->assertDatabaseHas('menu_items',  [
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'resource_id' => 1
    ]);
});


it('Can unauthorized user create a menu item', function () {
    $role = Role::create(['name' => 'editor']);
    $user = User::factory()->create();
    $user->assignRole($role);
    $category = Category::factory()->create();

    $article = new Article([
        'title' => 'Mi primer artículo',
        'alias' => Str::slug('Mi primer artículo'),
        'status' => 'published',
        'description' => 'Test descripción'
    ]);

    $article->category()->associate($category);
    $article->user()->associate($user);
    $article->save();

    //Construimos los compoentes
    $component = Component::create([
        'name' => 'articles',
        'label' => 'Artículos',
        'route' => 'p_articles.show'
    ]);

    // Construimos una opción
    $c_option = new ComponentOption([
        'name' => 'Artículo simple',
        'livewire_field' => 'choose_article_resource',
        'filter' => SingleArticleFilter::class,
        'route' => 'p_articles.show'
    ]);
    $component->component_options()->save($c_option);

    $menuItem = [
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'component_id' => 1,
        'component_option_id' => 1,
        'resource_id' => 1
    ];

    $response = $this->actingAs($user)
        ->post(route('menu-items.store'), $menuItem)
        ->assertForbidden();

    // Then
    $this->assertDatabaseMissing('menu_items',  [
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'resource_id' => 1
    ]);
});


it('Can authorized user create a menu item', function () {
    $role = Role::create(['name' => 'editor']);
    $permission = Permission::create(['name' => 'create_menu_items']);
    $role->givePermissionTo($permission);
    $user = User::factory()->create();
    $user->assignRole($role);
    $category = Category::factory()->create();

    $article = new Article([
        'title' => 'Mi primer artículo',
        'alias' => Str::slug('Mi primer artículo'),
        'status' => 'published',
        'description' => 'Test descripción'
    ]);

    $article->category()->associate($category);
    $article->user()->associate($user);
    $article->save();

    //Construimos los compoentes
    $component = Component::create([
        'name' => 'articles',
        'label' => 'Artículos',
        'route' => 'p_articles.show'
    ]);

    // Construimos una opción
    $c_option = new ComponentOption([
        'name' => 'Artículo simple',
        'livewire_field' => 'choose_article_resource',
        'filter' => SingleArticleFilter::class,
        'route' => 'p_articles.show'
    ]);
    $component->component_options()->save($c_option);

    $menuItem = [
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'component_id' => 1,
        'component_option_id' => 1,
        'resource_id' => 1
    ];

    $response = $this->actingAs($user)
        ->post(route('menu-items.store'), $menuItem)
        ->assertRedirect(route('menu-items.create'));

    // Then
    $this->assertDatabaseHas('menu_items',  [
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'resource_id' => 1
    ]);
});



it('Can authorized user update a menu item', function () {
    $role = Role::create(['name' => 'editor']);
    $permission = Permission::create(['name' => 'update_menu_items']);
    $role->givePermissionTo($permission);
    $user = User::factory()->create();
    $user->assignRole($role);
    $category = Category::factory()->create();

    $article = new Article([
        'title' => 'Mi primer artículo',
        'alias' => Str::slug('Mi primer artículo'),
        'status' => 'published',
        'description' => 'Test descripción'
    ]);

    $article->category()->associate($category);
    $article->user()->associate($user);
    $article->save();

    //Construimos los compoentes
    $component = Component::create([
        'name' => 'articles',
        'label' => 'Artículos',
        'route' => 'p_articles.show'
    ]);

    // Construimos una opción
    $c_option = new ComponentOption([
        'name' => 'Artículo simple',
        'livewire_field' => 'choose_article_resource',
        'filter' => SingleArticleFilter::class,
        'route' => 'p_articles.show'
    ]);

    // Construimos una opción
    $c_option2 = new ComponentOption([
        'name' => 'Listado',
        'livewire_field' => '',
        'filter' => SingleArticleFilter::class,
        'route' => 'p_articles.index'
    ]);
    $component->component_options()->save($c_option);
    $component->component_options()->save($c_option2);

    $menuItem = new MenuItem([
        'title' => 'Soy enoe',
        'alias' => Str::slug('Soy enoe'),
        'path' => Str::slug('Soy enoe'),
        'resource_id' => 1
    ]);

    $menuItem->component()->associate($component);
    $menuItem->component_option()->associate($c_option);
    $menuItem->save();

    $response = $this->actingAs($user)
        ->put(route('menu-items.update', $menuItem->id), [
            'title' => 'Soy enoes',
            'alias' => Str::slug('Soy enoe'),
            'resource_id' => 1,
            'component_id' => 1,
            'component_option_id' => 2
        ])
        ->assertRedirect(route('menu-items.edit', $menuItem->id));

    // Then
    $this->assertDatabaseHas('menu_items',  [
        'title' => 'Soy enoes',
        'alias' => Str::slug('Soy enoe'),
        'resource_id' => 1,
        'component_id' => 1,
        'component_option_id' => 2
    ]);
});
