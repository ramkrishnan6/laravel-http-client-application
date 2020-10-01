<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private $userController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userController = new UserController();
    }

    public function testIndex()
    {
        $request = new Request(['page' => 'test-page']);
        $testObject = (object)['testKey' => 'testValue'];
        Http::shouldReceive('get->object')->once()
            ->with('https://reqres.in/api/users?page=test-page')
            ->withNoArgs()
            ->andReturn($testObject);
        $response = $this->userController->index($request);
        $this->assertEquals(['users' => $testObject], $response->getData());
        $this->assertEquals('users.index', $response->getName());
        $this->assertInstanceOf(View::class, $response);
    }

    public function testCreate()
    {
        $response = $this->userController->create();
        $this->assertEquals('users.create', $response->getName());
        $this->assertInstanceOf(View::class, $response);
    }
}
