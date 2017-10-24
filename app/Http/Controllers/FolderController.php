<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder;

class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return response(array('data' => Folder::all()->toArray()), 200);
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
      $folder = new Folder;
      $folder->code = $request->code;
      $folder->folder_name = $request->folder_name;
      if($folder->save()){
        return response()->json(['success' => true, 'message' => 'Folder Added Successfully'], 200);
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
      return response(array('data' => Folder::where('code', $id)->with('workpapers')->get()->toArray()), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response(array('data' => Folder::find($id)->toArray()), 200);
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
        $folder = Folder::find($id);
        $folder->folder_name = $request->folder_name;
        if($folder->update()){
          return response()->json(['success' => true, 'message' => 'Folder Updated Successfully'], 200);
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
        if(Folder::find($id)->delete()){
          return response()->json(['success' => true, 'message' => 'Folder Deleted Successfully'], 200);
        }
        else{
          return response()->json(['success' => false, 'message' => 'Folder Not Deleted'], 400);
        }
    }

}
