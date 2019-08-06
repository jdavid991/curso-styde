<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuloTest extends TestCase
{
    /** @test*/

    function testlistado()
    {
        $response = $this->get('/usuario');
        $response->assertStatus(200);
        $response->assertSee('juan');
    }
     /** @test*/

    function testmensaje()
    {
        $response = $this->get('/usuario/ .$user->id');
        $response->assertStatus(200);
        $response->assertSee('No Hay Registros');
    }   

    /** @test */
    function it_loads_the_users_details_page()
    {
        $response = $this->get('/usuario/5');
        $response->assertStatus(200);
    }
    function create()
    {
        $response = $this->get('/usuario/nuevo');
        $response->assertStatus(200);
    }
}
