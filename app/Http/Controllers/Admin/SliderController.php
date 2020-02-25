<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Http\Controllers\Controller;
use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $input = $request->all();

        $slider = new Slider;
        
        $input['slug'] = \Str::slug($request->title);
        
        if($request->has('photo')) {
           
            $sliderImages =  $request->file('photo');
            
            $images_name = array();

            foreach($sliderImages as $sliderImage){

                $images_name[] = $sliderImage->getClientOriginalName();

                $imagesname    = $sliderImage->getClientOriginalName();

                $sliderImage->storeAs('images/sliders/', $imagesname);

            }

            $input['photo'] = json_encode($images_name);
        
        }

        if( Slider::create($input) ){

            $response = ['message' => 'Slider Created Successfully.', 'alert-type' => 'success'];
        
        }
        return redirect()->route('admin.slides.index')->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slide)
    {
        $slider = $slide;
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slide)
    {
        dd('herer');
        abort_unless(\Gate::allows('activity_edit'), 403);

        $input = $request->all();
        
        $input['slug'] = \Str::slug($request->title);

        if($request->has('photo')) {

            $sliderImages =  $request->file('photo');

            $images_name = array();

            foreach($sliderImages as $sliderImage){

                $images_name[] = $sliderImage->getClientOriginalName();

                $imagesname = $sliderImage->getClientOriginalName();

                $sliderImage->storeAs('images/sliders/', $imagesname);

            }

            $input['photo'] = json_encode($images_name);

        }

        if( $slide->update($input) ){
            $response = ['message' => 'Slider Updated Successfully.', 'alert-type' => 'success'];
        }
        return redirect()->route('admin.slides.index')->with($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
