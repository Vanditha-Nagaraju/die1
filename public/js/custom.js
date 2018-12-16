$(document).ready(function() {


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.action-follow').click(function(){
        var user_id = $(this).data('id');
        var cObj = $(this);
        var c = $(this).parent("div").find(".tl-follower").text();
        var d = $(this).parent("div").find(".vn-following").text();
        //$user = Auth::user();
        console.log($user,'loggeduser');


        $.ajax({
            type:'POST',
            url:'/ajaxRequest',
            data:{user_id:user_id},
            success:function(data){
                console.log(data,'data from success call');
                if(jQuery.isEmptyObject(data.success.attached)){
                    cObj.find("strong").text("Follow");
                    cObj.parent("div").find(".tl-follower").text(parseInt(c)-1);
                    cObj.parent("div").find(".vn-following").text(parseInt(d)-1);

                }else{
                    cObj.find("strong").text("UnFollow");
                    cObj.parent("div").find(".tl-follower").text(parseInt(c)+1);
                    cObj.parent("div").find(".vn-following").text(parseInt(d)+1);

                }
            }
        });
    });

    });