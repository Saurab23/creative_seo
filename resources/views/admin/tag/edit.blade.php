@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Tags
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tag.update", [$tag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="category_name">Tag Name</label>
                <input class="form-control {{ $errors->has('tag_name') ? 'is-invalid' : '' }}" type="text" name="tag_name" id="tag_name" value="{{ old('tag_name', $tag->tag_name) }}" required>
                @if($errors->has('tag_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tag_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.subject_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="slug">Slug Name</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $tag->slug) }}" required>
                @if($errors->has('slug'))
                    <div class="invalid-feedback">
                        {{ $errors->first('slug') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.subject_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="meta_title">Meta Title</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $tag->meta_title) }}" required>
                @if($errors->has('meta_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.subject_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="meta_description">Meta Description</label>
                <textarea class="form-control {{ $errors->has('meta_description') ? 'is-invalid' : '' }}" type="text" name="meta_description" id="meta_description" required>{{ old('meta_description', $tag->meta_description) }}</textarea>
                @if($errors->has('meta_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('meta_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.subject.fields.subject_name_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection