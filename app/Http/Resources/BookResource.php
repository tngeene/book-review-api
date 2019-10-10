<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //trandsforms the resource into an array made up of the attributes to be converted to JSON
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'author' => $this->author,
            'description'=>$this->description,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            //'user' => $this->user,
            //'ratings' => $this->ratings,
            //'average_rating' => $this->ratings->avg('rating')
        ];

    }
}
