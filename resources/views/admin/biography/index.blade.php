@extends('layouts.admin')
@section('content')
@can('article_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.biography.create") }}">
                {{ trans('global.add') }} Biography
            </a>
        </div>
    </div>
@endcan
  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD Quick Facts</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="card-body">
                <div class="table-responsive">
                        <table id="manage_all" class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
            <form id='create' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
                <div class="form-row">
                    <div id="status"></div>
                    <input type="text"  class="form-control" id="articleid" name="articleid" value="" placeholder="" hidden required>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Title <span style="color:red">*</span> </label>
                        <input type="text"  class="form-control" id="title" name="title" value="" placeholder="" required>
                        <span id="error_name" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Content </label>
                        <input type="text" class="form-control" id="content" name="content" value="" placeholder="" >
                        <span id="error_name" class="has-error"></span>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <button id="submit" type="button" class="btn btn-success button-submit" onclick="submitQuickFact()"
                                data-loading-text="Loading..."><span class="fa fa-save fa-fw"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>


<div class="card">
    <div class="card-header">
        Biography List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">
                            S.No
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Title_tag
                        </th>
                        <th>
                            Tags
                        </th>
                        <th>
                            RelationShip Status
                        </th>
                        <th>
                            Birth Date
                        </th>
                        <th>
                            Biography Photo
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
                                {{ $article->title_tag ?? '' }}
                            </td>
                            <td>
                                @foreach($article->tags as $key => $item)
                                    <span class="badge badge-info">{{ $item->tag_name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $article->relationship_status ?? '' }}
                            </td>
                            <td>
                                {{ $article->birth_date ?? '' }}
                            </td>
                            <td>
                                <img height="100px" width="100px" src="{{ (!empty($article->biography_photo))?url('uploads/biography-image/'.$article->biography_photo):url('uploads/biography-image/no-image.png') }}" class="img-fluid img-thumbnail article-photo">
                            </td>
                            <td>
                                {{-- {!! $article->content ?? '' !!} --}}
                                {{ ($article->createdBy!=null)?$article->createdBy->name:'N/A'}}
                            </td>
                            <td>
                                @can('article_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.biography.edit', $article->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('article_delete')
                                    <form action="{{ route('admin.biography.destroy', $article->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                                <button class="btn btn-xs btn-info" data-toggle="modal" data-val="{{$article->id}}" name="addModel" id="addModel" data-target="#myModal" data-id="{{$article->id}}">
                                    Add QF
                                </button>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
  
     $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (event) {
            var myVal = $(event.relatedTarget).data('val');
            $(this).find(".articleid").val(myVal);
  $("#articleid").val(myVal);

  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var url = "{!! url('/admin/biography/quickfacts') !!}"
        table = $('#manage_all').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                "url": url+"/"+myVal,
                "type": "GET",
                headers: {
                    "X-CSRF-TOKEN": CSRF_TOKEN,
                },
                "dataType": 'json'
            },
       
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'title', name: 'title'},
                {data: 'content', name: 'content'},
                
                {data: 'action', name: 'action'}
            ],
            "autoWidth": false,
        });
        $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
            'width': '220px',
            'height': '30px'
        });
});

});

function submitQuickFact() {

    // var myData = new FormData($("#create")[0]);
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   var articleId = $('#articleid').val();
   var title = $('#title').val();
   var content = $('#content').val();
    //             // myData.append('_token', CSRF_TOKEN);
    //             alert(JSON.stringify(myData));
                var myData = {
                    '_token' : CSRF_TOKEN,
                    'articleid' : articleId,
                    'title' : title,
                    'content' : content,
                };
             
    $.ajax({ 
        url: "{{ route('admin.biography.insertQuickFact') }}",
        data: myData,
        type: 'post',
        success: function()
        {
            document.getElementById("create").reset();
            table = $("#manage_all").DataTable();
                table.ajax.reload(null, false); 
        }
    });

}
</script>
<script type="text/javascript">

    $(document).ready(function () {
       
    $("#manage_all").on("click", ".delete", function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('id');
      
                $.ajax({
                    url: "{{ route('admin.biography.quickfact.delete') }}",
                    data: {"_token": CSRF_TOKEN,'id':id},
                   
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {
                    
                        table = $("#manage_all").DataTable();
                            table.ajax.reload(null, false); 
                    }
                });
            
        });
   
    });
</script>