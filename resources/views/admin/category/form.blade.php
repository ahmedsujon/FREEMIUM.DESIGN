@csrf
<div class="tile-body">
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label class="control-label">{{ __('Manufacturer Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                placeholder="{{ __('Enter Category Name') }}" value="{{ old('name') ?? $category->name }}" />
            @error('name')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 col-sm-12">
            <label class="control-label">{{ __('status') }}</label>
            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                <option value="">{{ __('Select Status') }}</option>
                <option value="1" {{ $category->status === 1 ? 'selected':'' }}>{{ __('Active') }}</option>
                <option value="0">{{ __('In-Active') }}</option>
            </select>
            @error('status')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>
