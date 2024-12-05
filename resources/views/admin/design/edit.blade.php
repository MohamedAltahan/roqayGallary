@extends('admin.layouts.master')
@section('mainTitle', 'Designs')
@section('content')

    <div class="card-header">
        <h4>Update design</h4>
        <div class="card-header-action">
        </div>
    </div>

    <div class="card-body">


        <div id="product_images">
            <div class="card">
                <div class="card-body">
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
            </div>
        </div>



        <p class="text-danger">it's preferable to upload images with the same dimensions(width, height)</p>
        <form class="dropzone mb-3" method="POST" id='myDropzone' enctype="multipart/form-data"
            action="{{ route('admin.design.upload.image', $design->images_group_key) }}">
            @csrf
        </form>

        <form action="{{ route('admin.design.update', $design->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-form.input name='images_group_key' type='hidden' value='{{ @$design->images_group_key }}' />

            <div class="form-group">
                <x-form.input name="name[en]" label="Design name(English)" class="form-control"
                    value="{{ @$design['name']['en'] }}" />
            </div>

            <div class="form-group">
                <x-form.input name="name[ar]" label="Design name(Arabic)" class="form-control"
                    value="{{ @$design['name']['ar'] }}" />
            </div>

            <div class="form-group">
                <x-form.input name="description[en]" label="Design description(English)" class="form-control"
                    value="{{ @$design['description']['en'] }}" />
            </div>

            <div class="form-group">
                <x-form.input name="description[ar]" label="Design description(Arabic)" class="form-control"
                    value="{{ $design['description']['ar'] }}" />
            </div>

            <div class="form-group">
                <label for="">Long description (English)</label>
                <textarea class="form-control summernote" name="long_description[en]">{{ @$design['long_description']['en'] }}</textarea>
            </div>

            <div class="form-group">
                <label for="">Long description (Arabic)</label>
                <textarea class="form-control summernote" name="long_description[ar]">{{ @$design['long_description']['ar'] }}</textarea>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="" class="form-control main-category">
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option @selected(old('category_id', $design->category_id) == $category->id) value="{{ $category->id }}"
                                    @if (isset($category->design) && $category->design->id != $design->id) disabled class='text-danger' @endif>
                                    {{ $category->name[App::getLocale()] }} @if (isset($category->design))
                                        (used before)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div> --}}

            <div class="form-group">
                <label for="" style="font-size: 15px">status</label>
                <select name="status" id="inputStatus" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>

@endsection

{{-- ================================================================================================ --}}
{{-- push styles---------------------------------------------------------------------- --}}
@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dropzone.min.css') }}">
@endpush
{{-- push scripts----------------------------------------------------------------------- --}}
@push('scripts')
    {{-- dropZone scripts--------------------------- --}}
    <script src="{{ asset('backend/assets/js/dropzone.min.js') }}"></script>

    <script>
        Dropzone.options.myDropzone = {

            paramName: "file", // The name that will be used to transfer the file (by default is 'file')
            maxFilesize: 5, // MB
            acceptedFiles: 'image/*',
            addRemoveLinks: true, //to add remove or cance buttons
            //------------------------------------------------------
            //if true the files will be upload once you chose it automatically'defaul:true'
            //when you are ready to submit simply call myDropzone.processQueue().
            // autoProcessQueue: false,
            //-------------------------------------------------------
            maxFiles: 20, //max number of uploaded files per product
            //uploadMultiple: true, //upload all the file in one request or more it depends on 'parallelUploads' 'default:false'
            parallelUploads: 20,
            thumbnailWidth: 120, //default thumbnail width 120
            thumbnailHeight: 120, //default thumbnail hieght 120
            //----------------force rezise image---------------------------
            resizeWidth: 1920, //it cares about aspect when it resize ^_^
            resizeHeight: null,
            resizeQuality: .6, //defaul is 0.8 (from the original quality)
            //-------------------------------------------------------------

            init: function() {

                // var submitButton = document.querySelector("#submit-all")

                // if (autoProcessQueue: false)you well need this button to start upload manualy
                // submitButton.addEventListener("click", function() {
                //     myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                // });

                // after each photo upload check state if the queue
                this.on("success", function() {
                    //if all files have been uploaded
                    if (this.getUploadingFiles().length == 0) {
                        $.ajax({
                            method: 'GET',
                            url: '{{ route('admin.design.get-images') }}',
                            data: {
                                images_group_key: '{{ $design->images_group_key }}',
                            },
                            success: function(data) {
                                $('#product_images').html(data);
                            },
                            error: function() {
                                alert('wait a while');
                            }
                        })
                    }
                });
                // after upload all file clear drop box
                this.on("complete", function() {
                    this.removeAllFiles();
                });


            }
        };
    </script>
    {{-- delete image by ajax--------------------------------------------------------/ --}}
    <script>
        $('body').on('click', '.delete-image', function(e) {
            e.preventDefault();
            //disable all delete buttons until the next request
            $('.delete-image').prop('disabled', true);
            $.ajax({
                method: 'DELETE',
                url: "{{ route('admin.design.delete-image') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).attr('id'),
                    images_group_key: '{{ $design->images_group_key }}',
                },
                success: function(data) {
                    $('#product_images').html(data);
                },
                error: function() {
                    alert('Error');
                }
            })
        });
    </script>
@endpush
