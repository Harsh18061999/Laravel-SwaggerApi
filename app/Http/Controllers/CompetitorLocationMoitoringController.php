<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CompetitorLocationMoitoringResource;
use App\Http\Resources\CompetitorLocationMoitoringCollection;
use App\Models\CompetitorLocationMoitoring;

class CompetitorLocationMoitoringController extends Controller
{
    /**
     * @OA\Get(
     *      path="/plan",
     *      operationId="getProjectsList",
     *      tags={"CompetitorLocationMoitoring"},
     *      summary="Get list of CompetitorLocationMoitoring",
     *      description="Returns list of CompetitorLocationMoitoring",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CompetitorLocationMoitoringResource")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */

    public function index(){
        return new CompetitorLocationMoitoringResource(CompetitorLocationMoitoring::paginate(5));
    }
}
