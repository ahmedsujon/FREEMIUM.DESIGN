@csrf
<div class="tile-body">
    <div class="form-group row">
        <div class="col-md-12 col-sm-12">
            <label class="control-label">{{ __('Item Name') }}</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="{{ __('Enter Item title') }}" value="{{ old('title') ?? $items->title }}" />
            @error('title')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label class="control-label">{{ __('Description') }}</label>
        <textarea name="description"
            class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $items->description  }}</textarea>
        @error('description')
        <div class="form-control-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group row">
        <div class="col-md-12 col-sm-12">
            <label class="control-label">{{ __('Preview Resource') }}</label>
            <input type="text" name="preview_resource" id="preview_resource"
                class="form-control @error('preview_resource') is-invalid @enderror"
                placeholder="{{ __('Enter Preview Resource') }}"
                value="{{ old('preview_resource') ?? $items->preview_resource }}" />
            @error('preview_resource')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-12 col-sm-12">
            <label class="control-label">{{ __('Download Resource') }}</label>
            <input type="text" name="download_resource" id="download_resource"
                class="form-control @error('download_resource') is-invalid @enderror"
                placeholder="{{ __('Enter Download Resource') }}"
                value="{{ old('download_resource') ?? $items->download_resource }}" />
            @error('download_resource')
            <div class="form-control-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-6 col-sm-12">
            <label for="tag_id">Select Tag</label>
            <select name="tag_id" id="tag_id" class="form-control">
                @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ $tag->id == $items->tag_id ? 'selected' : '' }}>
                    {{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <label for="category_id">Select Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $items->category_id ? 'selected' : '' }}>
                    {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="form-group">
            <label class="control-label" for="image">Identity Proof</label>
            <input class="form-control" name="image" type="file" id="image">
        </div>
    </div>
</div>
