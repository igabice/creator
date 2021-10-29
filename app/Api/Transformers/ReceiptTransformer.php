<?php

namespace App\Api\Transformers;

use App\Models\Receipt;
use App\User;
use League\Fractal\TransformerAbstract;

class ReceiptTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
     //   'getUser', 'getMonitor'
    ];
    public function transform(Receipt $lesson)
    {
        return [
            'id' => $lesson['id'],
            'amount' => $lesson['amount'],
            'status' => $lesson['status'],
            'comment' => $lesson['comment'],
            'image' => $lesson['image'],
            'date' => $lesson['created_at'],
            'updated_at' => $lesson['updated_at'],
        ];
    }

    /*public function includegetUser(Receipt $object)
    {
        $user = User::select('id', 'name', 'phone', 'email')->findOrFail($object->user_id);
        return $this->item($user, new UserTransformer, FALSE);
    }
    public function includegetMonitor(Receipt $object)
    {
        $user = User::select('id', 'name', 'phone', 'email')->findOrFail($object->monitor_id);
        return $this->item($user, new UserTransformer, FALSE);
    }*/

}