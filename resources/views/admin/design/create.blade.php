@extends('admin.layouts.master')
@section('mainTitle', 'Designs')
@section('content')


    <div class="card-header">
        <h4>Create design</h4>
        <div class="card-header-action">
        </div>
    </div>

    <div class="card-body">
        <div id="design_video">

        </div>
        <span>Upload video here</span>
        <p class="text-danger">
            (max video size 100MB)
        </p>
        <form class="dropzone mb-3" method="POST" id='videoDropzone' enctype="multipart/form-data"
            action="{{ route('admin.design.upload.video', $imagesGroupKey) }}">
            @csrf
            <div class="dz-message" data-dz-message>Click here to upload <span class="text-danger">video</span></div>
        </form>
        <div id="error-message" style="color: red; display: none; font-size: 30px"></div>
        <hr>
        <div id="product_images"></div>
        <span>Upload images here</span>
        <p class="text-danger">it's preferable to upload images with the same dimensions(width, height)
            (max image size 6MB)
        </p>
        <form class="dropzone mb-3" method="POST" id='imageDropzone' enctype="multipart/form-data"
            action="{{ route('admin.design.upload.image', $imagesGroupKey) }}">
            @csrf
            <div class="dz-message" data-dz-message>Click here to upload <span class="text-danger">images</span></div>
        </form>

        <form action="{{ route('admin.design.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name='images_group_key' type='hidden' value='{{ $imagesGroupKey }}' />

            <div class="form-group">
                <x-form.input name="name[en]" label="Design name(English)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="name[ar]" label="Design name(Arabic)" class="form-control" />
            </div>

            <p class="text-danger">short description will appear on the home page </p>

            <div class="form-group">
                <x-form.input name="description[en]" label="Short description(English)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="description[ar]" label="Short description(Arabic)" class="form-control" />
            </div>

            <p class="text-danger">Long description will appear in desing's details page </p>

            <div class="form-group">
                <label for="">Long description (English)</label>
                <textarea class="form-control summernote" name="long_description[en]"></textarea>
            </div>

            <div class="form-group">
                <label for="">Long description (Arabic)</label>
                <textarea class="form-control summernote" name="long_description[ar]"></textarea>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="" style="font-size: 15px">Category</label>
                        <select name="category_id" id="" class="form-control main-category">
                            <option value="">select</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)
                                    @if (isset($category->design)) disabled class='text-danger' @endif>
                                    {{ $category['name'][App::getLocale()] }} </option>
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

            <button type="submit" class="btn btn-primary">Create</button>

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
        Dropzone.options.imageDropzone = {

            paramName: "image", // The name that will be used to transfer the file (by default is 'file')
            maxFilesize: 6, // MB
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
                                images_group_key: '{{ $imagesGroupKey }}'
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
    <script>
        Dropzone.options.videoDropzone = {

            paramName: "video", // The name that will be used to transfer the file (by default is 'file')
            maxFilesize: 100, // MB
            acceptedFiles: 'video/*',
            addRemoveLinks: true, //to add remove or cancel buttons
            //------------------------------------------------------
            //if true the files will be upload once you chose it automatically'defaul:true'
            //when you are ready to submit simply call myDropzone.processQueue().
            // autoProcessQueue: false,
            //-------------------------------------------------------
            maxFiles: 1, //max number of uploaded files per product
            //uploadMultiple: true, //upload all the file in one request or more it depends on 'parallelUploads' 'default:false'
            parallelUploads: 20,
            dictFileTooBig: 'The file is too large, please select video less than 100MB',
            init: function() {
                this.on('error', function(file, message) {
                    const errorMessageContainer = document.getElementById('error-message');
                    errorMessageContainer.style.display = 'block';
                    errorMessageContainer.textContent = message;
                    this.removeFile(file);
                });
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
                            url: '{{ route('admin.design.get-videos') }}',
                            data: {
                                images_group_key: '{{ $imagesGroupKey }}'
                            },
                            success: function(data) {
                                $('#design_video').html(data);
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
                    images_group_key: '{{ $imagesGroupKey }}',
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

    {{-- delete video by ajax--------------------------------------------------------/ --}}
    <script>
        $('body').on('click', '.delete-video', function(e) {
            e.preventDefault();
            //disable all delete buttons until the next request
            $('.delete-video').prop('disabled', true);
            $.ajax({
                method: 'DELETE',
                url: "{{ route('admin.design.delete-video') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).attr('id'),
                    images_group_key: '{{ $imagesGroupKey }}',
                },
                success: function(data) {
                    $('#design_video').html(data);
                },
                error: function() {
                    alert('Error');
                }
            })
        });
    </script>
@endpush
