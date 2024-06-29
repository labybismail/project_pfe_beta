$(document).ready(function() {
    // alert(" I'am conected");

    // load_comment();

    // function load_comment() {
    //     $.ajax({
    //         type: "POST",
    //         url: "doctor-profile.php",
    //         data: {
    //             'comment_load_data': true
    //         },

    //     });




    // }

    // WORK SAPCE ON 


    // $(document).on('click', '.reply_btn', function () {
    //     //  alert("Iam working");
    //     var thisClicked = $(this);
    //     var cmt_id = thisClicked    
    //    $('.reply_section')
    //     .html('<input type="text" class="replay_msg form-control my-2" placeholder="Reply">\
    //     <div class="text-end">\
    //     <button class="btn btn-sm btn-primary float-right reply_add_btn"> Reply </button>\
    //     <button class="btn btn-sm btn-danger float-right reply_cancel_btn"> Cancel </button>\
    //     </br>\
    //     </br>\
    //      </div>');

    // });



    //the cancel event.
    $(document).on('click', '.reply_cancel_btn', function() {
        $('.reply_msg').val("");

    });
    // //btn reply cmt
    // $(document).on('click', '.reply_add_btn', function(e) {
    //     e.preventDefault();

    //     var thisClicked = $(this);
    //     var cmt_id = thisClicked.closest('.reply_bo').find('#test').val();
    //     var reply = thisClicked.closest('.reply_bo').find('#test2').val();

    //     var data = {
    //         'comment_id': cmt_id,
    //         'reply_msg': reply,
    //         'add_reply': true
    //     };
    //     $.ajax({
    //         type: "POST",
    //         url: "doctor-profile.php",
    //         data: data,
    //         success: function(response) {
    //             $(".reply_msg").html("");
    //             swal({
    //                 icon: "success",
    //             });

    //             $('.reply_msg').val(""); //vider text rpl
    //             //relad timer when the rpl click
    //             setTimeout(function() {
    //                 window.location.reload(1);
    //             }, 2000);
    //         }
    //     });
    // });



    //  Zone in progress  //
    // // veiw reply btn, shows the replyer details
    // $(document).on('click','.view_reply_btn', function (e) {
    //     e.preventDefault();
    //         // alert("show is working");
    //     var thisClicked = $(this);
    //     var cmt_id = thisClicked.val();

    //     $.ajax({    
    //         type: "POST",
    //         url: "docprof.php",
    //         data: {
    //             'cmt_id':cmt_id,
    //             'view_comment_data':true   
    //         },
    //         success: function (response) {
    //             // console.log(response);
    //             $('.veiw_reply_section').html("");

    //         }
    //     });

    // });
    //                                                             
    //     //replay on sub_reply 
    //     //sub_reply_btn

    //     $(document).on('click', '.sub_reply_btn', function (e) {
    //         e.preventDefault();
    //             var thisClicked = $(this);
    //             var cmt_id = thisClicked.val();
    //             var username = thisClicked.closest('.sub_reply_box').find('.get_username').val();

    //             $('.sub_reply_section').html("");
    //             thisClicked.closest('.sub_reply_box').find('.sub_reply_section').
    //             append(' <div> \
    //                 <input type="text" value="@'+username+' "; class="sub_reply_msg form-control" place-holder="Your reply"/>\
    //                 </div>\
    //                 <div class="text-end" >\
    //                     <button class="btn btn-sm btn-primary text-dark sub_reply_add_btn">Reply3</button>\
    //                     <button class="btn btn-sm btn-danger text-dark sub_reply_cancel_btn">Cancel</button>\
    //                 </div>\
    //             ');                    
    //     });


    //      //cancel sub replay btn
    //     $(document).on('click', '.sub_reply_cancel_btn', function (e) {
    //         e.preventDefault();
    //          $('.sub_reply_section').html("");
    //     });

    //     //add the sub reply to the db
    //     //lets take first the value from the sub_reply btn
    //     $(document).on('click','.sub_reply_add_btn', function (e) {
    //         e.preventDefault();
    //         var thisClicked = $(this);
    //         var cmt_id = thisClicked.closest(".sub_reply_box").find('.sub_reply_btn').val();
    //         var reply = thisClicked.closest(".sub_reply_box").find('.sub_reply_msg').val();

    //         // let's store them
    //         var data = {
    //             'cmt_id': cmt_id,
    //             'reply_msg': reply,
    //             'add_subreplies': true
    //         }
    //          $.ajax({
    //              type: "POST",
    //              url: "doctor-profile-sec.php",
    //              data: data,
    //              success: function (response) {
    //                 $('.reply_section').html("");
    //                 alert(response);
    //             }
    //          });

    //     });

    //veiw reply comments btn
    $(document).on('click', '.view_reply_btn', function(e) {
        e.preventDefault();
        var thisClicked = $(this);
        var i = thisClicked.closest('.view_reply_btn').val();
        var to = i + "t"; //47+t
        var ji = "#" + to; //#47t
        var j = "#" + i; //#47
        var x = document.getElementById(i);

        if (x.style.display === "none") {
            $(j).show();

            document.querySelector(ji).innerText = 'hide';
        } else {
            $(j).hide();
            document.querySelector(ji).innerText = 'show';
        }
    });

    // //  SHOW, HIED btn view reply name 
    // $('.view_reply_btn').click(function (e) { 
    //     e.preventDefault();
    //  var thisClicked = $(this);
    //     var i = thisClicked.closest('.view_reply_btn').val(); //47
    //     var to = i+"t"; //=> 47+t
    //     var ji = "#"+to; //=> #47t
    //  var j = "#"+i;    //=> #47
    //  var x = document.getElementById(to);

    // if (x.style.display =="none") {  //two egals work only for the first button (1 click to show and double to hide)
    //  $(j).show();

    //     document.querySelector('.view_reply_btn').innerText = 'hide';//if you put "view_reply_btn" instead of "ji"  will work in one btn
    //   } else {
    //     $(j).hide();
    //     document.querySelector('.view_reply_btn').innerText = 'show';
    //   }
    // });


    // btn reply comment exeption
    $('.reply_add_btn').click(function(e) {
        e.preventDefault();
        var thisClicked = $(this);
        var msg1 = thisClicked.closest('.reply_bo').find('#test2').val();

        if ($.trim(msg1).length == 0) {

            error_msg = "add your comment reply"; //this massage must be deleted
            $('#error_status_rpl').text(error_msg);

        } else {
            error_msg = "";
            $('#error_status_rpl').text(error_msg);

        }

        if (error_msg != '') {
            swal("Oops", "Please add your comment reply!", "error")
            return false;
        }
    });

    //Delete comment button and the stars
    $(".delete_cmt_btn").click(function(e) {
        e.preventDefault();
        var thisClicked = $(this);
        var msg1 = thisClicked.val();
        $("#idinput_dl").val(msg1);
        var post_iddoc = $(this).attr("data-iddoc");
        $("#idinput_doc").val(post_iddoc);
        var post_idus = $(this).attr("data-user");
        $("#idinput_user").val(post_idus);

    });

    //btn cmt
    $('.add_comment_btn').click(function(e) {
        e.preventDefault();

        radio = "false";
        if (!$("input[type='radio']").is(':checked')) {
            radio = "true";
        }


        var msg = $('.comment_textbox').val();
        if ($.trim(msg).length == 0) {

            error_msg = "please type comment";
            $('#error_status').text(error_msg);

        } else {
            error_msg = "";
            $('#error_status').text(error_msg);

        }
        if (error_msg != '') {
            swal("Oops", "Please add your comment!", "error")
            return false;

        } else {
            //get the value          
            var data = {
                'radio': radio,
                'msg': msg,
                'id': document.getElementById("id_doc_input").value,
                'add_comment': true,
            };
            var iddocp = document.getElementById("id_doc_input").value
            $.ajax({
                type: "POST",
                url: "doctor-profile.php?id=" + iddocp,
                data: data,
                success: function(response) {
                    swal({
                        icon: "success",
                    });
                    $('.comment_textbox').val("");
                }
            });
        }
        //relad timer when the rpl click
        setTimeout(function() {
            window.location.reload(0);
        }, 2000);

    });

});


// REcomandation system
$(document).ready(function() {

    // if the user clicks on the like button ...
    $('.like-btn').on('click', function() {
        var post_id = $(this).attr("data-id");
        var data_iduss = $(this).attr("data-iduss"); //session user id
        var Doc_id = $(this).attr("data-iddoc");
        //   alert(post_id); we bring the exact id where the btn clicked     
        $clicked_btn = $(this);

        if ($clicked_btn.hasClass('thumbs_upo')) {
            action = 'like';
            $clicked_btn.removeClass('thumbs_upo'); //off
            $clicked_btn.addClass('thumbs_up'); //on
            var msg1 = $clicked_btn.closest('.recommend-btn').find('#dislike');
            msg1.removeClass('thumbs_down');
            msg1.addClass('thumbs_downo');


        } else if ($clicked_btn.hasClass('thumbs_up')) {
            action = 'unlike';
            $clicked_btn.removeClass(' thumbs_up'); //on 
            $clicked_btn.addClass('thumbs_upo'); //off


        }

        $.ajax({
            url: 'docprof.php',
            type: 'post',
            data: {
                'action': action,
                'post_id': post_id, //id cmt
                'data_iduss': data_iduss, //id users
                'Dr_id': Doc_id,
            },
            success: function(data) {
                res = JSON.parse(data);
                //   if (action == "like") {
                //       $clicked_btn.removeClass('thumbs_upo'); //off
                //       $clicked_btn.addClass(' thumbs_up');//on

                //   } else if(action == "unlike") {
                //       $clicked_btn.removeClass('thumbs_up');//on 
                //       $clicked_btn.addClass('thumbs_upo');//off

                //   } 


                // display the number of likes and dislikes
                $clicked_btn.siblings('span.likes').text(res.likes);
                $clicked_btn.siblings('span.dislikes').text(res.dislikes);

                // change button styling of the other button if user is reacting the second time to post
                $clicked_btn.siblings('i.thumbs-down').removeClass('thumbs-down').addClass('thumbs_downo');
            }
        });

    });


    // if the user clicks on the dislike button ...
    $('.dislike-btn').on('click', function() {
        var post_id = $(this).attr("data-id");
        var data_iduss = $(this).attr("data-iduss"); //session user id
        var Doc_id = $(this).attr("data-iddoc");
        var dislike_val = $(this).attr("data-dislike")

        $clicked_btn = $(this);
        if ($clicked_btn.hasClass('thumbs_downo')) {
            action = 'dislike';
            $clicked_btn.removeClass('thumbs_downo');
            $clicked_btn.addClass('thumbs_down');
            var msg2 = $clicked_btn.closest('.recommend-btn').find('#like');
            msg2.removeClass('thumbs_up');
            msg2.addClass('thumbs_upo');


        } else if ($clicked_btn.hasClass('thumbs_down')) {
            action = 'undislike';
            $clicked_btn.removeClass('thumbs_down');
            $clicked_btn.addClass('thumbs_downo');
        }

        $.ajax({
            url: 'docprof.php',
            type: 'post',
            data: {
                'action': action,
                'post_id': post_id, //id cmt
                'data_iduss': data_iduss, //id users
                'Dr_id': Doc_id,
                'dislike_val': dislike_val, //total like
            },
            success: function(response) {

            }



        });


    });

});

//check box Accepting Terms to comment.    
$(document).ready(function() {
    // alert('cheked'); 
    var checkbox = document.querySelector('#terms_accept')
    var Button = document.querySelector('.add_comment_btn');

    checkbox.addEventListener('change', () => {
        if (!checkbox.checked) Button.style.display = 'none';
        else Button.style.display = null;
    });
});



//  //evaluating stars
$(document).ready(function() {
    $("input[type='radio']").change(function(e) {
        e.preventDefault();
        var checkedval = $(this).val();
        var id_doc_input = $("#id_doc_input").val();
        //alert(checkedval);
        $.ajax({
            type: "POST",
            url: "docprof.php",
            data: {
                'checkedval': checkedval,
                'id_doc_input': id_doc_input,
            },

            success: function(response) {}
        });
    });
});

$(document).on('click', '.book_appointment', function(e) {
    var date = $("#date3").val();
    var time = $("#time1").val();
    var id_doc_input = $("#id_doc_input").val();
    $.ajax({
        type: "POST",
        url: "server.php",
        data: {
            'date': date,
            'time': time,
            'id_doc_input': id_doc_input,
        },

        success: function(response) {

            $(".message").html(response);
        }
    });
});