<?php

namespace App\Models\Resources;

/**
 * @OA\Schema(
 *     title="CompetitorLocationMoitoringResource",
 *     description="Project resource",
 *     @OA\Xml(
 *         name="CompetitorLocationMoitoringResource"
 *     )
 * )
 */
class CompetitorLocationMoitoringResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Models\Virtual\CompetitorLocationMoitoring[]
     */
    private $data;
}
