@if (isset($videos))
    <div class="row align-items-center">
        @foreach ($videos as $video)
            <div class="mx-5">
                <button id="{{ $video->id }}" class="fas fa-times-circle delete-video btn btn-danger btn-sm"
                    style="position: absolute;z-index:100">
                    delete</button>
                <video width="320" height="240" controls>
                    <source src="{{ asset('uploads/' . $video->name) }}" type="video/mp4">
                </video>
            </div>
        @endforeach
    </div>
@endif
