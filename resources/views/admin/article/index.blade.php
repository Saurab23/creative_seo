@extends('layouts.admin')
@section('content')
@can('article_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.article.create") }}">
                {{ trans('global.add') }} Article
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Article List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Categories
                        </th>
                        <th>
                            Tags
                        </th>
                        <th>
                            Content
                        </th>
                        <th>
                            Featured Photo
                        </th>
                        <th>
                            Created By
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $key => $article)
                        <tr data-entry-id="{{ $article->id }}">
                            <td>
                                {{ $key+1 }}
                            </td>
                            <td>
                                {{ $article->title ?? '' }}
                            </td>
                            <td>
                                {{ $article->slug ?? '' }}
                            </td>
                            <td>
                                @foreach($article->categories as $key => $item)
                                    <span class="badge badge-info">{{ $item->category_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($article->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->tag_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{-- {!! $article->content ?? '' !!} --}}
                                {{ $article->title}}
                            </td>
                            <td>
                                <img height="100px" width="100px" src="{{ (!empty($article->featured_photo))?url('uploads/article-featured-image/'.$article->featured_photo):url('uploads/article-featured-image/no-image.png') }}" class="img-fluid img-thumbnail article-photo">
                            </td>
                            <td>
                                {{-- {!! $article->content ?? '' !!} --}}
                                {{ ($article->articleUser!=null)?$article->articleUser->name:'N/A'}}
                            </td>
                            <td>
                                @can('article_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.article.edit', $article->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('article_delete')
                                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.roles.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('role_delete')
  //dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection