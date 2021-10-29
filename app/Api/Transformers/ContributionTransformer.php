<?php

namespace App\Api\Transformers;

use App\Models\Contribution;
use League\Fractal\TransformerAbstract;

class ContributionTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'getUser'
    ];
    public function transform(Contribution $lesson)
    {
        return [
            'id' => $lesson['id'],
            'amount' => $lesson['amount'],
            'method' => $lesson['method'],
            'comment' => $lesson['comment'],
            'date' => $lesson['created_at'],
            'quantity' => $lesson['quantity'],
        ];
    }

    public function includegetUser(Contribution $object)
    {
        $user = \App\User::select('id', 'name', 'phone', 'email')->findOrFail($object->user_id);
        return $this->item($user, new UserTransformer, FALSE);
    }

}