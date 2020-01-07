$(document).ready(function (){
    $("a#del_gallery").on('click',function(){
        
       var url = "http://laravelexample.test:81/admin/product/deleteGallery/";
       var rid = $(this).parent().find("img").attr("id");
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: url + rid,
        type: 'GET',
        data: rid ,
        success: function (data){
            if(data == "oke"){
                $("#"+rid).remove();
            }else{
                alert("Error !!!");
            }
        },
        encode  : true
    })
})
})