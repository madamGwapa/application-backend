<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workpaper;
use App\Folder;

class WorkpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(array('data' => Workpaper::all()->toArray()), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $code = substr($request->reference, 0, 1);
      $paper = new Workpaper;
      $paper->folder_id = Folder::where('code', $code)->first()->id;
      $paper->reference = $request->reference;
      $paper->workpaper_name = $request->workpaper_name;
      if($paper->save()){
        return response()->json(['success' => true, 'message' => 'Workpaper Added Successfully'], 200);
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
        return response(array('data' => Workpaper::find($id)->toArray()), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
      $code = substr($request->reference, 0, 1);
      $paper = Workpaper::find($id);
      $paper->workpaper_name = $request->workpaper_name;
      if($paper->save()){
        return response()->json(['success' => true, 'message' => 'Workpaper Updated Successfully'], 200);
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
        $paper = Workpaper::where('reference', $id)->first();
        if($paper->delete()){
          return response()->json(['success' => true, 'message' => 'Workpaper Deleted Successfully'], 200);
        }
        else{
            return response()->json(['success' => false, 'message' => 'Workpaper Not Deleted'], 400);
        }
    }
}