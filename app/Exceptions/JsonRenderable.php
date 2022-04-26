<?php

/**
 * @file JsonRenderable.php
 * MonitoringListResource
 * @date 29.04.2021
 *
 */

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;

/**
 * Interface JsonRenderable
 *
 * Adding ability to render exception as json
 */
interface JsonRenderable
{
    /**
     * Render exception as JsonResponse
     */
    public function renderAsJson(): JsonResponse;
}
