@extends('layouts.apps')
@section('main')

    <div class="content_wrap with_title">
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>File Edit</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.file.update',$edit->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-4">
                            <label for=""><strong>Title</strong></label>
                            <input name="title" class="form-control" type="text" value="{{ $edit->title }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for=""><strong>Short Text</strong></label>
                            <textarea class="form-control" name="short_text" id="" cols="30" rows="10">{!! $edit->short_text !!}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for=""><strong>Name</strong></label>
                            <input name="name" class="form-control" type="text" value="{{ $edit->name }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for=""><strong>Email</strong></label>
                            <input name="email" class="form-control" type="text" value="{{ $edit->email }}">
                        </div>
                        <div class="form-group mb-4">
                            <label for=""><strong>Message</strong></label>
                            <textarea class="form-control" name="message" id="" cols="30" rows="10">{!! $edit->message !!}</textarea>
                        </div>
                        <div class="form-group mb-4">
                            <label for=""><strong>Department</strong></label>
                            <select name="dept" class="form-control" name="dept" id="">
                                <option value="">-Choose Department-</option>
                                @foreach( $edit_role as $role )
                                <option {{ $edit->role_id == $role->id ? 'selected':'' }} value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label for=""><strong>File</strong></label><br>
                            <input name="old_file" value="{{ $edit->file }}" type="hidden">
                            <input name="file" class="form-control-file" type="file">
                        </div>
                        <div class="form-group mb-4">
                            <input class="btn btn-success" type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
