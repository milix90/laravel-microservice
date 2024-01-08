<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    /**
     * @test
     * @return void
     */
    public function userSuccessLogin(): void
    {
        $response = $this->post(route("user.login"), [
            "email" => "milad.rg@gmail.com",
            "password" => "pass123",
        ]);

        $res = $response->json();

        dd($res);
        $response->assertStatus(200);
    }

    /**
     * @test
     * @return void
     */
    public function inquireUser(): void
    {
        dd(route("user.inquire"));
        $response = $this->post(route("user.inquire"), [], [
            "token" => "1|KjzTD2bgiU0lttXgyhgD67BxbS4M9dC4c7SLl3ht0c6e764b"
        ]);

        $res = $response->json();

        $response->assertStatus(200);
    }
}
