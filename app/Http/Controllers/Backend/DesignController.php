<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Design;
use App\Models\Image;
use App\Models\SubCategory;
use App\Models\Video;
use App\Traits\fileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DesignController extends Controller
{
    use fileUploadTrait;

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->deleteUselessImages();
        $imagesGroupKey = Str::random(10);
        return view('admin.design.create', compact('imagesGroupKey'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data =   $request->validate([
            'name.*' => ['required'],
            'description.*' => ['required', 'max:1000'],
            'long_description.*' => ['nullable', 'max:5000'],
            // 'category_id' => ['required', 'integer'],
            'status' => ['required'],
            'images_group_key' => ['required', 'string', 'max:20'],
        ]);

        $design = Design::create($data);

        toastr('Saved successfully');

        return redirect()->route('admin.show-designs.index', $design->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $design = Design::with('images')->findOrFail($id);

        return view('admin.design.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name.*' => ['required'],
            'description.*' => ['required', 'max:1000'],
            'long_description.*' => ['nullable', 'max:5000'],
            // 'category_id' => ['required', 'integer'],
            'status' => ['required'],
            'images_group_key' => ['required', 'string', 'max:20'],
        ]);

        $design = Design::findOrFail($id);

        $design->update($data);

        toastr('Updated successfully');

        return redirect()->route('admin.show-designs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $design = Design::findOrFail($id);

        //delete photos from files then form database
        foreach ($design->images as $image) {
            $this->deleteFile('myDisk', $image->name);
        }
        Image::where('images_group_key', $design->images_group_key)->delete();

        $design->delete();

        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }

    public function changeStatus(Request $request)
    {
        $design = Design::findOrFail($request->id);

        $request->status == 'true' ? $design->status = 'active' : $design->status = 'inactive';
        $design->save();

        return response(['message' => 'Status has been updated']);
    }

    //product image upload for dropzone request
    public function uploadImage(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $imagePath = $this->fileUplaod($request, 'myDisk', 'designGallery', 'file');
            $image = new Image();
            $image['name'] = $imagePath;
            $image['images_group_key'] = $id;
            $image->save();
            return response($image->id);
        } else {
            return response(['e' => 'e']);
        }
    }
    //get Product Images using ajax
    public function getImage(Request $request)
    {
        $images = Image::where('images_group_key', $request->images_group_key)->get();
        return view('admin.design.images', compact('images'));
    }

    //delete Product Images using ajax
    public function deleteImage(Request $request)
    {
        $image = Image::findOrFail($request->id);
        $image->delete();
        $this->deleteFile('myDisk', $image->name);
        $images = Image::where('images_group_key', $request->images_group_key)->get();
        return view('admin.design.images', compact('images'));
    }

    public function deleteUselessImages()
    {
        $images = Image::whereDoesntHave('design')->get();
        foreach ($images as $image) {
            $this->deleteFile('myDisk', $image->name);
            $image->delete();
        }
    }
}
