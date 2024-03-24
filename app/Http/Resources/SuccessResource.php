<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class SuccessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     *
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        $response = [
            'status' => 'Success',
        ];

        if (!empty($this->resource['data'])) {
            $response['data'] = $this->resource['data'];
        }

        return $response;
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Response  $response
     */
    public function withResponse($request, $response) : void
    {
        $response->setStatusCode(
            !empty($this->resource['http_code']) ? $this->resource['http_code'] : 200
        );
    }
}
