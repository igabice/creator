<?php

namespace App\Api\Transformers;

use App\Models\InventoryItem;
use League\Fractal\TransformerAbstract;

class ItemTransformer extends TransformerAbstract
{
    public function transform(InventoryItem $lesson)
    {
        return [
            'id' => $lesson['id'],
            'name' => $lesson['item_name']
        ];
    }

}