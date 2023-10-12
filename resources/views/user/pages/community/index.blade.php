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
                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modelId">Add New Community Post</button> &nbsp; &nbsp;
                @if ($btn)
                    <a href="{{ route('community.index') }}" class="btn btn-info text-light" ><i class="fa fa-home"></i></a>
                @endif
             </div>
             <div class="bbp-breadcrumb mb-2">
                <form role="search" method="get" id="bbp-search-form" action="{{ route('community.index') }}">
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
                           <a class="bbp-forum-title" href="{{ route('community.show',@$community -> id) }}">{{ @$community -> title }}</a>
                           <div class="bbp-forum-content">
                             {{ @$community -> description }}
                           </div>
                        </li>
                        <li class="bbp-forum-topic-count">{{ @$community -> replies() -> count() }}</li>
                        <li class="bbp-forum-reply-count">{{ $community -> views ==NULL ? '0': $community -> views  }}</li>
                        <li class="bbp-forum-freshness">
                            <a class="btn btn-info text-light" href="{{ route('community.show', @$community -> id) }}"><i class="fa fa-eye"></i></a>
                            @if( $community->user_id == Auth::guard('web')->user()->id )



                            <a href="#!" data-modal="modal-1" data-url="{{ url('/community/update') }}" class="author_edit btn btn-warning text-light" data-id="{{ @$community -> id }}"><i class="fa fa-pencil"></i></a>

                            <a href="" class="post_delete btn btn-danger text-light" data-url="{{ url('/community/delete') }}" data-id="{{ @$community->id }}"><i class="fa fa-trash"></i></a>
                             @else
                            @endif

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

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Community Post</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                       <form action="{{ route('community.store') }}" method="POST">
                        @csrf
                        <div class="w-100">
                            <span class="wpcf7-form-control-wrap your-name">
                               <input type="text" name="title" value="{{ old('title') }}"  class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required w-100"  placeholder="Your Title" />
                            </span>
                         </div>
                         <br>
                         <div>
                            <span class="wpcf7-form-control-wrap your-message">
                               <textarea name="description" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea w-100" aria-invalid="false" placeholder="Message"></textarea>
                            </span>
                            <br />
                            <input type="submit" value="Post Now" class="wpcf7-form-control wpcf7-submit" />
                         </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="communityModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark">{{__('Post Updates')}}</h5>
                <button type="button" class="close ticket-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="w-100">
                        <span class="wpcf7-form-control-wrap your-name">
                            <input type="hidden" name="id">
                           <input type="text" name="title" value="{{ old('title') }}"  class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required w-100"  placeholder="Your Title" />
                        </span>
                     </div>
                     <br>
                     <div>
                        <span class="wpcf7-form-control-wrap your-message">
                           <textarea name="description" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea w-100" aria-invalid="false" placeholder="Message">{{ old('description') }}</textarea>
                        </span>
                        <br />
                        <input type="submit" value="Post Now" class="wpcf7-form-control wpcf7-submit" />
                     </div>
                    </form>
            </div>

        </div>
    </div>
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
                });

                $('.author_edit').click(function(e){
                    e.preventDefault();
                    const modal =  $('#communityModal');
                    modal.find('form').attr('action', $(this).data('url'));
                    let id = $(this).data('id');
                    console.log(id);
                    $.ajax({
                        url: '/community/edit/'+id,
                        success: function(output){
                            modal.find('input[name="title"]').val(output.title)
                            modal.find('textarea[name="description"]').val(output.description)
                            modal.find('input[name="id"]').val(output.id)
                            modal.modal('show');
                        }
                    })
                });


            });
        })(jQuery)

    </script>

@endpush
