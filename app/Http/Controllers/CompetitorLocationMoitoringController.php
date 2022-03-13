<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\CompetitorLocationMoitoringResource;
use App\Http\Resources\CompetitorLocationMoitoringCollection;
use App\Models\CompetitorLocationMoitoring;

class CompetitorLocationMoitoringController extends Controller
{
    /**
     * @OA\POST(
     *      path="/plan",
     *      operationId="getProjectsList",
     *      tags={"CompetitorLocationMoitoring"},
     *      summary="Get list of CompetitorLocationMoitoring",
     *      description="Returns list of CompetitorLocationMoitoring",
     *      @OA\RequestBody(
    *       @OA\JsonContent(),
    *          required=false,
    *          @OA\MediaType(
    *                mediaType="multipart/form-data",
    *               @OA\Schema(
    *                   type="object",
    *                   
    *                   @OA\Property(property="zipcode", type="text"),
    *                   @OA\Property(property="source", type="text"),
    *                   @OA\Property(property="name", type="text"),
    *                   @OA\Property(property="address", type="text"),
    *                   @OA\Property(property="city", type="text"),
    *                   @OA\Property(property="country", type="text"),
    *                   @OA\Property(property="brand", type="text"),
    *               ),
    *           ),
     *      ),
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

    public function index(Request $request){
        // print_r($request->zipcode);die;
        $data = new CompetitorLocationMoitoring;
        if($request->zipcode){
            $data = $data->where('zipcode',$request->zipcode);
        }
        if($request->source){
            $data = $data->where('source',"like","%".$request->source."%");
        }
        if($request->name){
            $data = $data->where('name',"like","%".$request->name."%");
        }
        if($request->address){
            $data = $data->where('address',"like","%".$request->address."%");
        }
        if($request->city){
            $data = $data->where('city',"like","%".$request->city."%");
        }
        if($request->state){
            $data = $data->where('state',"like","%".$request->state."%");
        }
        if($request->country){
            $data = $data->where('country',"like","%".$request->country."%");
        }
        if($request->brand){
            $data = $data->where('brand',"like","%".$request->brand."%");
        }
        
        return new CompetitorLocationMoitoringResource($data->paginate(5));
    }
}
