<?php

namespace Tests\Feature\Domains\Auth;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\Feature\TestCaseFeature;

class AuthGenerateControllerTest extends TestCaseFeature
{
    use DatabaseMigrations;

    /**
     * @covers \App\Domains\Auth\Http\Controllers\AuthGenerateController::__construct
     * @covers \App\Domains\Auth\Http\Controllers\AuthGenerateController::process
     * @covers \App\Domains\Auth\Businesses\AuthGenerateBusiness::process
     * @covers \App\Domains\Auth\Businesses\AuthGenerateBusiness::generateToken
     * @covers \App\Domains\Auth\Businesses\AuthGenerateBusiness::getFromToken
     */
    public function testAuthenticate()
    {
        $body = [
            'token' => 'a67e37e1ad81f984a5e014dd757fb888f25399aea3f80a6e15f4fc8104b7ff43',
            'secret' => '8660bfdfcad4e26d6405d36521798b414c6394d0a4e62a581cdd79fbf6682030',
        ];

        $this->json('POST', '/auth/generate', $body);

        $response = json_decode($this->response->getContent(), true);

        $this->assertEquals(200, $this->response->getStatusCode());
        $this->assertNotNull($response['data']['token']);
        $this->assertNotNull($response['data']['valid_until']);
    }

    /**
     * @covers \App\Domains\Auth\Http\Controllers\AuthGenerateController::__construct
     * @covers \App\Domains\Auth\Http\Controllers\AuthGenerateController::process
     * @covers \App\Domains\Auth\Businesses\AuthGenerateBusiness::process
     * @covers \App\Domains\Auth\Businesses\AuthGenerateBusiness::generateToken
     * @covers \App\Domains\Auth\Businesses\AuthGenerateBusiness::getFromToken
     */
    public function testAuthenticateInvalidCredencials()
    {
        config(['tokens.data' => null]);

        $body = [
            'token' => 'c50683082e1c741e81aba9246e63095e2e5a19b7ea296f3dcb06f557b9f626e8',
            'secret' => '5c6eec9722d3e008afb301d3d6b18bf3ef2008230910f995b590d322635b8adc',
        ];

        $this->json('POST', '/auth/generate', $body);

        $response = json_decode($this->response->getContent(), true);

        $this->assertEquals(401, $this->response->getStatusCode());
        $this->assertEquals('Invalid credentials', $response['message']);
    }
}
