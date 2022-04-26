<?php

/**
 * @file ResearchTest.php
 *
 * @date 11.11.2021
 *
 */

declare(strict_types=1);

namespace Feature\Api;

//use App\Models\User;
//use Database\Factories\TestFactory\UserTestFactory;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ResearchTest extends TestCase
{
    /*
    use RefreshDatabase;

    private const RESEARCH_INDEX = 'api/research/';
    private const RESEARCH_SHOW = 'api/research/%d';
    private const RESEARCH_CREATE = 'api/statistics/';
    private const RESEARCH_UPDATE = 'api/statistics/%d';
    private const RESEARCH_DELETE = 'api/statistics/%d';

    private const RESEARCH_SHORT_STRUCTURE = [
        'data' => [
            '*' => [
                'id',
                'title',
            ],
        ],
    ];

    private const RESEARCH_STRUCTURE = [
        'data' => [
            'id',
            'title',
            'images' => [
                '*' => [
                    'id',
                    'uuid',
                    'full',
                    'thumb',
                    'comment',
                ],
            ],
            'categories',
        ],
    ];
*/
//    public function testForbiddenAccessToRouteResearch(): void
//    {
//        $doctor = $this->userFactoryCreate(User::DOCTOR);
//
//        Sanctum::actingAs($doctor);
//
//        $response = $this->getJson(self::RESEARCH_INDEX);
//
//        $response->assertStatus(403);
//    }
//
//    public function testGetAllResearchWillResultSuccess(): void
//    {
//    }
//
//    private function userFactoryCreate(int $accountType): User
//    {
//        return UserTestFactory::new()->create(
//            [
//                'account_type' => $accountType,
//            ]
//        );
//    }
}
