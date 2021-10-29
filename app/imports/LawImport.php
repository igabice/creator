<?php

namespace App\Imports;


use App\Post;
use App\User;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class LawImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Post|null
     */
    public function model(array $row)
    {
        Session::put('fail', 0);
        Session::put('success', 0);

        $user = Auth::guard('web')->user();
        if($row[0] == 'title' || $row[1] == ''){
            return null;
        }else {
            //'long_title', 'title', 'date_published', 'citation', 'enactment', 'state_id',
            return new Post([
                'title' => $row[0],
                'long_title' => $row[1],
                'date_published' => $row[2],
                'citation' => $row[3],
                'enactment' => $row[4],
                'state_id' => request()->state_id,
                'created_by' => $user->id,
            ]);

        }
    }
}
