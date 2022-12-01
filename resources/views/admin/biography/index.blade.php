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
  
{{-- Quick Facts Starts Here --}}
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
                                    <th>Order Sequence</th>
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
                    <input type="text"  class="form-control" id="qf_id" name="qf_id" value="0" placeholder=""  hidden required>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Order Sequence <span style="color:red">*</span> </label>
                        <input type="number"  class="form-control" id="seq_no" name="seq_no" value="" placeholder="" required>
                        <span id="error_name" class="has-error"></span>
                    </div>
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
{{-- Quick Facts ends here --}}


{{-- Table of content starts here --}}
  <div class="modal" id="myModal1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ADD Table of Content</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <div class="card-body">
                <div class="table-responsive">
                        <table id="manage_all1" class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th>Order Sequence</th>
                                    <th>Question</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
            <form id='createTOC' action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="needs-validation" novalidate>
                <div class="form-row">
                    <div id="status"></div>
                    <input type="text"  class="form-control" id="articleid" name="articleid" value="" placeholder="" hidden required>
                    <input type="text"  class="form-control" id="toc_id" name="toc_id" value="0" placeholder=""  hidden required>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Order Sequence <span style="color:red">*</span> </label>
                        <input type="number"  class="form-control" id="t_seq_no" name="t_seq_no" value="" placeholder="" required>
                        <span id="error_name" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Question <span style="color:red">*</span> </label>
                        <input type="text"  class="form-control" id="question" name="question" value="" placeholder="" required>
                        <span id="error_name" class="has-error"></span>
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for=""> Answer </label>
                        <textarea type="text" class="ckeditor form-control" id="answer" name="answer" value="" placeholder="" ></textarea>
                        <span id="error_name" class="has-error"></span>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <button id="submit" type="button" class="btn btn-success button-submit" onclick="submitTableOfContent()"
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
{{-- Table of content starts here --}}

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
                                    <span class="badge badge-info ml-2 mt-2">{{ $item->tag_name }}</span>
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
                                <button class="btn btn-xs btn-info" data-toggle="modal" data-val="{{$article->id}}" name="addModel1" id="addModel1" data-target="#myModal1" data-id="{{$article->id}}">
                                    Add TOC
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

{{-- quickfacts ko scripts starts --}}
<script>
  
     $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (event) {
            var myVal = $(event.relatedTarget).data('val');

            //alert(myVal);
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
                {data: 'seq_no', name: 'seq_no'},
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
   //alert(articleId);
   var seq_no = $('#seq_no').val();
   var title = $('#title').val();
   var qfid = $("#qf_id").val();
   var content = $('#content').val();
    //             // myData.append('_token', CSRF_TOKEN);
    //             alert(JSON.stringify(myData));
                var myData = {
                    '_token' : CSRF_TOKEN,
                    'qf_id' : qfid,
                    'articleid' : articleId,
                    'seq_no': seq_no,
                    'title' : title,
                    'content' : content,
                };
             
    $.ajax({ 
        url: "{{ route('admin.biography.insertQuickFact') }}",
        data: myData,
        type: 'post',
        success: function()
        {
            $('[name="seq_no"]').val('');
            $('[name="title"]').val('');
            $('[name="content"]').val('');
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

<script type="text/javascript">
    $(document).ready(function () {
    $("#manage_all").on("click", ".edit", function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('id');
      
                $.ajax({
                    url: "{{ route('admin.biography.quickfact.edit') }}",
                    data: {"_token": CSRF_TOKEN,'id':id},
                   
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {
                        $('[name="qf_id"]').val(id);
                        $('[name="seq_no"]').val(res.seq_no);
                        $('[name="title"]').val(res.title);
                        $('[name="content"]').val(res.content);
                    
                    }
                });
            
        });
   
    });
</script>



{{-- quickfacts ko scripts end --}}

{{-- table of content ko scripts starts --}}
<script>
  
    $(document).ready(function () {
       $('#myModal1').on('show.bs.modal', function (event) {
           var myVal = $(event.relatedTarget).data('val');
           $(this).find(".articleid").val(myVal);
 $("#articleid").val(myVal);

 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 var url = "{!! url('/admin/biography/tableofContent') !!}"
       table = $('#manage_all1').DataTable({
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
               {data: 'seq_no', name: 'seq_no'},
               {data: 'question', name: 'answer'},               
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

function submitTableOfContent() {

   // var myData = new FormData($("#create")[0]);
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  var articleId = $('#articleid').val();
  var seq_no = $('#t_seq_no').val();
  var question = $('#question').val(); 
  var tocid = $("#toc_id").val(); 
  var answer = CKEDITOR.instances['answer'].getData();

   //             // myData.append('_token', CSRF_TOKEN);
   //             alert(JSON.stringify(myData));
               var myData = {
                   '_token' : CSRF_TOKEN,
                   'articleid' : articleId,
                   'seq_no' : seq_no,
                   'question' : question,
                   'answer' : answer,
                   'toc_id' : tocid,
               };
            
   $.ajax({ 
       url: "{{ route('admin.biography.inserttableofContent') }}",
       data: myData,
       type: 'post',
       success: function()
       {
        $('[name="toc_id"]').val('');
            $('[name="t_seq_no"]').val('');
           $('[name="question"]').val('');
           CKEDITOR.instances.answer.setData(''); 
           table = $("#manage_all1").DataTable();
               table.ajax.reload(null, false); 
       }
   });

}
</script>
<script type="text/javascript">

   $(document).ready(function () {
      
   $("#manage_all1").on("click", ".delete", function () {
           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
           var id = $(this).attr('id');
     
               $.ajax({
                   url: "{{ route('admin.biography.tableofContent.delete') }}",
                   data: {"_token": CSRF_TOKEN,'id':id},
                  
                   type: 'POST',
                   dataType: 'json',
                   success: function(res) {
                   
                       table = $("#manage_all1").DataTable();
                           table.ajax.reload(null, false); 
                   }
               });
           
       });
  
   });
</script>

<script type="text/javascript">
    $(document).ready(function () {
    $("#manage_all1").on("click", ".edit", function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var id = $(this).attr('id');
      
                $.ajax({
                    url: "{{ route('admin.biography.tableofContent.edit') }}",
                    data: {"_token": CSRF_TOKEN,'id':id},
                   
                    type: 'POST',
                    dataType: 'json',
                    success: function(res) {
                        $('[name="toc_id"]').val(id);
                        $('[name="t_seq_no"]').val(res.seq_no);
                        $('[name="question"]').val(res.question);
                        CKEDITOR.instances.answer.setData( res.answer, function()
                        {
                            this.checkDirty();  // true
                        });
                    
                    }
                });
            
        });
   
    });
</script>

{{-- table of content ko scripts end --}}


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
       $('.ckeditor').ckeditor();
    });
</script>