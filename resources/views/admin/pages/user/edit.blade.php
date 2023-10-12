@extends('layouts.apps')
@section('main')

    <div class="content_wrap">
       <div class="row">
           <div class="col-md-6">
               <div class="card">
                   <div class="card-header" style="background-color:  #7dddd1;">
                       <h2>Edit User: {{ $edit_users->name }}</h2>
                   </div>
                   <div class="card-body">

                       <form action="{{ route('admin.user.update',$edit_users->id) }}" method="POST" enctype="multipart/form-data">
                           @csrf

                            <div class="form-group">
                                <label for="">Name</label>
                                <input name="name" value="{{ $edit_users->name }}" class="form-control" type="text">
                            </div>
                           <div class="form-group">
                               <label for="">Email</label>
                               <input name="email" value="{{ $edit_users->email }}" class="form-control" type="text">
                           </div>
                           <div class="form-group">
                               <label for="">Phone</label>
                               <input name="phone" value="{{ $edit_users->phone }}" class="form-control" type="text">
                           </div>

                           <div class="form-group">
                               <label for="">Photo</label>
                               <input name="old_photo" value="{{ $edit_users->photo }}" type="hidden">
                               <input name="photo" class="form-control-file" type="file">
                           </div>

                           @php
                               $edit_arr = [];
                               foreach($edit_users->roles as $erole){
                                   array_push($edit_arr,$erole->id);
                               }

                           @endphp

                           <div class="form-group">
                               @foreach($roles as $role)
                               <input value="{{ $role->id }}" {{ in_array($role->id,$edit_arr) ? 'checked="checked"':'' }} id="role_{{ $role->id }}" name="role[]" type="checkbox"><label for="#role_{{ $role->id }}">{{ $role->role_name }}</label>
                                   <br>
                               @endforeach
                           </div>

                           <div class="form-group" style="margin-top: 30px;">
                               <input value="Update" class="btn btn-primary" type="submit">
                           </div>

                       </form>

                   </div>
               </div>
           </div>
       </div>
   </div>










@endsection
