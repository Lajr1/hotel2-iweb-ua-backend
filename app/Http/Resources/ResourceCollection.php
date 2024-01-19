<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection as LaravelResourceCollection;

class ResourceCollection extends LaravelResourceCollection
{

    private $resourceClassName;

    public function __construct($parameter, $resourceClassName)
    {
        parent::__construct($parameter);

        if (is_subclass_of($resourceClassName, JsonResource::class)) {
            $this->resourceClassName = $resourceClassName;
        }
    }
    public function toArray($request)
    {
        return [
            'data' => empty($this->resourceClassName) ? $this->collection : $this->resourceClassName::collection($this->collection),
        ];
    }
}
