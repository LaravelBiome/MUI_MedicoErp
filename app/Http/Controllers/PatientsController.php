<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\User ;
use App\PatientDetails;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;




class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $posts = DB::table('patient_lists')->where('user_id' , $user_id)->orderBy('updated_at' , 'desc')->Paginate(10);
        $data = [
        'posts' => $posts,
            ];
                return view('pages.patient.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.patient.create');
    }

    /**
     * Show patients lists by filter
     */

    public function filter(Request $request)
    {
        $filtersFname = $request->get('filterFname');
        $filtersLname = $request->get('filterLname');
        $filtersGuid = $request->get('filterGuid');

        $user_id = auth()->user()->id;
        $posts = DB::table('patient_lists')->where([
            ['user_id' , $user_id],
            ['fname','like','%'.$filtersFname.'%'] ,
            ['lname','like','%'.$filtersLname.'%'],
            ['matricule','like','%'.$filtersGuid.'%']

        ])->paginate(10);
        $data = [
            'posts'=>$posts
        ];
        return view('pages.patient.index')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'lname' => 'required|min:3',
            'fname' => 'required|min:3',
            'matricule' => 'required|min:8',
            'patient_image'=>'image|nullable|max:1999',
            'description'=> 'required|min:8'

        ]);

        if ($validator->fails()) {
            toast('Warning Toast','warning')->background('#FFFFF0')->autoClose(2000);
            return back();
        } else {
            $posts = new Patient;
            $details = new PatientDetails ;

            //Handle IMAGE
            if ($request->hasFile('patient_image')) {
                //GET filename with the extention
                $fileNameWithExt = $request->file('patient_image')->GetClientOriginalName();
                //GET just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //GET just extention
                $extention = $request->file('patient_image')->getClientOriginalExtension();
                //File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extention ;
                //Upload the image
                $path = $request->file('patient_image')->storeAs('public/images/patient_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'Unknown.jpg';

            }

            $posts->lname = $request -> input('lname');
            $posts->fname = $request -> input('fname');
            $posts->matricule= $request -> input('matricule');
            $posts->description= $request -> input('description');
            $posts->user_id= auth()->user()->id;
            $details->age = $request -> input('age');
            $details->height = $request -> input('height');
            $details->patient_image = $fileNameToStore ;
            $posts->save();
            $posts->details()->save($details);
            //->with('toast_success', 'Task Created Successfully!')
            // example:
            toast('Success Toast','success')->background('#FFFFF0')->autoClose(2000);
            return redirect('/patient');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $posts = Patient::find($id);
        $details = PatientDetails::find($id);
        $data = [
            'posts'=>$posts,
            'details'=>$details
        ];
        return view ('pages.patient.details')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Patient::find($id);
        $details = PatientDetails::find($id);
        $data = [
            'posts' => $posts,
            'details'=>$details
        ];
        return view('pages.patient.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'lname' => 'required|min:3',
            'fname' => 'required|min:3',
            'matricule' => 'required|min:8',
            'patient_image'=>'image|nullable|max:1999',
            'description'=> 'required|min:8'

        ]);

        if ($validator->fails()) {
            //->with('toast_error', $validator->messages()->all()[0])->withInput()
            toast('Warning Toast','warning')->background('#FFFFF0')->autoClose(2000);
            return back();
        } else {

             //Handle IMAGE
             if ($request->hasFile('patient_image')) {
                //GET filename with the extention
                $fileNameWithExt = $request->file('patient_image')->GetClientOriginalName();
                //GET just file name
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //GET just extention
                $extention = $request->file('patient_image')->getClientOriginalExtension();
                //File name to store
                $fileNameToStore = $fileName.'_'.time().'.'.$extention ;
                //Upload the image
                $path = $request->file('patient_image')->storeAs('public/images/patient_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'Unknown.jpg' ;
            }
            $posts = Patient::find($id);
            $details = PatientDetails::find($id);
            $posts->lname = $request -> input('lname');
            $posts->fname = $request -> input('fname');
            $posts->matricule= $request -> input('matricule');
            $posts->description= $request -> input('description');
            $details->age = $request -> input('age');
            $details->height = $request -> input('height');
            if ($request->hasFile('patient_image')) {
                $details->patient_image = $fileNameToStore ;
            }
            $posts->save();
            $posts->details()->save($details);

            // example ->with('toast_success', 'Updated Successfully!'):
            toast('Success Toast','success')->background('#FFFFF0')->autoClose(2000);
            return redirect('/patient');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Patient::find($id);
        $details = PatientDetails::find($id);
        if ($details->patient_image != 'Unknown.jpg') {
            Storage::delete('public/images/patient_images/'. $details->patient_image);
        }
        $posts->delete();
        $posts->details()->delete($details);

        toast('Success Toast','success')->background('#FFFFF0')->autoClose(2000);
        return redirect('/patient');
    }


}
