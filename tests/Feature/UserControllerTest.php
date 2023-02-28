<?php

use App\Models\User;
use Spatie\Permission\Models\Role;

it('Can admin user register a user', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $role2 = Role::create(['name' => 'editor']);
    $user->assignRole($role);

    // Create a user with the specified role
    $userData = [
        'name' => 'Jorge',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
        'role_id' => $role2->id,
    ];

    $response = $this->actingAs($user)->post(route('register.store'), $userData);
    // Assert that the user was created successfully
    $this->assertDatabaseHas('users', [
        'name' => $userData['name'],
        'email' => $userData['email'],
    ]);
});


it('Can non admin user register a user', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $role2 = Role::create(['name' => 'admin']);
    $user->assignRole($role);

    // Create a user with the specified role
    $userData = [
        'name' => 'Jorge',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
        'role_id' => $role2->id,
    ];

    $response = $this->actingAs($user)->post(route('register.store'), $userData)->assertForbidden();
    // Assert that the user was created successfully
    $this->assertDatabaseMissing('users', [
        'name' => $userData['name'],
        'email' => $userData['email'],
    ]);
});


it('Can admin user see user index page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $user->assignRole($role);



    $response = $this->actingAs($user)->get(route('users.index'))->assertOk();
});


it('Can non admin user see user index page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);
    $response = $this->actingAs($user)->get(route('users.index'))->assertForbidden();
});


it('Can admin user see user edit page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $user->assignRole($role);

    // Create a user with the specified role
    $userData = [
        'name' => 'Jorge',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
        'role_id' => $role->id,
    ];

    $user2 = User::create($userData);

    $response = $this->actingAs($user)->get(route('users.edit', $user2->id))->assertOk();
});

it('Can non admin user see user edit page', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);

    // Create a user with the specified role
    $userData = [
        'name' => 'Jorge',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
        'role_id' => $role->id,
    ];

    $user2 = User::create($userData);

    $response = $this->actingAs($user)->get(route('users.edit', $user2->id))->assertForbidden();
});

it('Can admin user see user update users', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'admin']);
    $role2 = Role::create(['name' => 'editor']);
    $user->assignRole($role);

    // Create a user with the specified role
    $userData = [
        'name' => 'Jorge',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com'
    ];

    $user2 = User::create($userData);

    $this->actingAs($user)->put(route('users.update', $user2->id), [
        'name' => 'Jorge mendez',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
        'role_id' => $role2->id,
    ])->assertRedirect(route('users.edit', $user2->id));

    // Assert that the user was created successfully
    $this->assertDatabaseHas('users', [
        'name' => 'Jorge mendez',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
    ]);

    $user = User::with('roles')->find($user2->id);

    $this->assertEquals($role2->id, $user->roles->first()->id);
});



it('Can non admin user see user update users', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $role2 = Role::create(['name' => 'admin']);
    $user->assignRole($role);

    // Create a user with the specified role
    $userData = [
        'name' => 'Jorge',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com'
    ];

    $user2 = User::create($userData);

    $this->actingAs($user)->put(route('users.update', $user2->id), [
        'name' => 'Jorge mendez',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
        'role_id' => $role2->id,
    ])->assertForbidden();

    // Assert that the user was created successfully
    $this->assertDatabaseMissing('users', [
        'name' => 'Jorge mendez',
        'email' => 'jorge@mail.com',
        'password' => 'jorge@mail.com',
    ]);

    $user = User::with('roles')->find($user2->id);

    $this->assertNull($user->roles->first());
});
