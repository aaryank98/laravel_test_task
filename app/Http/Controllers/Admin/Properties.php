<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Properties as ModelsProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;

class Properties extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = ModelsProperties::paginate(15);
        return view('properties.list', ['properties' => $properties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('properties.add');
    }

    public function delete(PropertyRequest $request)
    {
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyRequest $request)
    {
        $request->validate([
            'image_full' => 'required',
        ]);

        $uuid = (string)Str::uuid();
        $fields = $request->validated();
        $fields['uuid'] = $uuid;

        if ($request->hasFile('image_full')) {
            $imageName = time().'.'.$request->image_full->extension();
            $request->image_full->move(public_path('uploads/images'), $imageName);
            $fields['image_full'] = asset('uploads/images').'/'.$imageName;
            $fields['image_thumbnail'] = asset('uploads/images').'/'.$imageName;
        }
        $fields['property_type_id'] = 2;
        $fields['latitude'] = "";
        $fields['longitude'] = "";
        ModelsProperties::create($fields);
        return redirect()->route('properties.index')->with('success', 'Propertry added');    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $property = ModelsProperties::find($id);
        return view('properties.edit', ['property' => $property]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, string $id)
    {
        $property = ModelsProperties::find($id);
        $property->fill($request->validated());
        $fields = $request->validated();
        if ($request->hasFile('image_full')) {
            if($property->image_full){
                $imgpath = public_path().'/uploads/images/'.$property->image_full;
                if(file_exists($imgpath)){
                    unlink($imgpath);
                }
            }
            $imageName = time().'.'.$request->image_full->extension();
            $request->image_full->move(public_path('uploads/images'), $imageName);
            $fields['image_full'] = asset('uploads/images').'/'.$imageName;
            $fields['image_thumbnail'] = asset('uploads/images').'/'.$imageName;
        }
        $property->update($fields);
        return redirect()->route('properties.index')->with('success', 'Propertry updated');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $property = ModelsProperties::find($id);
        if(!empty($property)){
            if($property->image_full){
                $imgpath = public_path().'/uploads/images/'.$property->image_full;
                if(file_exists($imgpath)){
                    unlink($imgpath);
                }
            }
            ModelsProperties::where('id',$id)->delete();
        }
        return redirect()->back()->with('success', 'Propertry deleted');   
    }
}
