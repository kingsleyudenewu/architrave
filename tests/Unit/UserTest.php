<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /** @test */
    public function auth_user_can_view_asset()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => $this->headers['Authorization']
        ])->json('GET', route('assets.index'));
        $response->assertJsonFragment([
            'message' => 'success'
        ]);
    }

    /** @test */
    public function unauthenticated_user_cannot_view_asset()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'application/json'
        ])->json('GET', route('assets.index'));
        $response->assertJsonFragment([
            'message' => 'Unauthenticated.'
        ]);
    }


}
