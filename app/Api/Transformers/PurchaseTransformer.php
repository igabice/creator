<?php

namespace App\Api\Transformers;

use App\Models\Purchase;
use App\Models\UserObject;
use League\Fractal\TransformerAbstract;

class PurchaseTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
    //    'getUser'
    ];
    public function transform(Purchase $lesson)
    {
        return [
            'id' => $lesson['id'],
            'cost' => $lesson['cost'],
            'item' => $lesson['item'],
            'status' => $lesson['status'],
            'quantity' => $lesson['quantity'],
            'description' => $lesson['description'],
            'date' => $lesson['created_at'],
        ];
    }

    /*public function includegetUser(Purchase $object)
    {
        $user = UserObject::select('id', 'name', 'phone', 'email')->findOrFail($object->user_id);
        return $this->item($user, new UserTransformer, FALSE);
    }*/
    /*public function includegetMonitor(Purchase $object)
    {
        $user = UserObject::select('id', 'name', 'phone', 'email')->findOrFail($object->monitor_id);
        return $this->item($user, new UserTransformer, FALSE);
    }*/

}