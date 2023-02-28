<?php

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

test('can an authorized user add tags to article', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'create_articles']);
    $role->givePermissionTo($permission);
    Tag::factory()->create();

    $attributes = [
        'title' => 'My first article',
        'alias' => Str::slug('My first article'),
        'image' => null,
        'category_id' => $category->id,
        'status' => 'published',
        'tags' => [1],
        'body' => 'This is the body of my first article'
    ];
    // When
    $this->actingAs($user)
        ->post(route('articles.store'), $attributes)
        ->assertRedirect(route('articles.create'));

    // Then
    $this->assertDatabaseHas('articles', [
        'title' => 'My first article',
        'alias' => Str::slug('My first article'),
        'image' => null,
        'status' => 'published',
        'category_id' => $category->id,
        'body' => 'This is the body of my first article',
        'user_id' => $user->id
    ]);
});

test('can an authorized user create an article', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'create_articles']);
    $role->givePermissionTo($permission);

    $attributes = [
        'title' => 'My first article',
        'alias' => Str::slug('My first article'),
        'image' => null,
        'category_id' => $category->id,
        'status' => 'published',
        'body' => 'This is the body of my first article'
    ];
    // When
    $this->actingAs($user)
        ->post(route('articles.store'), $attributes)
        ->assertRedirect(route('articles.create'));

    // Then
    $this->assertDatabaseHas('articles', [
        'title' => 'My first article',
        'alias' => Str::slug('My first article'),
        'image' => null,
        'status' => 'published',
        'category_id' => $category->id,
        'body' => 'This is the body of my first article',
        'user_id' => $user->id
    ]);
});


test('can an authorized user update their own articles', function () {
    $role = Role::create(['name' => 'editor']);
    $user = User::factory()->create();
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'update_articles']);
    $role->givePermissionTo($permission);

    $category = Category::factory()->create();

    $article = Article::factory()->create([
        'user_id' => $user->id
    ]);
    $anotherUser = User::factory()->create();
    $body = fake()->paragraph;
    $this->actingAs($user)
        ->put(route('articles.update', $article->id), [
            'title' => 'Actualizando título',
            'alias' => Str::slug('Actualizando título'),
            'body' => $body,
            'status' => 'draft',
            'image' => 'imagen.jpg',
            'category_id' => $category->id
        ]);

    // Assert
    $this->assertDatabaseHas('articles', [
        'title' => 'Actualizando título',
        'alias' => Str::slug('Actualizando título'),
        'body' => $body,
        'status' => 'draft',
        'image' => 'imagen.jpg',
        'category_id' => $category->id
    ]);

});


test('can an authorized user update others articles', function () {
    $role = Role::create(['name' => 'editor']);
    $user = User::factory()->create();
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'update_articles']);
    $role->givePermissionTo($permission);

    $category = Category::factory()->create();

    $article = Article::factory()->create([
        'user_id' => $user->id
    ]);
    $anotherUser = User::factory()->create();
    $body = fake()->paragraph;

    $this->actingAs($anotherUser)
        ->put(route('articles.update', $article->id), [
            'title' => 'Actualizando título',
            'alias' => Str::slug('Actualizando título'),
            'body' => $body,
            'status' => 'draft',
            'image' => 'imagen.jpg',
            'category_id' => $category->id
        ])->assertForbidden();

    // Assert
    $this->assertDatabaseHas('articles', [
        'title' => $article->title,
        'alias' => $article->alias,
        'body' => $article->body,
        'status' => $article->status,
        'image' => $article->image,
        'category_id' => $article->category_id
    ]);

});

