@extends('layouts.apps')
@section('main')

    <div class="content_wrap">
       <div class="row">
           <div class="col-md-6">
               <div class="card">
                   <div class="card-header" style="background-color: #7dddd1;padding-top: 20px;">
                       <h2>Profile Update</h2>
                   </div>
                   <div class="card-body">



                       <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                           <div class="form-group mb-4">
                               <input type="hidden" name="id" value="{{ @$profile -> id }}">
                               <input name="name" value="{{ old('name' , @$profile -> name) }}"  class="form-control" placeholder="Your Name" type="text">
                           </div>
                           <div class="form-group mb-4">
                               <input name="email" value="{{ old('email' , @$profile -> email ) }}" class="form-control" placeholder="Email Address" type="text">
                           </div>
                           <div class="form-group mb-4">
                               <input name="phone" value="{{ old('phone' , @$profile -> phone) }}" class="form-control" placeholder="Your Phone" type="text">
                           </div>


                            <div class="form-group mb-4">
                                <input name="fb_link" value="{{ old('fb_link' , @$profile -> fb_link) }}" class="form-control" placeholder="Your Facebook Link" type="text">
                            </div>

                            <div class="form-group mb-4">
                                <input name="twitter_link" value="{{ old('twitter_link' , @$profile -> twitter_link) }}" class="form-control" placeholder="Your Twitter Link" type="text">
                            </div>

                            <div class="form-group mb-4">
                                <input name="linkdin_link" value="{{ old('linkdin_link' , @$profile -> linkdin_link) }}" class="form-control" placeholder="Your Linkdin Link" type="text">
                            </div>

                            <div class="form-group mb-4">
                                <input name="profession" value="{{ old('profession' , @$profile -> profession) }}" class="form-control" placeholder="Your Profession" type="text">
                            </div>

                            <div class="form-group mb-4">
                                <label for="">Profile Photo</label>
                                <input name="old_photo" value="{{ @$profile -> photo }}" type="hidden">
                                <input name="photo" id="profileImageInput" class="form-control" type="file">
                                <img  id="ProfileUpdateImage" src="{{ @$profile -> photo  ? asset('admin/image/user/'.@$profile->photo) : asset('images/index67.png') }}" style="width:100px; height:100px;" class="mt-2" alt="">
                            </div>


                           <br>
                           <div class="form-group">
                               <input class="btn btn-success" type="Submit" value="Update Profile">
                           </div>
                       </form>
                   </div>
               </div>
           </div>
           <div class="col-md-6">
               <div class="card text-center mb-4 justify-content-center">
                <div class="card-header" style="background-color: #7dddd1;padding-top: 20px;">
                    <img src="{{ $profile -> photo  ? asset('admin/image/user/'.$profile->photo) : asset('images/index67.png') }}" style="object-fit: cover; height: 100px; width:100px; border-radius:50%;" alt="">
                </div>
                 <div class="card-body">
                   <h4 class="card-title">{{ @$profile -> name }}</h4>
                   <p class="card-text">{{ @$profile -> profession }}</p>
                   <p>{{ @$profile -> email }}</p>
                   <p>{{ @$profile -> phone }}</p>

                 <div class="sc_socials sc_socials_type_images sc_socials_shape_square sc_socials_size_small">
                    <div class="sc_socials_item">
                       <a href="{{ @$profile -> fb_link }}" target="_blank" class="social_icons social_twitter">
                       <span class="sc_socials_hover"></span>
                       </a>
                    </div>

                    <div class="sc_socials_item">
                       <a href="{{ @$profile -> linkdin_link }}" target="_blank" class="social_icons social_linkdin">
                       <span class="sc_socials_hover"></span>
                       </a>
                    </div>
                    <div class="sc_socials_item">
                       <a href="{{ @$profile -> twitter_link }}" target="_blank" class="social_icons social_facebook">
                       <span class="sc_socials_hover"></span>
                       </a>
                    </div>
                 </div>
                 </div>
               </div>
               <div class="card mt-2" >
                   <div class="card-header" style="background-color: #7dddd1;">
                       <h4>Change Password</h4>
                   </div>
                   <div class="card-body">

                       <form action="{{ route('admin.profile.passwordChange') }}" method="POST">
                         @csrf
                           <div class="form-group">
                               <label for="">Old Password</label>
                               <input name="old_password" class="form-control" type="password">
                           </div>
                           <div class="form-group">
                               <label for="">New Password</label>
                               <input name="password" class="form-control" type="password">
                           </div>

                           <div class="form-group">
                               <label for="">Confirm Password</label>
                               <input name="password_confirmation" class="form-control" type="password">
                           </div>
                           <br>
                           <div class="form-group">
                               <input class="btn btn-success" type="submit" value="Change Password">
                           </div>
                       </form>
                   </div>
               </div>
               <br>

               <a class="btn btn-block btn-danger w-100 btn-lg text-light logoutBtn" href="{{ route('profile.logout') }}">Logout</a>

           </div>
       </div>
   </div>



@endsection
@push('scripts')
<script>
    (function($){
        $(document).ready(function(){
            let imgPreview = (input,img,width='100px',height='100px') => {
            $(input).change(function(e){
                e.preventDefault();
                $url = URL.createObjectURL(e.target.files[0]);
                $(img).attr('src',$url).css('width',width),css('height',height).css('margin','10px 0px');
            });
            }
            // profile image preview load
            imgPreview('#profileImageInput' , '#ProfileUpdateImage');


        });
    })(jQuery)
</script>


@endpush
