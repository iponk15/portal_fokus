
//function update status
function f_status(stat, ele, eve, dtele){
    eve.preventDefault();

    if(stat == 1){
        var mes = "Are you sure want to change Status ?";
        var sus = "Successfully Change Status!";
        var err = "Error Change Status!";
        var head= "Status Changed!";
        var html = false;
    }else if(stat == 2){
        var mes = "Are you sure want to Delete data ?";
        var sus = "Successfully Delete data!";
        var err = "Error Delete data!";
        var head= "Deleted!";
        var html = false;
    }else if(stat == 3){
        var mes = "<b>This will delete all related Subscription too!</b></br>Are you sure want to Delete data ?";
        var sus = "Successfully Delete data!";
        var err = "Error Delete data!";
        var head= "Deleted";
        var html = true;
    }
    swal({
        title: "Are you sure?",
        text: mes,
        html: html,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: 'Yes',
        closeOnConfirm: false
    }).then(function(isConfirm){
        console.log(isConfirm.value);
        if(isConfirm.value == true){
            var href = $(ele).attr('href');
            $.post(href, function(data1, textStatus, xhr) {
                swal(
                    head,
                    sus,
                    'success'
                );

                $(".reload").trigger("click");
            }, 'json');
        }
    });
};

$(document).on('click','.ajaxify',function(e){
    e.preventDefault();

    var ajaxify = [null, null, null];
    var url     = $(this).attr("href");
    var content = $('.body-content');
    var active  = 'm-menu__item--active';
    var coba    = 'm-menu__item--active m-menu__item--active-tab';
    var coba2   = 'm-menu__item--open-dropdown m-menu__item--hover';
    var cat     = $(this).attr('class');
    // var title   = $('.m-portlet__head-title h2 span').html();
    var title   = $('title').text();

    if (cat == 'm-menu__link ajaxify') {
        $('li').removeClass(active);
        $(this).parent().addClass(active);
    }

    if (cat == 'm-menu__link ajaxify single') {
        $('li').removeClass(coba);
        $('li').removeClass(coba2);
        $(this).parent().addClass(coba);
    }
    
    
    history.pushState(null, null, url);
    if(url != ajaxify[2]){
        ajaxify.push(url);
    }

    ajaxify     = ajaxify.slice(-3, 5);
    var the     = $(this);
    var posting = $.post( url, { status_link: 'ajax' } );

    posting.done(function( data ) {
        content.html(data);

        // set blockui
        mApp.block(content, {});
        setTimeout(function() {
            mApp.unblock(content);
        }, 1000);

        // set otomastis scroll top
        $('.m-scroll-top').trigger('click');

        var title = $('.tab-title').text();
        $('title').text('Fokus ||' + title );
    });

});

$(window).bind('popstate',function(){
    var state = window.location.href;
    var pageContent = $('.body-content');
    $.ajax({
        type: "POST",
        cache: false,
        url: state,
        data: { status_link: 'ajax' },
        dataType: "html",
        success: function(res) {
            if (res == 'out') {
                window.location = base_url + 'home';
            } else {
                pageContent.html(res);
                $('.m-scroll-top').trigger('click');
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            errorAjaxify();
        }
    });
});
