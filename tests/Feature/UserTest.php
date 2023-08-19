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
            "username" => "Fredik Stefan",
            "password" => "rahasia",
            "name"      => "Fredik Stefan"
        ])->assertStatus(201);
    }


    function testRegisterFailed()
    {
    }

    function testRegisterUsernameAlreadyExist()
    {
    }
}
