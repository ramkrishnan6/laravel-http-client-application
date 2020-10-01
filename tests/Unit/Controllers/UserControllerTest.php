<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    private $userController;

    protected function setUp(): void
    {
        parent::setUp();
        $this->userController = new UserController();
    }

    public function testIndexMethod()
    {
        $request = new Request(['page' => 'test-page']);
        $testObject = (object)['testKey' => 'testValue'];
        Http::shouldReceive('get->object')->once()
            ->with('https://reqres.in/api/users?page=test-page')
            ->withNoArgs()
            ->andReturn($testObject);
        $response = $this->userController->index($request);
        $this->assertEquals(['users' => $testObject], $response->getData());
    }
}
