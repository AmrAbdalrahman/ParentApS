<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $statusCode = [
            '1' => 'authorised', '2' => 'decline', '3' => 'refunded',
            '100' => 'authorised', '200' => 'decline', '300' => 'refunded'
        ];
        return [
            'parentAmount' => $this->parentAmount ?? null,
            'Currency' => $this->Currency ?? null,
            'parentEmail' => $this->parentEmail ?? null,
            'statusCode' => isset($this->statusCode) ? $statusCode[$this->statusCode] : null,
            'registerationDate' => $this->registerationDate ?? null,
            'parentIdentification' => $this->parentIdentification ?? null,
            'balance' => $this->balance ?? null,
            'currency' => $this->currency ?? null,
            'email' => $this->email ?? null,
            'status' => isset($this->status) ? $statusCode[$this->status] : null,
            'created_at' => $this->created_at ?? null,
            'id' => $this->id ?? null,
        ];
    }
}
