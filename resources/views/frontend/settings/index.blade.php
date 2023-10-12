@extends('layouts.apps')
@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="content_wrap" >
        <div class="row" >
            <div class="col-md-8" style="display: block;margin-left: 200px;margin-top: -50px;">
                <div class="card">
                    <div class="card-header" style="background-color: #7dddd1;padding-top: 20px;">
                        <h2>General Setting</h2>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('admin.general.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="">Logo</label>
                                <img id="img" style="width: 100px;height: 100px;" src="{{ URL::to('') }}/admin/setting/{{ @$edit->logo }}" alt="">
                                <input name="logo" class="form-control-file" type="file">
                                <input name="old_logo" value="{{ @$edit->logo }}" type="hidden">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Address</label>
                                <input value="{{ @$edit->address }}" name="address" class="form-control" type="text">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Email</label>
                                <input value="{{ @$edit->email }}" name="email" class="form-control" type="text">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Phone</label>
                                <input value="{{ @$edit->phone }}" name="phone" class="form-control" type="text">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">About</label>
                                <textarea class="form-control" name="about" id="" cols="30" rows="10">{{ @$edit->about }}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <div class="d-grid">
                                    <button class="btn btn-success" type="submit">Submit</button>
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
            jQuery(document).on('change','input[name="logo"]',function (e){
                let url = URL.createObjectURL(e.target.files[0]);
                jQuery('img#img').attr('src',url);
            })
        })
    </script>


@endsection
