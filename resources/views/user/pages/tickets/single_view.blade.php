@extends('layouts.app')
@section('main')

    <div class="content_wrap with_title">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $single_file->role->role_name }}</h2>
                    </div>
                    <div class="card-body">
                        @if (pathinfo($single_file->file, PATHINFO_EXTENSION) == 'pdf')
                            <iframe style="width: 100%;" src="{{ URL::to('') }}/admin/file/{{ $single_file->file }}" frameborder="0"></iframe>
                        @else
                            <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{ URL::to('') }}/admin/file/{{ $single_file->file }}" frameborder="0" style="width: 100%; min-height: 562px;"></iframe>
                        @endif
                        <p>{{ $single_file->short_text  }}</p>
                        <p>{{ $single_file->message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>












@endsection
