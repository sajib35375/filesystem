@extends('layouts.apps')
@section('main')
<div class="content_wrap with_title">
    <div class="top_panel_title">
       <div class="top_panel_title_inner">
          <h1 class="page_title">Team Leaders</h1>
       </div>
    </div>
    <article class="post_item post_item_single post_format_standard page hentry">
       <section class="post_content">
          <div class="vc_row wpb_row vc_row-fluid">
             <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                   <div class="wpb_wrapper">
                      <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2" data-equal-height=".sc_column_item">
                         <div class="column-1_2 sc_column_item sc_column_item_1 odd first" style="height: 403px;">
                            <div class="sc_section sc_section_block fullheight">
                               <div class="sc_section_inner">
                                  <div class="sc_section_content_wrap">
                                     <div class="vc_empty_space hpx_15">
                                        <span class="vc_empty_space_inner"></span>
                                     </div>
                                     <blockquote class="sc_quote">
                                        <p>{{ @$admin_profile -> profession }}</p>
                                        <p class="sc_quote_title">- {{ @$admin_profile -> name }}</p>
                                        <p class="sc_quote_title">- {{ @$admin_profile -> email }}</p>
                                        <p class="sc_quote_title">- {{ @$admin_profile -> phone }}</p>
                                     </blockquote>
                                     <div class="vc_empty_space hem_2-5">
                                        <span class="vc_empty_space_inner"></span>
                                     </div>

                                     <div class="sc_socials sc_socials_type_images sc_socials_shape_square sc_socials_size_small">
                                        <div class="sc_socials_item">
                                           <a href="{{ @$admin_profile -> twitter_link }}" target="_blank" class="social_icons social_twitter">
                                           <span class="sc_socials_hover"></span>
                                           </a>
                                        </div>

                                        <div class="sc_socials_item">
                                           <a href="{{ @$admin_profile -> linkdin_link }}" target="_blank" class="social_icons social_linkdin">
                                           <span class="sc_socials_hover"></span>
                                           </a>
                                        </div>
                                        <div class="sc_socials_item">
                                           <a href="{{ @$admin_profile -> fb_link }}" target="_blank" class="social_icons social_facebook">
                                           <span class="sc_socials_hover"></span>
                                           </a>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="column-1_2 sc_column_item sc_column_item_2" style="height: 403px;">
                            <div class="sc_section sc_section_block">
                               <div class="sc_section_inner">
                                  <div class="sc_section_overlay">
                                     <div class="sc_section_content padding_on">
                                        <div class="sc_section_content_wrap">
                                            <img style="width:100%; height:300px;" src="{{ @$admin_profile -> photo  ? asset('admin/image/user/'.@$admin_profile->photo) : asset('images/index67.png') }}">
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="vc_empty_space hpx_30">
                         <span class="vc_empty_space_inner"></span>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="vc_row wpb_row vc_row-fluid">
             <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner">
                   <div class="wpb_wrapper">
                      <div class="sc_section sc_section_block team_bg">
                         <div class="sc_section_inner">
                            <div class="sc_section_overlay">
                               <div class="sc_section_content padding_on">
                                  <div class="sc_section_content_wrap">
                                     <div id="sc_team_295_wrap" class="sc_team_wrap">
                                        <div id="sc_team_295" class="sc_team sc_team_style_team-2">
                                           <div class="sc_columns columns_wrap">

                                            @forelse  ( $users as $user )
                                            <div class="column-1_3 column_padding_bottom">
                                                <div id="sc_team_295_1" class="sc_team_item sc_team_item_1">
                                                   <div class="sc_team_item_avatar">
                                                      <img alt="" src="{{ @$user -> photo  ? asset('admin/image/user/'.@$user->photo) : asset('images/index67.png') }}" style="height:200px; object-fit:cover;">
                                                      <div class="sc_team_item_hover">
                                                         <div class="sc_team_item_socials">
                                                            <div class="sc_socials sc_socials_type_images sc_socials_shape_square sc_socials_size_small">
                                                                <div class="sc_socials_item">
                                                                   <a href="{{ @$user -> twitter_link }}" target="_blank" class="social_icons social_twitter">
                                                                   <span class="sc_socials_hover"></span>
                                                                   </a>
                                                                </div>

                                                                <div class="sc_socials_item">
                                                                   <a href="{{ @$user -> linkdin_link }}" target="_blank" class="social_icons social_linkdin">
                                                                   <span class="sc_socials_hover"></span>
                                                                   </a>
                                                                </div>
                                                                <div class="sc_socials_item">
                                                                   <a href="{{ @$user -> fb_link }}" target="_blank" class="social_icons social_facebook">
                                                                   <span class="sc_socials_hover"></span>
                                                                   </a>
                                                                </div>

                                                             </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class="sc_team_item_info">
                                                      <a class="sc_team_item_mail icon-email" href="mailto:{{ @$user -> email }}"></a>

                                                      <a href="{{ route('admin.user.delete' , $user->id) }}" class="post_delete btn btn-danger text-light" ><i class="fa fa-trash"></i></a>

                                                      <h3 class="sc_team_item_title">
                                                         <a href="" class="username">{{ $user -> name }}</a> <br>
                                                         @foreach ( $user -> roles as $role)
                                                            <div class="d-inline-block text-small userrole">{{ $role ->role_name  }} /  </div>

                                                         @endforeach
                                                          <br>
                                                          <a class="btn btn-info" href="{{ route('admin.user.edit',$user->id) }}">Edit</a>
                                                          <br>
                                                         <code class="userphone">{{ $user -> phone ? $user -> phone : 'No Phone Set Yet' }}</code>
                                                      </h3>
                                                      <div class="sc_team_item_position">{{ $user -> profession ?  $user -> profession : 'No Profession Set Yet'}}</div>
                                                   </div>
                                                </div>
                                             </div>
                                            @empty

                                            @endforelse




                                           </div>
                                        </div>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </section>
       <!-- </section> class="post_content"> -->
       <section class="related_wrap related_wrap_empty"></section>
    </article>
    <!-- </article> class="post_item post_item_single post_format_standard page hentry"> -->
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
 </div>

 <div class="sidebar_wrap sidebar widget_area scheme_original" role="complementary" style="width: 410px;">
    <div class="sidebar_inner widget_area_inner">
       <aside class="widget_number_1 widget widget_birthdays" style="margin-top:30px;">
        <div id="sc_form_227_wrap" class="sc_form_wrap">
            <div id="sc_form_227" class="sc_form sc_form_style_form_1">
               <h4 class="sc_form_title sc_item_title sc_item_title_without_descr">Add New User</h4>
               <form id="sc_form_227_form" class="sc_input_hover_default inited" data-formtype="form_1" method="POST" action="{{ route('admin.user.store') }}">
                  @csrf
                  <div class="sc_form_info">
                     <div class="sc_form_item sc_form_field label_over">
                        <input id="sc_form_username" type="text" name="name" value="{{ old('name') }}" placeholder="Name *" aria-required="true">
                     </div>

                     <div class="sc_form_item sc_form_field label_over">
                        <input id="sc_form_email" type="text" name="profession" value="{{ old('profession') }}" placeholder="Professional Position *" aria-required="true">
                     </div>

                     <div class="sc_form_item sc_form_field label_over">
                        <input id="sc_form_email" type="text" name="email" value="{{ old('email') }}" placeholder="E-mail *" aria-required="true">
                     </div>


                     <div class="sc_form_item sc_form_field label_over">
                        <input id="sc_form_email" type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone Number*" aria-required="true">
                     </div>

                     <div class="">
                         @foreach ($roles as $role )
                            <input type="checkbox"  name="role[]" id="" value="{{ $role -> id }}" > &nbsp; <label>{{ @$role -> role_name }}</label> <br>
                         @endforeach
                     </div>

                  </div>

                  <div class="sc_form_item sc_form_button">
                     <button>Add User</button>
                  </div>
                  <div class="result sc_infobox"></div>
               </form>
            </div>
         </div>
       </aside>

    </div>
 </div>
@endsection
