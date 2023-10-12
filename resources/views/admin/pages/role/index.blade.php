@extends('layouts.apps')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content_wrap with_title">
    <div class="top_panel_title">
       <div class="top_panel_title_inner">
          <h1 class="page_title">All Department</h1>
       </div>
    </div>

           <table class="table" style="text-align: center;">

              <thead style="background-color: #7dddd1;">
                 <tr>
                    <th>SL No.</th>
                    <th>Department Name</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>
               </thead>
                 @foreach( $all_role as $role )
                 <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $role->role_name }}</td>
                    <td>
                    @if( $role->status == true )
                        <span class="badge bg-info">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                    @endif
                    </td>
                    <td>
                        @if( $role->status == true )
                            <a class="btn btn-success" href="{{ route('admin.role.inactive',$role->id) }}"><i class="fa fa-thumbs-o-up"></i></a>
                        @else
                            <a class="btn btn-warning" href="{{ route('admin.role.active',$role->id) }}"><i class="fa fa-thumbs-o-down"></i></a>
                        @endif
                        <a class="btn btn-primary" edit_id = "{{ $role->id }}" id="modal_btn" href="#">Edit</a>
{{--                        &nbsp;--}}
                        <a class="btn btn-danger" href="{{ route('admin.delete.department',$role->id) }}">Delete</a>
                    </td>
                 </tr>
                 @endforeach


           </table>
           <p></p>
{{--        </div>--}}
{{--     </div>--}}
    <!-- </article> class="post_item post_item_single post_format_standard page hentry"> -->
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
 </div>

 <div class="sidebar_wrap sidebar widget_area scheme_original" role="complementary" style="width: 410px;">
    <div class="sidebar_inner widget_area_inner">
       <aside class="widget_number_1 widget widget_birthdays" style="margin-top:30px;">
        <div id="sc_form_227_wrap" class="sc_form_wrap">
            <div id="sc_form_227" class="sc_form sc_form_style_form_1">
               <h4 class="sc_form_title sc_item_title sc_item_title_without_descr">Add New Role</h4>

               <form id="sc_form_227_form" class="sc_input_hover_default inited" data-formtype="form_1" method="POST" action="{{ route('admin.role.store') }}">
                   @csrf
                  <div class="sc_form_info">
                     <div class="sc_form_item sc_form_field label_over">
                        <input id="sc_form_username" type="text" name="role_name" placeholder="Role Name *" aria-required="true">
                     </div>


                  </div>

                  <div class="sc_form_item sc_form_button">
                     <button>Add Role</button>
                  </div>
                  <div class="result sc_infobox"></div>
               </form>
            </div>
         </div>
       </aside>

    </div>
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
