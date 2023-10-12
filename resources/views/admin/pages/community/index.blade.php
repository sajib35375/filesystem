@extends('layouts.apps')
@section('main')
<div class="content_wrap with_title">
    <div class="top_panel_title">
       <div class="top_panel_title_inner">
          <h1 class="page_title">Micro Office</h1>
       </div>
    </div>

    <article class="post_item post_item_single post_format_standard forum type-forum hentry">
       <section class="post_content">
          <div id="bbpress-forums">

             <div class="bbp-search-form d-flex mb-2">
                @if ($btn)
                    <a href="{{ route('admin.community.index') }}" class="btn btn-info text-light" ><i class="fa fa-home"></i></a>
                @endif
             </div>
             <div class="bbp-breadcrumb mb-2">
                <form role="search" method="GET" id="bbp-search-form" action="{{ route('admin.community.index') }}">
                    @csrf
                    <div>
                       <label class="screen-reader-text hidden" for="bbp_search">Search for:</label>
                       <input tabindex="101" type="text" value="" name="search" id="bbp_search" />
                       <input tabindex="102" class="button" type="submit" id="bbp_search_submit" value="Search" />
                    </div>
                 </form>
             </div>
             <ul class="bbp-forums">
                <li class="bbp-header">
                   <ul class="forum-titles">
                      <li class="bbp-forum-info">Post</li>
                      <li class="bbp-forum-topic-count">Reply</li>
                      <li class="bbp-forum-reply-count">View</li>
                      <li class="bbp-forum-freshness">Action</li>
                   </ul>
                </li>
                <!-- .bbp-header -->
                <li class="bbp-body">
                    @forelse ($communitys as $community)
                    <ul class="loop-item-0 odd bbp-forum-status-open bbp-forum-visibility-publish forum type-forum hentry">
                        <li class="bbp-forum-info">
                           <a class="bbp-forum-title" href="{{ route('admin.community.show', @$community -> id) }}">{{ @$community -> title }}</a>
                           <div class="bbp-forum-content">
                             {{ @$community -> description }}
                           </div>
                        </li>
                         <li class="bbp-forum-topic-count">{{ @$community -> replies() -> count() }}</li>
                        <li class="bbp-forum-reply-count">{{ $community -> views == NULL ? '0' : $community -> views }}</li>
                        <li class="bbp-forum-freshness">
                            @if( $community->status == true )
                            <a class="btn btn-success text-light" href="{{ route('admin.community.status',$community->id) }}"><i class="fa fa-thumbs-o-up"></i></a>
                        @else
                            <a class="btn btn-warning text-light" href="{{ route('admin.community.status',$community->id) }}"><i class="fa fa-thumbs-o-down"></i></a>
                        @endif


                        <a href="" class="post_delete btn btn-danger text-light" data-url="{{ url('/dashboard/community/delete') }}" data-id="{{ @$community->id }}"><i class="fa fa-trash"></i></a>

                        </li>
                     </ul>

                    @empty

                    @endforelse




                </li>
                <li class="bbp-footer">
                   <div class="tr">
                      <p class="td colspan4">&nbsp;</p>
                   </div>
                </li>


             </ul>
          </div>
          {{ $communitys -> links() }}
       </section>
    </article>
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
 </div>


@endsection

@push('scripts')

    <script>
        "use-strict";
        (function($){
            $(document).ready(function(){
                $('.post_delete').click(function(e){
                    e.preventDefault();
                    const deletemodal = $('#deleteModal');
                    deletemodal.find('form').attr('action' , $(this).data('url'))
                    deletemodal.find('input[name="id"]').val($(this).data('id'))
                    deletemodal.modal('show');
                })
            });
        })(jQuery)

    </script>

@endpush
