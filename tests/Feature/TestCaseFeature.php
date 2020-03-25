<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Testing\TestCase;
use ReflectionObject;

class TestCaseFeature extends TestCase
{
    protected $header;

    public function createApplication()
    {
        return require __DIR__.'/../../bootstrap/app.php';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $credencials = [
            'token' => 'a67e37e1ad81f984a5e014dd757fb888f25399aea3f80a6e15f4fc8104b7ff43',
            'secret' => '8660bfdfcad4e26d6405d36521798b414c6394d0a4e62a581cdd79fbf6682030',
        ];

        $this->json('POST', '/auth/generate', $credencials);

        $token = json_decode($this->response->getContent(), true)['data']['token'];

        $this->header = [
            'Authorization' => $token,
            'Context' => 'dimi-dev',
        ];
    }

    protected function tearDown(): void
    {
        $refl = new ReflectionObject($this);
        foreach ($refl->getProperties() as $prop) {
            if (!$prop->isStatic() && 0 !== strpos($prop->getDeclaringClass()->getName(), 'PHPUnit_')) {
                $prop->setAccessible(true);
                $prop->setValue($this, null);
            }
        }
        DB::disconnect();
        parent::tearDown();
    }
}
