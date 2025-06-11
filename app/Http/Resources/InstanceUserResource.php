<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\InstancePostResource;
use Illuminate\Http\Resources\Json\JsonResource;

/*
 * @OA\Schema(
 *     schema="InstanceUserResource",
 *     type="object",
 *     @OA\Property(property="id", type="integer"),
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="email", type="string"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time"),
 * )
 */

class InstanceUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'posts' => $this->posts,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
