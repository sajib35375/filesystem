@extends('layouts.apps')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <div class="content_wrap with_title">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="background-color: #7dddd1;padding-top: 10px;">
                    <h2>All Files</h2>
                </div>
                <div class="card-body">



                    <table id="dataTable" class="table table-striped">
                        <select name="department">
                            <option value="">Choose</option>
                            @foreach( $all_dept as $dept )
                                <option value="{{ $dept->id }}">{{ $dept->role_name }}</option>
                            @endforeach
                        </select>
                        <thead style="background-color: #7dddd1;padding-top: 20px;">

                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="filter">
                        @foreach( $all_file as $file )
                            <tr>
                                <td id="index">{{ $loop->index+1 }}</td>
                                <td id="name">{{ $file->name }}</td>
                                <td id="email">{{ $file->email }}</td>
                                <td id="role">{{ $file->role->role_name }}</td>
                                <td id="title">{{ $file->title }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.single.file',$file->id) }}">view</a>
                                    <a class="btn btn-success" href="{{ route('admin.file.edit',$file->id) }}">Edit</a>
                                    <a class="btn btn-danger" href="{{ route('admin.file.delete',$file->id) }}">Delete</a>
                                    <a target="_blank" class="btn btn-warning" href="{{ route('admin.file.download',$file->file) }}">Download</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="background-color: #7dddd1;padding-top: 10px;">
                        <h2>Add New File</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.file.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="name" class="form-control" type="text" placeholder="Name"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="email" class="form-control" type="text" placeholder="Email"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input name="title" class="form-control" type="text" placeholder="Title"><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="short_text" class="form-control" type="text" placeholder="Short-Text"><br>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <textarea name="message" id="" cols="30" rows="10">Message</textarea><br>
                                    </div>
                                    <div class="col-md-6">
                                        <input name="file" class="form-control-file" type="file"><br>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                   <div class="row">
                                       <div class="col-md-6">
                                           <select class="form-control" name="dept" id="">
                                               <option value="">Choose Department</option>
                                               @foreach($all_dept as $dept)
                                                   <option value="{{ $dept->id }}">{{ $dept->role_name }}</option>
                                               @endforeach
                                           </select><br><br>
                                       </div>
                                   </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-md-12" style="margin-top: 25px;">
                                        <div class="d-grid">
                                            <button class="btn btn-success" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>



    <script>
        jQuery(document).ready(function (){
            jQuery('#dataTable').DataTable();




            jQuery(document).on('change','select[name="department"]',function (){
                let id = $(this).val();
                if (id){
                    jQuery.ajax({
                        url:"{{ url('/dashboard/file/filter') }}/"+id,
                        method:"GET",
                        dataType:"json",
                        success:function (data){

                            var d = '';
                            var i = 1;
                            jQuery.each(data,function (key,value){


                                // for download
                                var url = '{{ route("admin.file.download", ":id") }}';
                                url = url.replace(':id', value.file);
                                // for view
                                var url1 = '{{ route('admin.single.file',":id") }}';
                                url1 = url1.replace(':id',value.id);
                                // for edit
                                var url2 = '{{ route('admin.file.edit',":id") }}';
                                url2 = url2.replace(':id',value.id);
                                // for delete
                                var url3 = '{{ route('admin.file.delete',":id") }}';
                                url3 = url3.replace(':id',value.id);




                                d += `
                                <tr>
                                    <td>1</td>
                                    <td>${value.name}</td>
                                    <td>${value.email}</td>
                                    <td>${value.role.role_name}</td>
                                    <td>${value.title}</td>
                                    <td>
                                        <a class="btn btn-primary" href="${url1}">view</a>
                                        <a class="btn btn-success" href="${url2}">Edit</a>
                                        <a class="btn btn-danger" href="${url3}">Delete</a>
                                        <a target="_blank" class="btn btn-warning" href="${url}">Download</a>
                                    </td>
                                </tr>

                                `;
                            });
                            jQuery('tbody#filter').html(d);
                        }
                    });
                }else{
                    jQuery.ajax({
                        url:"{{ url('/dashboard/show/all/file/') }}",
                        method:"GET",
                        dataType:"json",
                        success:function (data){
                            // console.log(data)
                            var d = '';
                            var i = 1;
                            jQuery.each(data,function (key,value){
                                var url = '{{ route("admin.file.download", ":id") }}';
                                url = url.replace(':id', value.file);
                                var url1 = '{{ route('admin.single.file',":id") }}';
                                url1 = url1.replace(':id',value.id);

                                // for edit
                                var url2 = '{{ route('admin.file.edit',":id") }}';
                                url2 = url2.replace(':id',value.id);

                                // for delete
                                var url3 = '{{ route('admin.file.delete',":id") }}';
                                url3 = url3.replace(':id',value.id);


                                d += `
                                <tr>
                                    <td>1</td>
                                    <td>${value.name}</td>
                                    <td>${value.email}</td>
                                    <td>${value.role.role_name}</td>
                                    <td>${value.title}</td>
                                    <td>
                                        <a class="btn btn-primary" href="${url1}">view</a>
                                        <a class="btn btn-success" href="${url2}">Edit</a>
                                        <a class="btn btn-danger" href="${url3}">Delete</a>
                                        <a target="_blank" class="btn btn-warning" href="${url}">Download</a>
                                    </td>
                                </tr>

                                `;
                            });
                            jQuery('tbody#filter').html(d);
                        }
                    });
                }
            });

        });



    </script>






    <style>
        .dataTables_filter {
            width: 50%;
            float: right;
            text-align: right;
        }
        div.dataTables_paginate {
            text-align: right;
        }
        .dataTables_length {
            display: none;
        }
    </style>






    <script>
        jQuery(document).ready(function (){
             jQuery('#dataTable').DataTable();


        })
    </script>




 @endsection
 @push('scripts')
     <script>
         let sc_tabs_content = document.querySelectorAll('.sc_tabs_content');
         document.querySelectorAll('.theme_button').forEach(btn => {
            btn.addEventListener('click' , function(e){
            e.preventDefault(); let id = '';
            id = this.getAttribute('href')
            sc_tabs_content.forEach(content => {
                let content_id = content.getAttribute('id');
                if(content_id == id){
                    content.className = "first"
                }else{
                    // content.classList.remove('first')
                }
            })
         })
        })
     </script>
 @endpush

