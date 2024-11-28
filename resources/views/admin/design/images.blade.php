<div class="card">
    <div class="card-body">
        <div class="gallery gallery-md">
            @foreach ($images as $image)
                <div class="gallery-item" style="background-image: url({!! asset('uploads/' . $image->name) !!})">
                    <button id="{{ $image->id }}" class="fas fa-times-circle delete-image"
                        style="color: red; font-size:25px; background-color: transparent;  border: none;cursor:pointer;"></button>
                </div>
            @endforeach
        </div>
    </div>
</div>
