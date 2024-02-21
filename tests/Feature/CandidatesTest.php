<?php

namespace Tests\Feature;

use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\CreatesApplication;
use Tests\TestCase;

class CandidatesTest extends TestCase
{
    protected $seed = true;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->postJson(route('candidates.store'),[
            'name'=>fake()->name(),
            'email'=>fake()->email(),
            'phone'=>'087851368915',
            'year'=>'2001',
            'job'=>1,
            'skills'=>[1,2]
        ]);

        $response->assertStatus(201);
    }
}
