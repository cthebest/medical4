<?php

use App\Models\Faq;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

test('can_create_a_new_faq', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'create_faq']);
    $role->givePermissionTo($permission);

    $data = [
        'question' => $this->faker->sentence,
        'answer' => $this->faker->paragraph,
    ];

    $response = $this->actingAs($user)->post(route('faqs.store'), $data);

    $response->assertStatus(302)
        ->assertRedirect(route('faqs.create'));

    $this->assertDatabaseHas('faqs', $data);
});


test('can_guest_user_create_a_new_faq', function () {


    $data = [
        'question' => $this->faker->sentence,
        'answer' => $this->faker->paragraph,
    ];

    $response = $this->post(route('faqs.store'), $data);

    $response->assertStatus(302)
        ->assertRedirect(route('login'));

    $this->assertDatabaseMissing('faqs', $data);
});


test('can_unauthorized_user_create_a_new_faq', function () {

    $user = User::factory()->create();

    $data = [
        'question' => $this->faker->sentence,
        'answer' => $this->faker->paragraph,
    ];

    $this->actingAs($user)->post(route('faqs.store'), $data);

    $this->assertDatabaseMissing('faqs', $data);
});

test('can_autorized_users_update_a_faq', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'update_faq']);
    $role->givePermissionTo($permission);

    $data = [
        'question' => $this->faker->sentence,
        'answer' => $this->faker->paragraph,
    ];
    $faq = Faq::create($data);

    $data = [
        'id' => $faq->id,
        'question' => $this->faker->sentence,
        'answer' => $this->faker->paragraph,
    ];
    $response = $this->actingAs($user)->put(route('faqs.update', ['faq' => $faq->id]), $data);

    $response->assertStatus(302);
    $this->assertDatabaseHas('faqs', $data);
});


test('can_autorized_users_delete_a_faq', function () {
    $user = User::factory()->create();
    $role = Role::create(['name' => 'editor']);
    $user->assignRole($role);
    $permission = Permission::create(['name' => 'delete_faq']);
    $role->givePermissionTo($permission);

    $data = [
        'question' => $this->faker->sentence,
        'answer' => $this->faker->paragraph,
    ];
    $faq = Faq::create($data);


    $response = $this->actingAs($user)->delete(route('faqs.destroy', ['faq' => $faq->id]));

    $this->assertDatabaseMissing('faqs', [
        'id' => $faq->id,
    ]);
});
