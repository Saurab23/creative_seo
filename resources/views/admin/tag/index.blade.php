@extends('layouts.admin')
@section('content')
@can('tag_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.tag.create") }}">
                Add Tags
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Tag List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Subject">
                <thead>
                    <tr>
                       
                        <th>
                           SNo.
                        </th>
                        <th>
                            Tag Name
                        </th>
                        <th>
                            Slug
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                     {{$sno=1}}
                    @foreach($tags as $key => $t)
                        <tr data-entry-id="{{ $t->id }}">
                           
                            <td>
                                {{$sno++}}
                            </td>
                            <td>
                                {{ $t->tag_name ?? '' }}
                            </td>
                            <td>
                                {{ $t->slug ?? '' }}
                            </td>
                            <td>
                                @can('tag_show')
                                    <a class="btn btn-xs btn-primary" hidden href="{{ route('admin.tag.show', $t->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('tag_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tag.edit', $t->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tag_delete')
                                    <form action="{{ route('admin.tag.destroy', $t->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('subject_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.subjects.massDestroy') }}",
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
 // dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Subject:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection