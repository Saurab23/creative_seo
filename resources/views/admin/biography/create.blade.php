@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Biography
    </div>

    <div class="card-body">
        <form action="{{ route("admin.biography.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title"><strong>Title*</strong></label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($biography) ? $biography->title : '') }}">
            </div>
            <div class="form-group {{ $errors->has('slug') ? 'has-error' : '' }}">
                <label for="title"><strong>Slug*</strong></label>
                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('title', isset($biography) ? $biography->slug : '') }}">
            </div>
            <div class="form-group {{ $errors->has('title_tag') ? 'has-error' : '' }}">
                <label for="title_tag"><strong>Title tag*</strong></label>
                <input type="text" id="title_tag" name="title_tag" class="form-control" value="{{ old('title', isset($biography) ? $biography->title_tag : '') }}">
            </div>
            <div class="form-group">
                <label for="abroad"><strong> Status:</strong></label>
                  <select class="form-control {{ $errors->has('abroad') ? 'is-invalid' : '' }}" name="relationship_status" id="relationship_status" required>
                  <option value disabled {{ old('abroad', null) === null ? 'selected' : '' }}>Please Select</option>
                  <option value="single">Single</option>
                  <option value="relationship">In Relationship</option>
                  <option value="married">Married</option>
                  <option value="divorced">Divorced</option>
                  </select>
            </div>
            <div class="married box">
                <label for="anniversary_date"><strong>Anniversary Date*</strong></label>
                <input type="date" id="anniversary_date" name="anniversary_date" class="form-control" >
            </div>
            <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
                <label for="birth_date"><strong>Birth Date*</strong></label>
                <input type="date" id="birth_date" name="birth_date" class="form-control" >
            </div>
            <div class="form-group">
                <label><strong>Relationship Fact :</strong></label>
                <textarea class="ckeditor form-control" name="relationship_fact"></textarea>
            </div>
            <div class="form-group">
                <label><strong>More About Relationship :</strong></label>
                <textarea class="ckeditor form-control" name="more_about_relationship"></textarea>
            </div>
            <div class="form-group">
                <label><strong>Photo</strong></label><span class="text-danger">*</span></label>
                <div class="col-sm-10">
                  <input type="file" name="biography_photo"><br>
                  <small>(Allowed Photo Types: jpg, jpeg, gif, png)</small><br>
                </div>
            </div>
            <div class="form-group {{ $errors->has('tags') ? 'has-error' : '' }}">
                <label for="permissions">Tags*
                    <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label>
                <select name="tags[]" id="tags" class="form-control select2" multiple="multiple">
                    @foreach($tags as $id => $tags)
                        <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || isset($biography) && $tags->tags->contains($id)) ? 'selected' : '' }}>
                            {{ $tags }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('permissions'))
                    <em class="invalid-feedback">
                        {{ $errors->first('tags') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label><strong>FaceBook link:</strong></label>
                <input class="form-control" name="facebook_link">
            </div>
            <div class="form-group">
                <label><strong>Twitter Link:</strong></label>
                <input class="form-control" name="twitter_link">
            </div>
            <div class="form-group">
                <label><strong>Instagram Link:</strong></label>
                <input class="form-control" name="instagram_link">
            </div>
            <div class="form-group">
                <label><strong>Tiktok link:</strong></label>
                <input class="form-control" name="tiktok_link">
            </div>
            <div class="form-group">
                <label><strong>Youtube Link:</strong></label>
                <input class="form-control" name="youtube_link">
            </div>
            <div class="form-group">
                <label><strong>IMDB Link:</strong></label>
                <input class="form-control" name="imdb_link">
            </div>
            <div class="form-group">
                <label><strong>Official Website Link:</strong></label>
                <input class="form-control" name="website_link">
            </div>
            <div class="form-group">
                <label><strong>Twitch Link:</strong></label>
                <input class="form-control" name="twitch_link">
            </div>
            <div class="form-group">
                <label><strong>Meta Title:</strong></label>
                <input class="form-control" name="meta_title">
            </div>
            <div class="form-group">
                <label><strong>Meta Description:</strong></label>
                <textarea class="form-control" name="meta_description"></textarea>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("select").change(function(){
            $(this).find("option:selected").each(function(){
                var optionValue = $(this).attr("value");
                if(optionValue){
                    $(".box").not("." + optionValue).hide();
                    $("." + optionValue).show();
                } else{
                    $(".box").hide();
                }
            });
        }).change();
    });
    </script>
  