<?php


namespace App\Api\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

    public function transform(User $object)
    {
        return [
            'id' => $object['id'],
            'name' => $object['name'],
            'lastname' => $object['lastname'],
            'address' => $object['address'],
            'phone' => $object['phone'],
            'email' => $object['email'],
            'latitude' => $object['latitude'],
            'longitude' => $object['longitude'],
            'distance' => $object['distance'],

        ];
    }

}