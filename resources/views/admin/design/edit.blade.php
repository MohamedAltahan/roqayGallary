@extends('admin.layouts.master')
@section('mainTitle', 'Designs')
@section('content')

    <div class="card-header">
        <h4>Update design</h4>
        <div class="card-header-action">
        </div>
    </div>

    <div class="card-body">

        <form action="{{ route('admin.design.update', $design->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <x-form.input name="description[en]" label="Design description(English)" class="form-control"
                    value={{ $design['description']['en'] }} />
            </div>

            <div class="form-group">
                <x-form.input name="description[ar]" label="Design description(Arabic)" class="form-control"
                    value={{ $design['description']['ar'] }} />
            </div>

            <div id="design_image">
                <div class=" ">
                    @foreach ($design->images as $image)
                        <div style="display:inline-block; background-repeat: no-repeat; height: 100px ;width:100px;background-size: contain;  background-image: url({!! asset('uploads/' . $image->name) !!}); "
                            class="mx-1 my-1 gallery-item">
                            <button id="{{ $image->id }}" class="fas fa-times-circle delete-image"
                                style="color: red; font-size:25px; background-color: transparent;  border: none;cursor:pointer;"></button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <x-form.input name="image[]" multiple type='file' label="Select photos(if exist)" class="form-control" />
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control main-category">
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category_id', $design->category_id) == $category->id) value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

@endsection

@push('scripts')
    <script>
        // delete image ______________________________________________________________
        $('body').on('click', '.delete-image', function(e) {
            e.preventDefault();
            //disable all delete buttons until the next request
            $('.delete-image').prop('disabled', true);
            $.ajax({
                method: 'DELETE',
                url: "{{ route('admin.design.delete-design-image') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    image_id: $(this).attr('id'),
                },
                success: function(data) {
                    $('#design_image').load(' #design_image > * ');
                },
                error: function() {
                    alert('Error');
                }
            })
        });
    </script>
@endpush
