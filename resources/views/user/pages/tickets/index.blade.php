@extends('layouts.apps')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content_wrap with_title">
    <div class="top_panel_title">
       <div class="top_panel_title_inner">
          <h1 class="page_title">All Files</h1>
       </div>
    </div>

           <table class="table" style="text-align: center;">

              <thead style="background-color: #7dddd1;">
                 <tr>
                    <th>SL No.</th>
                    <th>Sender Details</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Action</th>
                 </tr>
               </thead>
                 @foreach( $files as $file )
                 <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ @$file->name }}<br>{{ @$file -> email }}</td>
                    <td>{{ @$file -> title }}</td>
                    <td>{{ Str::limit(@$file -> message , 50)}}</td>
                    <td>
                        <a class="btn btn-primary text-light"  href="{{ route('file.file.download',$file->file) }}"><i class="fa fa-download"></i></a>
                        <a class="btn btn-danger text-light" href="{{ route('single.file',$file->id) }}"><i class="fa fa-eye"></i></a>
                    </td>
                 </tr>
                 @endforeach


           </table>
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
 </div>



    <div id="modal_id" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Department</h2>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update.department') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Department</label>
                            <input name="department" class="form-control" type="text">
                            <input name="update_id" type="hidden">
                        </div>
                        <br>
                        <div class="form-group">
                            <input id="submit" class="btn btn-sm btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function ($){
            $(document).ready(function (){
                $(document).on('click','#modal_btn',function (e){
                    e.preventDefault();
                  let id = $(this).attr('edit_id')
                    // alert(id);
                    $.ajax({
                        url:'department/edit/'+id,
                        success:function (data){
                            jQuery("#modal_id").modal('show');
                            jQuery("#modal_id input[name='department']").val(data.role_name);
                            jQuery("#modal_id input[name='update_id']").val(data.id);
                        }
                    })


                })


            })
        })(jQuery)



    </script>



@endsection
