<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkillTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_get_all(): void
    {
        $response = $this->get(route('skills.index'));

        $response->assertStatus(200);
    }
}
