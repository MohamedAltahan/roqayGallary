@extends('admin.layouts.master')
@section('mainTitle', 'services')
@section('content')
    <!-- Main Content -->
    <div class="card-header">
        <h4>Edit service</h4>
        <div class="card-header-action">
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <x-form.input name="name[en]" label="Name(English)" value="{{ @$service['name']['en'] }}"
                    class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="name[ar]" label="Name(Arabic)" value="{{ @$service['name']['ar'] }}"
                    class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="description[en]" label="Description(English)"
                    value="{{ @$service['description']['en'] }}" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="description[ar]" label="Description(Arabic)"
                    value="{{ @$service['description']['ar'] }}" class="form-control" />
            </div>

            <img width="150px" src="{{ asset('uploads/' . @$service->image) }}" alt="">

            <div class="form-group">
                <x-form.input type="file" name="image" label="Service Image" class="form-control" />
            </div>

            <div class="form-group">
                <label for="">status</label>
                <select name="status" id="inputStatus" class="form-control">
                    <option {{ $service->status == true ? 'selected' : '' }} value="1">Active
                    </option>
                    <option {{ $service->status == false ? 'selected' : '' }} value="0">
                        Inactive
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
@endsection
