<div class="sc_column_item sc_column_item_2">

    <div class="sc_section sc_section_block">
       <div class="sc_section_inner">
          <div class="sc_section_content_wrap">
             <h2 class="sc_title sc_title_regular"> Community </h2>
             <div id="sc_projects_297_wrap" class="sc_projects_wrap">
                <div id="sc_projects_297" class="sc_projects">

                    @forelse ($communities as $community)
                    <div id="sc_projects_297_1" >
                        <div class="sc_projects_item_content">
                           <h4 class="sc_projects_item_title">
                              <a href="{{ route('admin.community.show' , $community->id) }}">{{ $community -> title }}</a>
                           </h4>
                           <div class="sc_projects_item_description">
                              <p>{{ $community -> description }}</p>
                              <small class="font-bold text-danger text-sm"><b>Comments {{ $community -> replies -> count() }}</b></small>
                           </div>
                        </div>
                     </div>
                     <hr>
                    @empty
                    <div id="sc_projects_297_1" >
                        <div class="sc_projects_item_content">
                           <h4 class="sc_projects_item_title">
                              <a href="single-post.html">{{ __('No Post Publish Yet') }}</a>
                           </h4>
                        </div>
                     </div>
                    @endforelse

                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
