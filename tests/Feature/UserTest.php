<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    function testRegisterSuccess()
    {
        $this->post("/api/users", [
            "username" => "fredik",
            "password" => "rahasia",
            "name"      => "Fredik Stefan"
        ])->assertStatus(201)
            ->assertJson([
                "data" => [
                    "username" => "fredik",
                    "name"      => "Fredik Stefan"
                ]
            ]);
    }


    function testRegisterFailed()
    {
        $this->post("/api/users", [
            "username" => "",
            "password" => "",
            "name"      => ""
        ])->assertStatus(400)
            ->assertJson([
                'errors' => [
                    'username' => ['The username field is required.'],
                    'password' => ['The password field is required.'],
                    'name'  => ['The name field is required.']
                ]
            ]);
    }

    function testRegisterUsernameAlreadyExist()
    {
        $this->testRegisterSuccess();
        $this->post("/api/users", [
            "username" => "fredik",
            "password" => "rahasia",
            "name"      => "Fredik Stefan"
        ])->assertStatus(400)
            ->assertJson([
                "errors" => [
                    "username" => ["username already registered"],
                ]
            ]);
    }
}
