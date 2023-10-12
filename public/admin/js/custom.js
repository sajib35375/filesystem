
jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

function file_show(id){
    if (id){
        jQuery.ajax({
            type:"GET",
            url:"/admin/files/"+id,
            dataType:"json",
            success:function (data){
                // alert();
                var row = "";
                jQuery.each(data,function(key,value){

                    row += `
            <div id="sc_tab_119_1_15" class="sc_tabs_content first">
    <h3 class="sc_title sc_title_regular"></h3>
    <div class="vc_empty_space hpx_14">
        <span class="vc_empty_space_inner">${value.role.role_name}</span>
    </div>


    <a href="{{ asset('assets/images/resume-example-for-web-designers.pdf') }}" class="sc_icon icon-download alignright"></a>
    <h6 class="sc_title sc_title_regular even">
        <a href="{{ asset('assets/images/resume-example-for-web-designers.pdf') }}">${value.title}</a>
    </h6>
    <div class="wpb_text_column wpb_content_element">
        <div class="wpb_wrapper">
            <p>${value.short_text}</p> <a class="custom-btn">View Threads</a>
        </div>
    </div>

            `;
                })

                jQuery('.box').html(row);
            }


        })
    }else{
        jQuery.ajax({
            type:"GET",
            url:"/file-tickets/",
            dataType:"json",
            success:function (data){
                // alert();
                var col = '';
                jQuery.each(data,function(key,value){
                    col += `
                    <div id="sc_tab_119_1_15">
    <h3 class="sc_title sc_title_regular even"></h3>
    <div class="vc_empty_space hpx_14">
        <span class="vc_empty_space_inner">${value.role.role_name}</span>
    </div>


    <a  href="{{ asset('assets/images/resume-example-for-web-designers.pdf') }}" class="sc_icon icon-download alignright"></a>
    <h6 class="sc_title sc_title_regular">
        <a href="{{ asset('assets/images/resume-example-for-web-designers.pdf') }}">${value.title}</a>
    </h6>
    <div class="wpb_text_column wpb_content_element">
        <div class="wpb_wrapper">
            <p>${value.short_text}</p> <a class="custom-btn">View Threads</a>
        </div>
    </div>

                    `;
                })
                jQuery('.box').html(col);
            }
        })
    }


}
file_show()


