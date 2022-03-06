<?php

namespace App\Models\Virtual;

/**
 * @OA\Schema(
 *     title="CompetitorLocationMoitoring",
 *     description="Project model",
 *     @OA\Xml(
 *         name="CompetitorLocationMoitoring"
 *     )
 * )
 */
class CompetitorLocationMoitoring
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the new product",
     *      example="A nice product"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="source",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $source;

       /**
     * @OA\Property(
     *      title="address",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $address;

       /**
     * @OA\Property(
     *      title="city",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $city;

           /**
     * @OA\Property(
     *      title="state",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $state;

               /**
     * @OA\Property(
     *      title="zipcode",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $zipcode;

                   /**
     * @OA\Property(
     *      title="country",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $country;

                       /**
     * @OA\Property(
     *      title="brand",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $brand;

    
    /**
     * @OA\Property(
     *      title="latitude",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $latitude;

        /**
     * @OA\Property(
     *      title="longitude",
     *      description="Source of the PRODUCT",
     *      example="This is the source link of product"
     * )
     *
     * @var string
     */
    public $longitude;

    

    /**
     * @OA\Property(
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

    /**
     * @OA\Property(
     *      title="Author ID",
     *      description="Author's id of the new project",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $author_id;


    /**
     * @OA\Property(
     *     title="Author",
     *     description="Project author's user model"
     * )
     *
     * @var \App\Virtual\Models\User
     */
    private $author;
}
