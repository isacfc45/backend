<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Services\IAuthService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');

        $this->user = User::factory()->create([
            'email' => 'teste@email.com',
            'password' => bcrypt('123456'),
        ]);
    }

    public function testUsuarioDeveSerAutenticandoComSucessoQuandoInformarOsDadosCorretos(): void
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => '123456'
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email'
                ],
                'token'
            ]);

        $response->assertJsonFragment([
            'id' => $this->user->id,
            'email' => $this->user->email,
        ]);
    }

    public function testUsuarioNaoDeveSerAutenticandoComSucessoQuandoInformadoDadosIncorretos(): void
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => '1234567'
        ]);

        $response->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function testDeveRetornarOsDadosDoUsuarioQuandoInformarUmTokenValido(): void
    {
        $token = Auth::login($this->user);

        $response = $this->getJson('/api/auth/me', [
            'Authorization' => 'Bearer ' . $token
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'email'
                ]
            ]);

        $response->assertJsonFragment([
            'id' => $this->user->id,
            'email' => $this->user->email,
        ]);
    }

    public function testNaoDeveRetornarOsDadosDoUsuarioQuandoNaoInformadoOToken(): void
    {
        $response = $this->getJson('/api/auth/me');

        $response->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }

    public function testNaoDeveRetornarOsDadosDoUsuarioQuandoInformadoOTokenInvalido(): void
    {
        $response = $this->getJson('/api/auth/me', [
            'Authorization' => 'Bearer ' . "ivalido"
        ]);

        $response->assertStatus(401)
            ->assertJsonStructure([
                'message'
            ]);
    }
}
