<?php

use App\Models\User;

test('user dashboard page is displayed when user is logged in', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('user.dashboard'));

    $response->assertOk();
});

test('user dashboard page is not displayed when user is not logged in', function () {
    $response = $this
        ->get(route('user.dashboard'));

    $response->assertRedirect(route('login'));
});
