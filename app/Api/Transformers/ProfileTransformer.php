<?php


namespace App\Api\Transformers;



use App\Models\Profile;
use League\Fractal\TransformerAbstract;

class ProfileTransformer extends TransformerAbstract
{
    public function transform(Profile $object)
    {
        return [
            'id' => $object['id'],
            'name' => $object['name'],
            'email' => $object['email'],
            'phone' => $object['phone'],
            //'is_free' => (boolean)$lesson['free']
        ];
    }
}