<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class ErrorResource extends JsonResource
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
            'status' => 'Failed'
        ];

        if (!empty($this->resource['messages'])) {
            $response['messages'] = $this->resource['messages'];
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
            !empty($this->resource['http_code']) ? $this->resource['http_code'] : 400
        );
    }
}
