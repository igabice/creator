<?php

namespace App\Http\Controllers;

use App\Law;
use App\Withdrawal;

use App\State;
//use Barryvdh\DomPDF\PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use File;

class LawsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except([]);
    }

    public function index(){
        $user = Auth::user();
        $data=Law::all();
        $states = State::all();

        return view('laws.list', compact('data', 'states'));
    }

    public function show($id)
    {
        $data = Law::find($id);
        $sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'section')->get();

        return view('laws.show', ['data' => $data,  'sections' => $sections]);
    }


    public function printLawPDF($id)
    {
        $data = Law::find($id);
        $file= public_path(). $data->pdf;
        $file_name = 'law' .  '-' . now()->toDateString() . '.pdf';

        $headers = array(
            'Content-Type: application/pdf',
        );

        return response()->download($file, $file_name, $headers);
        return response()->download(url('/').$data->pdf);
        $sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'section')->get();
        $sub_sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'sub-section')->get();
        $paragraphs = Withdrawal::where('law_id', $data->id)->where('section_type', 'sub-paragraph')->get();
        //assign paragraphs to sub-sections
        foreach ($sub_sections as $sub_section){
            $arrParagraph = [];
            foreach ($paragraphs as $paragraph){
                if($paragraph->section == $sub_section->id){
                    $arrParagraph[] = $paragraph;
                }
                $sub_section->paragraphs = $arrParagraph;
            }
        }
        //assign sub-sections to sections
        foreach ($sections as $section){
            $arrSubSection = [];
            foreach ($sub_sections as $sub_section){
                if($sub_section->section == $section->id){
                    $arrSubSection[] = $sub_section;
                }
                $section->sub_sections = $arrSubSection;
            }
        }

        $data->sections = $sections;
        $arr['data'] = $data;
        //return view('laws.pdf', ['data' => $data,  'sections' => $sections]);
        //return $arr;
        $pdf = PDF::loadView('laws.pdf', $arr);
        return $pdf->download('law.pdf');
    }

    public function printLawWord($id)
    {
        $data = Law::find($id);
        $file= public_path(). $data->word;
        $file_name = 'law' .  '-' . now()->toDateString() . '.doc';

        $headers = array(
            'Content-Type:  application/vnd.ms-word'
        );

        return response()->download($file, $file_name, $headers);

        return response()->download(url('/').$data->word);

        $sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'section')->get();
        $sub_sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'sub-section')->get();
        $paragraphs = Withdrawal::where('law_id', $data->id)->where('section_type', 'sub-paragraph')->get();
        //assign paragraphs to sub-sections
        foreach ($sub_sections as $sub_section){
            $arrParagraph = [];
            foreach ($paragraphs as $paragraph){
                if($paragraph->section == $sub_section->id){
                    $arrParagraph[] = $paragraph;
                }
                $sub_section->paragraphs = $arrParagraph;
            }
        }
        //assign sub-sections to sections
        foreach ($sections as $section){
            $arrSubSection = [];
            foreach ($sub_sections as $sub_section){
                if($sub_section->section == $section->id){
                    $arrSubSection[] = $sub_section;
                }
                $section->sub_sections = $arrSubSection;
            }
        }

        $data->sections = $sections;
        $arr['data'] = $data;
        //return view('laws.pdf', ['data' => $data,  'sections' => $sections]);
        //return $arr;
        //$pdf = PDF::loadView('laws.pdf', $arr);
        //return $pdf->download('law.pdf');
//
//        $phpWord = new \PhpOffice\PhpWord\PhpWord();
//
//        /* Note: any element you append to a document must reside inside of a Withdrawal. */
//
//        // Adding an empty Withdrawal to the document...
//        $section = $phpWord->addSection();
        $file_name = 'law' .  '-' . now()->toDateString() . '.doc';

        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=".$file_name.".doc");
        header("Pragma: no-cache"); header("Expires: 0");


        return view('laws.pdf', $arr);
        $section->addText($view_content);

// Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');


        $objWriter->save(public_path($file_name));
    }

    public function printLawJSON($id)
    {
        $data = Law::find($id);
        $file= public_path(). $data->json;
        $file_name = 'law' .  '-' . now()->toDateString() . '.json';

        $headers = array(
            'Content-Type:  application/json'
        );

        return response()->download($file, $file_name, $headers);

        return response()->download(url('/').$data->json);

        $sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'section')->get();
        $sub_sections = Withdrawal::where('law_id', $data->id)->where('section_type', 'sub-section')->get();
        $paragraphs = Withdrawal::where('law_id', $data->id)->where('section_type', 'sub-paragraph')->get();
        //assign paragraphs to sub-sections
        foreach ($sub_sections as $sub_section){
            $arrParagraph = [];
            foreach ($paragraphs as $paragraph){
                if($paragraph->section == $sub_section->id){
                    $arrParagraph[] = $paragraph;
                }
                $sub_section->paragraphs = $arrParagraph;
            }
        }
        //assign sub-sections to sections
        foreach ($sections as $section){
            $arrSubSection = [];
            foreach ($sub_sections as $sub_section){
                if($sub_section->section == $section->id){
                    $arrSubSection[] = $sub_section;
                }
                $section->sub_sections = $arrSubSection;
            }
        }

        $data->sections = $sections;
        $arr['data'] = $data;
        //return view('laws.pdf', ['data' => $data,  'sections' => $sections]);
        //return $arr;
        //$pdf = PDF::loadView('laws.pdf', $arr);
        //return $pdf->download('law.pdf');

        $file = time() . '_file.json';
        $destinationPath=public_path()."/upload/json/";
        if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
        File::put($destinationPath.$file, json_encode($arr));
        return response()->download($destinationPath.$file);
    }

    public function createform()
    {
        $state = collect();
        $user = Auth::user();
        if($user->role == 'admin'){
            $state = State::all();
        }
        return view('laws.create', ['title'=>'Create Law', 'state'=> $state, 'user'=> $user]);
    }
    public function edit($id)
    {
        $data= Law::find($id);
        return view('laws.edit', ['data'=>$data,]);
    }

    function store(Request $request){

        $arrRules = array(
            'long_title' => ['required'],
            'title' => ['required'],
            'date_published' => ['required'],
           // 'citation' => ['required'],
           // 'enactment' => ['required'],
            'state_id' => ['required'],
            'created_by' => ['required'],
        );

        $objRequest = $request->all();

        $this->validate(request(), $arrRules);

        if ($request->hasFile('word')) {
            $fileName = null;
            $file = $request->file('word');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/word/'. $pathmeter_correct, $fileName);
            $objRequest['word'] = "/uploads/word/".$fileName;
        }
        if ($request->hasFile('pdf')) {
            $fileName = null;
            $file = $request->file('pdf');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/pdf/'. $pathmeter_correct, $fileName);
            $objRequest['pdf'] = "/uploads/pdf/".$fileName;
        }
        if ($request->hasFile('json')) {
            $fileName = null;
            $file = $request->file('json');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/json/'. $pathmeter_correct, $fileName);
            $objRequest['json'] = "/uploads/json/".$fileName;
        }
        if ($request->hasFile('short_word')) {
            $fileName = null;
            $file = $request->file('short_word');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/short_word/'. $pathmeter_correct, $fileName);
            $objRequest['short_word'] = "/uploads/short_word/".$fileName;
        }

        $law = Law::create($objRequest);
        $msg='Law created successfully.';
        return redirect()->to('/laws/'.$law->id)->with('success', $msg);

    }

//    public function load_data(Datatables $datatables, $id = 0) {
//        $items = Law::leftjoin('departments', 'Laws.department_id', '=', 'departments.id')
//            ->leftjoin('stores', 'Laws.store_id', '=', 'stores.id')
//            ->leftjoin('Law_types', 'Laws.Law_type', '=', 'Law_types.id')
//            ->leftjoin('store_levels', 'Laws.role_level', '=', 'store_levels.id')
//            ->leftjoin('status', 'Laws.status', '=', 'status.id')
//            ->select(['Laws.*', 'departments.name as department_name', 'stores.name as store_name', 'Law_types.name as Law_name','store_levels.name as role_name', 'status.name as status_name'])
//            ->where("Laws.status",'!=',2);
//
//        return $datatables->eloquent($items)
//            ->addColumn('action', function ($data) {
//                if($data->id==auth()->Law()->id)return '';
//                else
//                    return '<a class="delete btn-delete" data-remote="' . route('Law_delete', ['id' => $data->id]) . '"><i class="dripicons-trash del"></i></a>
//                                    <a href="' . route('Law_edit', $data->id) . '" class="edit"><i class="ti-pencil-alt"></i></a>';
//            })
//            ->rawColumns(['id', 'status', 'action'])
//            ->make(true);
//    }

    public function update(Request $request){
        $arrData = Law::find($request->id);
        $arrRules = array(
            'long_title' => ['required'],
            'title' => ['required'],
            'date_published' => ['required'],
//            'citation' => ['required'],
//            'enactment' => ['required'],
        );

        $objRequest = $request->all();
        $this->validate(request(), $arrRules);

        if ($request->hasFile('word')) {
            $fileName = null;
            $file = $request->file('word');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/word/'. $pathmeter_correct, $fileName);
            $objRequest['word'] = "/uploads/word/".$fileName;
        }
        if ($request->hasFile('pdf')) {
            $fileName = null;
            $file = $request->file('pdf');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/pdf/'. $pathmeter_correct, $fileName);
            $objRequest['pdf'] = "/uploads/pdf/".$fileName;
        }
        if ($request->hasFile('json')) {
            $fileName = null;
            $file = $request->file('json');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/json/'. $pathmeter_correct, $fileName);
            $objRequest['json'] = "/uploads/json/".$fileName;
        }
        if ($request->hasFile('short_word')) {
            $fileName = null;
            $file = $request->file('short_word');
            $fileName = time().$file->getClientOriginalName();
            $pathmeter_correct =  date('Y').'/'. date('m').'/'. date('d').'/';
            $fileName = $pathmeter_correct.$fileName;
            $file->move('./uploads/short_word/'. $pathmeter_correct, $fileName);
            $objRequest['short_word'] = "/uploads/short_word/".$fileName;
        }

        //return $objRequest;

        $arrData->update($objRequest);
        $msg='Law updated successfully.';

        return redirect()->to('/laws')->with('success', $msg);
    }

}
