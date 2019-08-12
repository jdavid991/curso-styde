<?php

namespace Tests\Feature;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserModuloTest extends TestCase
{
    use RefreshDatabase;
    /** @test*/

    // function testlistado()
    // {
    //     $response = $this->get('/usuario');
    //     $response->assertStatus(200);
    //     $response->assertSee('juan');
    // }
    //  /** @test*/

    // function testmensaje()
    // {
    //     $response = $this->get('/usuario/ .$user->id');
    //     $response->assertStatus(200);
    //     //$response->assertSee('No Hay Registros');
    // }   

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
    function it_creates_a_new_user(){

        $this->withoutExceptionHandling();
        
        $this->post('/usuario/', [
            'name' =>'Jorge Sarmiento',
            'email' =>'jdavids@991gmail.com',
            'password' => '123456'
        ]);
        $this->assertDatabaseHas('users',[  
            'name' =>'Jorge Sarmiento',
            'email' =>'jdavids@991gmail.com',
            'password' => '123456'
        ]);
     }
     function update_user(){

        $user = factory(User::class)->create();

        $this->withoutExceptionHandling();
        
        $this->put('/usuarios/{$user->id}', [
            'name' =>'Jorge Sarmiento',
            'email' =>'jdavids@991gmail.com',
            'password' => '123456'
        ]);
        $this->assertCredentials([  
            'name' =>'Jorge Sarmiento',
            'email' =>'jdavids@991gmail.com',
            'password' => '123456'
        ]);
     }
     function the_name_is_required(){
         //$this->withoutExceptionHandling();
         $this->from('usuarios/nuevo')
            ->post('/usuario/', [
                'name' =>'',
                'email' =>'jdavids@991gmail.com',
                'password' => '123456'
        ])
            ->assertRedirect('usuarios/nuevo')
            ->assertSessionHasErrors(['name' => 'Campo Nombre Obligatorio']);


            $this->assertEquals(0, User::count());

        
     } 
     function the_name_is_required_update(){
        //$this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuario/{$user->id}", [
               'name' =>'',
               'email' =>'jdavids@991gmail.com',
               'password' => '123456'
       ])
           ->assertRedirect("usuarios/{$user->id}/editar")
           ->assertSessionHasErrors(['name']);


            $this->assertDatabaseMissing('users',['email'=>'jdavids@gmail.com']);   
       
    } 
     function the_email_is_required(){
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
           ->post('/usuario/', [
               'name' =>'Jorge',
               'email' =>'',
               'password' => '123456'
       ])
           ->assertRedirect('usuarios/nuevo')
           ->assertSessionHasErrors(['email']);


           $this->assertEquals(0, User::count());  
    }
    function the_email_must_required(){
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
           ->post('/usuario/', [
               'name' =>'Jorge',
               'email' =>'correo-no-valido',
               'password' => '123456'
       ])
           ->assertRedirect('usuarios/nuevo')
           ->assertSessionHasErrors(['email']);


           $this->assertEquals(0, User::count());  
    }
    function the_email_must_unique(){

        factory(User::class)->create([
            'email'=>'jdavids991@gmail.com'
        ]);

        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
           ->post('/usuario/', [
               'name' =>'Jorge',
               'email' =>'davids991@gmail.com',
               'password' => '123456'
       ])
           ->assertRedirect('usuarios/nuevo')
           ->assertSessionHasErrors(['email']);


           $this->assertEquals(1, User::count());  
    }        
    function the_password_is_required(){
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
           ->post('/usuario/', [
               'name' =>'Jorge',
               'email' =>'jdavids991@gmail.com',
               'password' => ''
       ])
           ->assertRedirect('usuarios/nuevo')
           ->assertSessionHasErrors(['password']);


          $this->assertEquals(0, User::count());     
    }      
    function editar()
    {
        $user = factory(User::class)->create();

        $this->get("/usuario/{$user->id}/editar")
        ->assertStatus(200)
        ->assertViewIs('usuarios.edit')
        ->assertSee('Editar Usuario')
        ->assertViewHas('user', function ($ViewUser) use ($user){
            return $ViewUser->id === $user->id;
        });
    }
}
