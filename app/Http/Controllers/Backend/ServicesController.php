<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Traits\fileUploadTrait;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use fileUploadTrait;

    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('admin.services.index');
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data =  $request->validate([
            'name.*' => 'required',
            'description.*' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->fileUplaod($request, 'myDisk', 'services', 'image');
        }

        Service::create($data);

        toastr('Saved successfully');

        return redirect()->route('admin.services.index');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name.*' => 'required',
            'description.*' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|boolean',
        ]);

        $service = Service::findOrFail($id);

        $service->name = $request->name;
        $service->description = $request->description;
        $service->status = $request->status;

        if ($request->hasFile('image')) {
            $service->image = $this->fileUpdate($request, 'myDisk', 'services', 'image', $service->image);
        }
        $service->save();
        toastr('Updated successfully');
        return redirect()->route('admin.services.index');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $this->deleteFile('myDisk', $service->image);
        $service->delete();
        toastr('Deleted successfully');
        return response(['status' => 'success', 'message' => 'Deleted successfully']);
    }

    //change status using ajax request--------------------------------------------------
    public function changeStatus(Request $request)
    {
        $category = Service::findOrFail($request->id);

        $request->status == 'true' ? $category->status = 1 : $category->status = 0;

        $category->save();

        return response(['message' => 'Status has been updated']);
    }
}
