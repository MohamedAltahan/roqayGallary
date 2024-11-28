@extends('admin.layouts.master')
@section('mainTitle', 'Designs')
@section('content')

    <div class="card-header">
        <h4>Create design</h4>
        <div class="card-header-action">
        </div>
    </div>

    <div class="card-body">

        {{-- used to append product photos after upload then using ajax --}}
        <div id="product_images"></div>
        <p class="text-danger">All images must have the same dimensions(width, height) </p>
        <form class="dropzone mb-3" method="POST" id='myDropzone' enctype="multipart/form-data"
            action="{{ route('admin.design.upload.image', $imagesGroupKey) }}">
            @csrf
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

            <div class="form-group">
                <x-form.input name="description[en]" label="Design description(English)" class="form-control" />
            </div>

            <div class="form-group">
                <x-form.input name="description[ar]" label="Design description(Arabic)" class="form-control" />
            </div>

            <div class="row">
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
            </div>

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
@endpush
