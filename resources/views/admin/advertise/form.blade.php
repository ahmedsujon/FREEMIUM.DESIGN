@csrf
<div class="tile-body">
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label class="control-label">{{ __('Advertise Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('Enter Advertise Name') }}" value="{{ old('name') ?? $advertise->name }}" />
            @error('name')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 col-sm-12">
            <label class="control-label">{{ __('Preview resource') }}</label>
            <input type="text" name="preview_resource" id="preview_resource"
                class="form-control @error('preview_resource') is-invalid @enderror"
                placeholder="{{ __('Enter Advertise Name') }}"
                value="{{ old('preview_resource') ?? $advertise->preview_resource }}" />
            @error('preview_resource')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label" for="image">Identity Proof</label>
            <input class="form-control" name="image" type="file" id="image">
        </div>
    </div>
</div>
