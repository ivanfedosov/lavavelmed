<?php

/**
 * @file CategoryTest.php
 *
 * @date 11.11.2021
 *
 */

declare(strict_types=1);

namespace Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    private const STATISTICS_CREATE = 'api/research/category/%d';
    private const STATISTICS_UPDATE = 'api/research/category/%d';
    private const STATISTICS_DELETE = 'api/statistics/category/%d';
}
