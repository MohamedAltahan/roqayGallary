<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{ route('admin.general-setting-update.index') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <x-form.input class="form-control" name="site_name" label='Site Name'
                        value="{{ @$setting->site_name }}" />
                </div>

                <div class="form-group">
                    <x-form.input class="form-control" name="contact_email" label='Contact Email'
                        value="{{ @$setting->contact_email }}" />
                </div>

                <div class="form-group">
                    <x-form.input class="form-control" name="contact_phone" label='Contact phone'
                        value="{{ @$setting->contact_phone }}" />
                </div>

                <div class="form-group">
                    <x-form.input class="form-control" name="contact_address[ar]" label='Contact address(Arabic)'
                        value="{{ @$setting['contact_address']['ar'] }}" />
                </div>
                <div class="form-group">
                    <x-form.input class="form-control" name="contact_address[en]" label='Contact address (English)'
                        value="{{ @$setting['contact_address']['en'] }}" />
                </div>

                <div class="form-group">
                    <x-form.input class="form-control" name="site_description[ar]" label='Footer description(Arabic)'
                        value="{{ @$setting['site_description']['ar'] }}" />
                </div>
                <div class="form-group">
                    <x-form.input class="form-control" name="site_description[en]" label='Footer description(English)'
                        value="{{ @$setting['site_description']['en'] }}" />
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
            </form>
        </div>
    </div>
</div>
@push('styles')
@endpush
