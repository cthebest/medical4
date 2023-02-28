<?php

use App\Models\Category;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

test('A user with permission to create categories can register one of them', function () {
    $editor = Role::create(['name' => 'editor']);
    $createCategories = Permission::create([
        'name' => 'create_categories'
    ]);

    $editor->givePermissionTo($createCategories);
    $user = User::factory()->create();
    $user->assignRole('editor');
    // Iniciar sesión como el administrador
    $this->actingAs($user);

    // Enviar una solicitud de creación de categoría al controlador con los datos de la categoría
    $response = $this->post(route('categories.store'), [
        'name' => 'Test Category',
        'alias' => \Illuminate\Support\Str::slug('Test Category'),
        'description' => 'This is a test category',
    ]);

    // Verificar que la página redirecciones a create
    $response->assertRedirect(route('categories.create'));

    // Verificar que la nueva categoría se haya guardado en la base de datos
    $this->assertDatabaseHas('categories', [
        'name' => 'Test Category',
        'alias' => \Illuminate\Support\Str::slug('Test Category'),
        'description' => 'This is a test category',
    ]);

});

test('Can a user without authorization to create categories register one', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    // Enviar una solicitud de creación de categoría al controlador con los datos de la categoría
    $response = $this->post(route('categories.store'), [
        'name' => 'Test Category',
        'alias' => \Illuminate\Support\Str::slug('Test Category'),
        'description' => 'This is a test category',
    ]);

    $response->assertStatus(403);

    // Verificar que la nueva categoría no se haya guardado en la base de datos
    $this->assertDatabaseMissing('categories', [
        'name' => 'Test Category',
        'alias' => \Illuminate\Support\Str::slug('Test Category'),
        'description' => 'This is a test category',
    ]);
});

test('Can an authorized user update categories', function () {
    $user = User::factory()->create();
    $editor = Role::create(['name' => 'editor']);
    $updateCategories = Permission::create([
        'name' => 'update_categories'
    ]);
    $category = Category::factory()->create();
    $editor->givePermissionTo($updateCategories);
    $user->assignRole($editor);
    $this->actingAs($user)->put(route('categories.update', $category), [
        'name' => 'Test Categories',
        'alias' => \Illuminate\Support\Str::slug('Test Categories'),
        'description' => 'This is a test category test',
    ]);
    // Verificar que la nueva categoría se haya guardado en la base de datos
    $this->assertDatabaseHas('categories', [
        'name' => 'Test Categories',
        'alias' => \Illuminate\Support\Str::slug('Test Categories'),
        'description' => 'This is a test category test',
    ]);
});


test('can an authorized user delete categories', function () {
    $user = User::factory()->create();
    $editor = Role::create(['name' => 'editor']);
    $updateCategories = Permission::create([
        'name' => 'delete_categories'
    ]);
    $category = Category::factory()->create();
    $editor->givePermissionTo($updateCategories);
    $user->assignRole($editor);

    $this->actingAs($user)->delete(route('categories.destroy', $category), [
        'name' => 'Test Categories',
        'alias' => \Illuminate\Support\Str::slug('Test Categories'),
        'description' => 'This is a test category test',
    ]);
    // Verificar que la nueva categoría se haya guardado en la base de datos
    $this->assertDatabaseMissing('categories', ['id' => $category->id]);
});

test('can an unauthorized user delete categories', function () {
    $user = User::factory()->create();
    $editor = Role::create(['name' => 'editor']);

    $category = Category::factory()->create();
    $user->assignRole($editor);


    $response = $this->actingAs($user)->delete(route('categories.destroy', $category), [
        'name' => 'Test Categories',
        'alias' => \Illuminate\Support\Str::slug('Test Categories'),
        'description' => 'This is a test category test',
    ]);

    $response->assertForbidden();
    // Verificar que la categoría aún exista para el usuario que no tiene permisos de eliminación
    $this->assertDatabaseHas('categories', ['id' => $category->id]);
});


