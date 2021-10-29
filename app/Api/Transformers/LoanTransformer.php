<?php

namespace App\Api\Transformers;

use App\Models\Loan;
use App\User;
use League\Fractal\TransformerAbstract;

class LoanTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
     //   'getUser', 'getMonitor'
    ];
    public function transform(Loan $lesson)
    {
        return [
            'id' => $lesson['id'],
            'amount' => $lesson['amount'],
            'status' => $lesson['status'],
            'comment' => $lesson['comment'],
            'date' => $lesson['created_at'],
            'updated_at' => $lesson['updated_at'],
        ];
    }

    /*public function includegetUser(Loan $object)
    {
        $user = User::select('id', 'name', 'phone', 'email')->findOrFail($object->user_id);
        return $this->item($user, new UserTransformer, FALSE);
    }
    public function includegetMonitor(Loan $object)
    {
        $user = User::select('id', 'name', 'phone', 'email')->findOrFail($object->monitor_id);
        return $this->item($user, new UserTransformer, FALSE);
    }*/

}