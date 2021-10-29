<?php

namespace App\Http\Controllers;


use App\Imports\LawImport;
use App\Imports\SectionImport;
use App\Post;
use App\State;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function uploadLaw(Request $request)
    {
        $this->validate($request, [
            'state_id' => 'required',
            'upload_file' => 'required',
        ]);
        $user = Auth::guard('web')->user();
        $state = State::find($request->state_id);

        $file = $request->file('upload_file');
        if (file_exists($file)) {
            $path = $file->getRealPath();
            $fileName = $file->getClientOriginalName();
            $pathname = $state->name . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
            $fileName = "laws-" . time() . "-" . $fileName;
            $file->move('./uploads/laws/' . $pathname, $fileName);
            Excel::import(new LawImport, './uploads/laws/' . $pathname.$fileName);
        }
        return redirect()->to('/laws');
    }
    public function importSection(Request $request)
    {
        $this->validate($request, [
            'section_type' => 'required',
            'upload_file' => 'required',
        ]);
        $user = Auth::guard('web')->user();
        $law = Post::find($request->law_id);
        $state = State::find($law->state_id);

        $file = $request->file('upload_file');
        if (file_exists($file)) {
            $path = $file->getRealPath();
            $fileName = $file->getClientOriginalName();
            $pathname = $state->name . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/';
            $fileName = "laws-" . time() . "-" . $fileName;
            $file->move('./uploads/sections/' . $pathname, $fileName);
            Excel::import(new SectionImport, './uploads/sections/' . $pathname.$fileName);
        }
        if($request->section_type == 'sub-section'){
            return redirect()->to('/laws/'.$request->law_id);
        }
        return redirect()->to('/sections/'.$request->section);
    }

}