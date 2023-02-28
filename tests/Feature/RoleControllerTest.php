<?php

use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

it('Can admin user register a role with permissions', function () {
    $this->seed(PermissionSeeder::class);
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $user->assignRole($role);

    // Create a user with the specified role
    $roleData = [
        'name' => 'editor',
        'permission_ids' => [1, 2, 3, 4]

    ];

    $response = $this->actingAs($user)->post(route('roles.store'), $roleData)
        ->assertRedirect(route('roles.create'));
    // Assert that the user was created successfully
    $this->assertDatabaseHas('roles', [
        'name' => 'editor',
    ]);
    $role2 = Role::with('permissions')->whereName('editor')->first();
    $this->assertCount(4, $role2->permissions);
});


it('Can admin user register a role without permissions', function () {
    $this->seed(PermissionSeeder::class);
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $user->assignRole($role);
    // Create a user with the specified role
    $roleData = [
        'name' => 'editor',
        'permission_ids' => []

    ];

    $response = $this->actingAs($user)->post(route('roles.store'), $roleData)
        ->assertRedirect(route('roles.create'));
    // Assert that the user was created successfully
    $this->assertDatabaseHas('roles', [
        'name' => 'editor',
    ]);
});




it('Can non admin user register a role', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);

    // Create a user with the specified role
    $roleData = [
        'name' => 'admin',

    ];

    $response = $this->actingAs($user)->post(route('roles.store'), $roleData)
        ->assertForbidden();
    // Assert that the user was created successfully
    $this->assertDatabaseMissing('roles', [
        'name' => 'admin',
    ]);
});


it('Can admin user see a index page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $user->assignRole($role);

    $response = $this->actingAs($user)->get(route('roles.index'))
        ->assertOk();
});

it('Can non admin user see a index page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);

    $response = $this->actingAs($user)->get(route('roles.index'))
        ->assertForbidden();
});



it('Can non admin user see a edit page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $user->assignRole($role);

    $response = $this->actingAs($user)->get(route('roles.edit', $role->id))
        ->assertOk();
});
