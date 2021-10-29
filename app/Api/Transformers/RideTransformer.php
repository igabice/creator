<?php

namespace App\Api\Transformers;

use App\Coupon;
use App\Ride;
use App\User;
use League\Fractal\TransformerAbstract;

class RideTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
     //   'getUser', 'getMonitor'
    ];
    public function transform(Ride $lesson)
    {
        return [
            'id' => $lesson['id'],
            'cost' => $lesson['cost'],
            'start_address' => $lesson['start_address'],
            'start_latitude' => $lesson['start_latitude'],
            'start_longitude' => $lesson['start_longitude'],
            'destination_address' => $lesson['destination_address'],
            'destination_latitude' => $lesson['destination_latitude'],
            'destination_longitude' => $lesson['destination_longitude'],
            'stops' => $lesson['stops'],
            'distance' => $lesson['distance'],
            'payment_type' => $lesson['payment_type'],
            'duration' => $lesson['duration'],
            'coupon' => $this->getCoupon($lesson['coupon_id']),
            'driver' => $this->getDriver($lesson['driver_id']),
            'user' => $this->getUser($lesson['user_id']),
            'date' => $lesson['created_at'],
            'updated_at' => $lesson['updated_at'],
        ];
    }


    public function getCoupon($id)
    {
        $coupon = Coupon::find($id);
        return $coupon;
        //findOrFail
    }

    public function geUser($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function getDriver($id)
    {
        $user = User::find($id);
        return $user;
    }


}