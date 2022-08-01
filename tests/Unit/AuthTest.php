<?php

namespace Tests\Unit;

use App\ZealPay\Repositories\Eloquent\UserEloquentRepository;
use App\ZealPay\Services\Auth\Login;
use App\ZealPay\Services\Auth\Register;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_register()
    {
        $user = (new Register)->store(new UserEloquentRepository(), ['name' => 'ahmed']);
        self::assertInstanceOf(Model::class, $user);
        self::assertEquals('ahmed', $user->name);
    }

    public function test_login()
    {
        $user = (new Register)->store(new UserEloquentRepository(), ['name' => 'ahmed']);
        self::assertInstanceOf(Model::class, $user);
        self::assertEquals('ahmed', $user->name);
        $loginUser = (new Login())->attempt(new UserEloquentRepository(), ['username' => 'ahmed']);
        self::assertInstanceOf(Model::class, $loginUser);
        self::assertEquals('ahmed', $loginUser->name);
        $token = $loginUser->createToken('auth')->plainTextToken;
        self::assertIsString($token);
    }
}
