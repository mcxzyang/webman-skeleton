<?php

namespace extend\Illuminate\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class ApiPaginator extends LengthAwarePaginator
{
    public function toArray()
    {
        return [
            'data' => $this->items->toArray(),
            'total' => $this->total()
        ];
    }
}
