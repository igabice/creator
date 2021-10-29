<?php

namespace App\Api\Transformers;

use App\Models\Wallet;
use App\User;
use League\Fractal\TransformerAbstract;

class WalletTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'getUser'
    ];
    public function transform(Wallet $lesson)
    {
        return [
            'id' => $lesson['id'],
            'amount' => $lesson['amount'],
            'status' => $lesson['status'],
            'updated_at' => $lesson['updated_at'],
            'date' => $lesson['created_at'],
        ];
    }

    public function includegetUser(Wallet $object)
    {
        $user = User::select('id', 'name', 'phone', 'email')->findOrFail($object->user_id);
        return $this->item($user, new UserTransformer, FALSE);
    }

}