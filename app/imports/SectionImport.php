<?php

namespace App\Imports;


use App\Withdrawal;
use App\User;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class SectionImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Withdrawal|null
     */
    public function model(array $row)
    {
        Session::put('fail', 0);
        Session::put('success', 0);

        $user = Auth::guard('web')->user();
        if($row[0] == 'title' || $row[1] == ''){
            return null;
        }else {
            Session::put('success', Session::get('success')+1);
            request()->session()->flash('message.level', 'success');
            request()->session()->flash('message.content', Session::get('success').' '.request()->section_type.'(s) uploaded successfully.!');

            return new Withdrawal([
                'sub_paragraph' => $row[0],
                'caption' => $row[1],
                'content' => $row[2],
                'law_id' => request()->law_id,
                'section_type' => request()->section_type,
                'section' => request()->section,
                'state_id' => request()->state_id,
               // 'sub_paragraph' => $user->id,
                'created_by' => $user->id,
            ]);

        }
    }
}
