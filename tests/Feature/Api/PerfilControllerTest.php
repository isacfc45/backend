<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PerfilControllerTest extends TestCase
{
    private string $token;

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
    public function testDeveRetornarDadosDoUsuarioQueEstaLogado(): void
    {
        $this->token = Auth::login($this->user);

        $response = $this->get('/api/auth/perfil', [
            'Authorization' => 'Bearer ' . $this->token
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'email',
                    'nome_certificado',
                    'cpf',
                    'telefone',
                    'endereco',
                    'cep',
                    'cidade',
                    'estado',
                    'formacao',
                    'instituicao',
                    'area',
                    'subarea',
                    'img_profile',
                ],
            ]);

    }
}
