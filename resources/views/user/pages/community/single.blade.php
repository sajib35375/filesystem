@extends('layouts.apps')
@section('main')


<div class="content_wrap with_title">
    <div class="top_panel_title">
       <div class="top_panel_title_inner">
          <h1 class="page_title">{{ @$community -> title }}</h1>
       </div>
    </div>

    <div class="vc_row wpb_row vc_row-fluid">
        <div class="wpb_column vc_column_container vc_col-sm-12">
           <div class="vc_column-inner">
              <div class="wpb_wrapper">
                 <div class="sc_section sc_section_block">
                    <div class="sc_section_inner">
                       <div class="sc_section_overlay">
                          <div class="sc_section_content padding_on">
                             <div class="sc_section_content_wrap">
                                <h3 class="sc_title sc_title_regular">Reply In This Post</h3>
                                <div class="vc_empty_space hem_1-5">
                                   <span class="vc_empty_space_inner"></span>
                                </div>
                                {{-- <div role="form" class="wpcf7" id="wpcf7-f2324-p2325-o1" lang="en-US" dir="ltr"> --}}
                                   <div class="screen-reader-response"></div>
                                   <form action="{{ route('community.reply', @$community -> id) }}" method="post" class="wpcf7-form">
                                    @csrf

                                      <div>
                                         <span class="wpcf7-form-control-wrap your-message">
                                            <textarea name="message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea>
                                         </span>
                                         <br />
                                         <input type="submit" value="Reply" class="wpcf7-form-control wpcf7-submit" />
                                      </div>
                                      <div class="wpcf7-response-output wpcf7-display-none"></div>
                                   </form>
                                </div>
                             {{-- </div> --}}
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>

    <br>

    <article class="post_item post_item_single post_format_standard post-2356 topic type-topic hentry">
       <section class="post_content">
          <div id="bbpress-forums">
             <div class="bbp-breadcrumb">
                <p>
                    <a href="{{ route('home') }}" class="bbp-breadcrumb-home">Home</a>
                    <span class="bbp-breadcrumb-sep">›</span>
                    <a href="{{ route('community.index') }}" class="bbp-breadcrumb-root">Community</a>
                    <span class="bbp-breadcrumb-sep">›</span>
                    <a href="#" class="bbp-breadcrumb-forum">{{ @$community -> title }}</a>

                </p>
             </div>
             <div class="bbp-template-notice info">
                <p class="bbp-topic-description">This Post contains {{ @$community -> replies() -> count() }} replies
                   <a href="single-team.html" title="View {{ $community -> user -> name }}s profile" class="bbp-author-avatar" rel="nofollow">
                   <img src="{{asset('admin/image/user/'.$community -> user -> photo)}}" class="avatar user-4-avatar avatar-14 photo" alt="" width="14" height="14"></a>&nbsp;
                   <a href="/" title="View {{ $community -> user -> name }}'s profile" class="bbp-author-name" rel="nofollow">{{ $community -> user -> name }}</a>
                   <a href="#" title="Reply To: At vero eos et accusamus">{{ @$community -> created_at -> diffForHumans() }}</a>.
                </p>
             </div>

             <ul id="topic-2356-replies" class="forums bbp-replies">
                <li class="bbp-header">
                   <div class="bbp-reply-author">Author</div>
                   <div class="bbp-reply-content">
                      Posts
                   </div>
                </li>


                <li class="bbp-body">

                   <div id="post-2356" class="bbp-reply-header">
                      <div class="bbp-meta">
                         <span class="bbp-reply-post-date">{{ date( "F j , Y, g:i a" , strtotime(@$community -> created_at)) }}</span>
                         <a href="#" class="bbp-reply-permalink">#000{{ @$community -> id }}</a>
                         <span class="bbp-admin-links"></span>
                      </div>
                   </div>
                   <div class="bbp-parent-forum-2352 bbp-parent-topic-2356 bbp-reply-position-1 user-id-1 topic-author post-2356 topic type-topic hentry">
                      <div class="bbp-reply-author">
                         <a href="single-team.html" title="View {{ $community -> user -> name }}'s profile" class="bbp-author-avatar" rel="nofollow">
                          <img src="{{asset('admin/image/user/'.$community -> user -> photo)}}" class="avatar photo" alt="" width="80" height="80">
                         </a>
                         <br>
                          <a href="single-team.html" title="View {{ $community -> user -> name }}'s profile" class="bbp-author-name" rel="nofollow">{{ $community -> user -> name }}</a>
                          <br>
                          @foreach ( $community -> user -> roles  as $role)
                          <div class="bbp-author-role d-inline-block">{{ $role -> role_name }} |</div>
                          @endforeach
                      </div>
                      <div class="bbp-reply-content">
                         <p>
                            {{ @$community -> description }}
                         </p>
                      </div>
                   </div>






                   @foreach ($rplies as $reply)
                   <div class="bbp-reply-header">
                    <div class="bbp-meta">
                       <span class="bbp-reply-post-date">{{ date( "F j , Y, g:i a" , strtotime(@$reply -> created_at)) }}</span>
                       <a href="#" class="bbp-reply-permalink">#1111{{ @$reply -> id }}</a>
                       <span class="bbp-admin-links"></span>
                    </div>
                 </div>
                 <div class="even bbp-parent-forum-2352 bbp-parent-topic-2356 bbp-reply-position-2 user-id-6 post-2357 reply type-reply hentry">
                    <div class="bbp-reply-author">
                        <a href="single-team.html" title="View {{ $reply -> user -> name }}'s profile" class="bbp-author-avatar" rel="nofollow">
                         <img src="{{asset('admin/image/user/'.$reply -> user -> photo)}}" class="avatar photo" alt="" width="80" height="80">
                        </a>
                        <br>
                         <a href="single-team.html" title="View {{ $reply -> user -> name }}'s profile" class="bbp-author-name" rel="nofollow">{{ $community -> user -> name }}</a>
                         <br>
                         @foreach ( $reply -> user -> roles  as $role)
                         <div class="bbp-author-role d-inline-block">{{ $role -> role_name }} |</div>
                         @endforeach
                     </div>
                    <div class="bbp-reply-content">
                       <blockquote>
                           <p>{{ @$reply -> description }}</p>
                       </blockquote>
                    </div>
                 </div>
                   @endforeach




                </li>
                <li class="bbp-footer">
                   <div class="bbp-reply-author">Author</div>
                   <div class="bbp-reply-content">
                      Posts
                   </div>
                </li>
             </ul>




         <br>


          </div>
       </section>
    </article>




    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
 </div>
@endsection
