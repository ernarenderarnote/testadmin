<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Product;
=======
use App\Http\Requests\MassDestroyDestinationRequest;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
use App\Destination;

class DestinationsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_unless(\Gate::allows('destination_access'), 403);

        $destinations = Destination::all();

        return view('admin.destinations.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(\Gate::allows('destination_create'), 403);

        return view('admin.destinations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function store(Request $request)
=======
    public function store(StoreDestinationRequest $request)
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
    {
        abort_unless(\Gate::allows('destination_create'), 403);
       
        $input = $request->all();
        
        $destination = new Destination();
        
        $input['slug'] = \Str::slug($request->title);

        if($request->has('image')) {

            $image =  $request->file('image');

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            //dd(public_path('images'));
            $image->storeAs('images', $imageName);
            
            $input['thumbnails'] = $imageName;

        }

        Destination::create($input);
        return redirect()->route('admin.destinations.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show($id)
    {
        //
=======
    public function show(Destination $destination)
    {
        abort_unless(\Gate::allows('destination_show'), 403);

        return view('admin.destinations.show', compact('destination'));
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Destination $destination)
    {
        abort_unless(\Gate::allows('destination_edit'), 403);

        return view('admin.destinations.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function update(Request $request, $id)
    {
        //
=======
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        abort_unless(\Gate::allows('destination_edit'), 403);

        $input = $request->all();
        
        $input['slug'] = \Str::slug($request->title);

        if($request->has('image')) {

            $image =  $request->file('image');

            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            
            $image->storeAs('images', $imageName);
            
            $input['thumbnails'] = $imageName;

        }

        $destination->update($input);
        return redirect()->route('admin.destinations.index');
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function destroy($id)
    {
        //
=======
    public function destroy(Destination $destination)
    {

        abort_unless(\Gate::allows('destination_delete'), 403);

        $destination->delete();

        return back();
    }

    public function massDestroy(MassDestroyDestinationRequest $request)
    {
        
        Destination::whereIn('id', request('ids'))->delete();

        return response(null, 204);
>>>>>>> 5f08b3aab9e796c5ee77ecb117d4df9aaf63449d
    }
}
