<?php

use App\Models\User;

test('admin dashboard page is not displayed when user is not admin', function () {
    $user = User::factory()->create();

    $response = $this
        ->actingAs($user)
        ->get(route('admin.dashboard'));

    $response->assertRedirect(route('user.dashboard'));
});
