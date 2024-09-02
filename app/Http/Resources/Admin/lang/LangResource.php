<?php

namespace App\Http\Resources\Admin\lang;

use Illuminate\Http\Resources\Json\JsonResource;


class LangResource extends JsonResource
{

    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'flag' => $this->flag,
            'direction' => $this->direction,
            'sort' => $this->sort,
            'active' => $this->active,

        ];
    }
}
