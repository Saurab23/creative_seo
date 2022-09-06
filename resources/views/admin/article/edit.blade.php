@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.role.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.article.update", [$article->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">{{ trans('global.role.fields.title') }}*</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($article) ? $article->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="title">Slug*</label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug', isset($article) ? $article->slug : '') }}">
            </div>
            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                <label for="permissions">{{ trans('global.role.fields.permissions') }}*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="categories[]" id="categories" class="form-control select2" multiple="multiple">
                    @foreach($categories as $id => $categories)
                        <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || isset($article) && $article->categories->contains($id)) ? 'selected' : '' }}>
                            {{ $categories }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('permissions') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                <label for="permissions">Tags*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                    @foreach($tags as $id => $tags)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || isset($article) && $article->tags->contains($id)) ? 'selected' : '' }}>
                            {{ $tags }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('categories'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label><strong>Publish Date :</strong></label>
                <div class='input-group date' id='datetimepicker1'>
                   <input type="date" class="form-control"  value="{{ $article->news_date }}" />
                   <span class="input-group-addon">
                   <span class="glyphicon glyphicon-calendar"></span>
                   </span>
                </div>
             </div>
             <div class="form-group">
                <label><strong>Content :</strong></label>
                <textarea class="ckeditor form-control" name="content">{{ $article->content }}</textarea>
            </div>
            <div class="form-group">
                <label>Featured Photo</label><span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input type="file" name="featured_photo"><br>
                  <small>(Allowed Photo Types: jpg, jpeg, gif, png)</small><br>
                </div>
            </div>
            <div class="form-group">
                {{-- <label class="col-sm-2 col-form-label"></label> --}}
                <div class="col-sm-10">
                  <img height="100px" width="100px" src="{{ (!empty($article->featured_photo))?url('uploads/article-featured-image/'.$article->featured_photo):url('uploads/no-image.png') }}" class="show-img" id="showImage">
                </div>
              </div>
            <div class="form-group {{ $errors->has('meta_title') ? 'has-error' : '' }}">
                <label for="title">Meta Title*</label>
                <input type="text" id="meta_title" name="meta_title" class="form-control" value="{{ old('meta_title', isset($article) ? $article->meta_title : '') }}">
            </div>
            <div class="form-group {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                <label for="title">Meta Description*</label>
                <input type="text" id="meta_description" name="meta_description" class="form-control" value="{{ old('meta_title', isset($article) ? $article->meta_description : '') }}">
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
 </script>