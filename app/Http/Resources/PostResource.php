<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'user' => new UserResource($this->user),
            'avatar' => $this->getFirstMediaUrl(),
            'comments' => PostCommentResource::collection($this->comments),
            'description' => str($this->description)->limit(200),
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}
