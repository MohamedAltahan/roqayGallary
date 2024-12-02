@extends('admin.layouts.master')
@section('mainTitle', 'Category')
@section('content')

    <div class="card-header">
        <h4>Create service</h4>
        <div class="card-header-action">
        </div>
    </div>

    <div class="card-body">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <x-form.input name="name[en]" label="Name(English)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="name[ar]" label="Name(Arabic)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="description[en]" label="Description(English)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="description[ar]" label="Description(Arabic)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input type="file" name="image" label="Service Image" class="form-control" />
            </div>

            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="inputStatus" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>

        </form>
    </div>

@endsection
