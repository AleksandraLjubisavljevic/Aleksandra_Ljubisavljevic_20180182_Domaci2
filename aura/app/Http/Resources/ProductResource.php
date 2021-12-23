<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'product';
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'id'=>$this->resource->id,
        'name'=>$this->resource->name,
        'price'=>$this->resource->price,
        'image'=>$this->resource->image,
       // 'category'=>$this->resource->category,
        'category'=>new CategoryResource($this->resource->category),
        //'distributor'=>$this->resource->distributor,
        'distributor'=>new DistributorResource($this->resource->distributor),
        'user' => new UserResource($this->resource->user)
    ];
    }
}
