<div class="tab-pane fade" id="list-home-page" role="tabpanel" aria-labelledby="list-home-page-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.home-page-setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <img src="{{ asset('uploads/' . @$homePage['main_image']) }}" width="200px" alt="iamge">
                <div class="form-group">
                    <x-form.input type="file" class="form-control" name="main_image"
                        label='select home page photo(1080x1920)' />
                </div>

                <hr style="height: 2px;background-color:black">

                <div class="form-group">
                    <label style="font-size:15px" for="">Main title(appears on home photo)(English)</label>
                    <textarea class="form-control " name="main_title[en]">{{ @$homePage['main_title']['en'] }}</textarea>
                </div>

                <div class="form-group">
                    <label style="font-size:15px" for="">Main title(appears on home photo)(Arabic)</label>
                    <textarea class="form-control " name="main_title[ar]">{{ @$homePage['main_title']['ar'] }}</textarea>
                </div>

                <hr style="height: 2px;background-color:black">

                <div class="form-group">
                    <label style="font-size:15px" for="">Main description (will appear under "Main
                        title")(English)</label>
                    <textarea class="form-control " name="main_description[en]" label='description'>{{ @$homePage['main_description']['en'] }}</textarea>
                </div>

                <div class="form-group">
                    <label style="font-size:15px" for="">Main description (will appear under "Main
                        title")(Arabic)</label>
                    <textarea class="form-control " name="main_description[ar]" label='description'>{{ @$homePage['main_description']['ar'] }}</textarea>
                </div>

                <hr style="height: 2px;background-color:black">

                <div class="form-group">
                    <label style="font-size:15px" for="">Minor title(appears under home photo)(English)</label>
                    <textarea class="form-control " name="sub_title[en]">{{ @$homePage['sub_title']['en'] }}</textarea>
                </div>

                <div class="form-group">
                    <label style="font-size:15px" for="">Minor title(appears under home photo)(Arabic)</label>
                    <textarea class="form-control " name="sub_title[ar]">{{ @$homePage['sub_title']['ar'] }}</textarea>
                </div>

                <hr style="height: 2px;background-color:black">

                <div class="form-group">
                    <label style="font-size:15px" for="">Minor Description (will appear under "Minor
                        title")(English)</label>
                    <textarea class="form-control " name="sub_description[en]">{{ @$homePage['sub_description']['en'] }}</textarea>
                </div>

                <div class="form-group">
                    <label style="font-size:15px" for="">Minor Description (will appear under "Minor
                        title")(Arabic)</label>
                    <textarea class="form-control " name="sub_description[ar]">{{ @$homePage['sub_description']['ar'] }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
