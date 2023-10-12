@extends('layouts.apps')
@section('main')


<div class="content_wrap with_title">
    <div class="top_panel_title">
       <div class="top_panel_title_inner">
          <h1 class="page_title">{{ @$community -> title }}</h1>
       </div>
    </div>


    <article class="post_item post_item_single post_format_standard post-2356 topic type-topic hentry">
       <section class="post_content">
          <div id="bbpress-forums">
             <div class="bbp-breadcrumb">
                <p>
                    <a href="{{ route('admin.dash') }}" class="bbp-breadcrumb-home">Home</a>
                    <span class="bbp-breadcrumb-sep">›</span>
                    <a href="{{ route('admin.community.index') }}" class="bbp-breadcrumb-root">Community</a>
                    <span class="bbp-breadcrumb-sep">›</span>
                    <a href="#" class="bbp-breadcrumb-forum">{{ @$community -> title }}</a>

                </p>
             </div>
             <div class="bbp-template-notice info">
                <p class="bbp-topic-description">This Post contains {{ @$community -> replies() -> count() }} replies
                   <a href="" title="View {{ $community -> user -> name }}s profile" class="bbp-author-avatar" rel="nofollow">
                   <img src="{{asset('uploads/general/'.$community -> user -> photo)}}" class="avatar user-4-avatar avatar-14 photo" alt="" width="14" height="14"></a>&nbsp;
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
                          <img src="{{asset('uploads/general/'.$community -> user -> photo)}}" class="avatar photo" alt="" width="80" height="80">
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
                         <img src="{{asset('uploads/general/'.$reply -> user -> photo)}}" class="avatar photo" alt="" width="80" height="80">
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


             @if ($rplies->hasPages())
             <div class="pagination-wrapper">
                     {{ $rplies->links() }}
             </div>
         @endif

         <br>


          </div>
       </section>
    </article>




    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
 </div>
@endsection
