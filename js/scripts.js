function logginForm() {


    $('#toolsBlur').click();
    // $(':input[name="memberEmail"]').prop('disabled', false);;
    $('.formBox2').show();
    // $('#loggin').attr('action', './admin.html?status=login');
    // $('#addMember').attr('action', './memberList.php?status=add');
    $('#formBlur').show();
}
function cancelForm() {


    $('#toolsBlur').click();
    // $(':input[name="memberEmail"]').prop('disabled', false);;
    $('.formBox5').show();
    // $('#loggin').attr('action', './admin.html?status=login');
    // $('#addMember').attr('action', './memberList.php?status=add');
    $('#formBlur').show();
}
function bookingForm() {



    $('#toolsBlur').click();
    $('.formBox1').show();
    //  $('#booking').attr('action', './index.php?status=day');
    // $('#addMember').attr('action', './memberList.php?status=add');
    $('#formBlur').show();
    // $('#timing').css("disblay","block");
}

function orderForm() {
    if ($('#phone').val() != 0) {
        $('.formBox1').hide();
        // $('#toolsBlur').click();
        // $('.formBox3').show();
        // $('#booking').attr('action', './admin.html?status=login');
        // $('#addMember').attr('action', './memberList.php?status=add');
        $('#formBlur').hide();
    }
}

function clockForm() {

    //  $('#timing').css('display', "block");
    $('#toolsBlur').click();
    $('.formBox4').show();
    // $('#booking').attr('action', './admin.html?status=login');
    // $('#addMember').attr('action', './memberList.php?status=add');
    $('#formBlur').show();

}
function DeleteAppointment(){
    $('#toolsBlur').click();
    // $(':input[name="memberEmail"]').prop('disabled', false);;
    $('.formBox2').show();
    // $('#loggin').attr('action', './admin.html?status=login');
    // $('#addMember').attr('action', './memberList.php?status=add');
    $('#formBlur').show();
    console.log("asd1");
    
}


function callAjax(datastring) {
    // alert( $("input:tel").val());
    // console.log( $("#phone").val());
    $.ajax({
        type: "POST",
        url: "action.php",
        data: datastring,
        cache: true,

    });
}









function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
function insertUrlParam(key, value) {
    if (history.pushState) {
        let searchParams = new URLSearchParams(window.location.search);
        searchParams.set(key, value);
        let newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + searchParams.toString();
        window.history.pushState({path: newurl}, '', newurl);
    }
}
$(document).ready(function () {



    $('#formBlur').click(function () {
        $('#formBlur').hide();
        $('.formBox').each(function () {
            $(this).hide();
        });

    });
    $('.cancelForm').each(function () {
        $(this).click(function () {
            $('#formBlur').click();
        });
    });

    $('.loginn').click(logginForm);
    $('#boking').click(bookingForm);
    $('#cancel').click(cancelForm);
    $('#back-arrow').click(function () {


        $("#back_arrow").submit();
    });
 
    $('#back-arroww').click(function () {

    
        $("#back_arroww").submit();
    });
    $('.buton').click(function () {
        clockForm();
        // $(this).
    });
   
    $(".day_week").click(function () {
        // console.log($(".day_week").val());
        $(this).click(function () {
            $("#timing").submit();
        });

    });
    if (((getParameterByName('state') == 'loginnorder' || getParameterByName('state') == 'day' || getParameterByName('state') == 'time')||getParameterByName('state') == 'cancelorder'||getParameterByName('state') == 'add'||getParameterByName('state') == 'delete') && ($('.hid1').val() == 1 ||$( "input[name='back_white']" ).val() == 1|| $('.hid3').val() == 1||$('.hid4').val() == 1 )) {
        $('#formBlur').show();


    }
    if ((getParameterByName('state') == 'signup')) {

        // $('#toolsBlur').click();
        $('.formBox1').show();

        $('#formBlur').show()
        $("#booking").attr('action', './index.php?state=signupp');
    }
    $('.delete-button').click(function(){

       $('#cancel_time').submit();

    })    

    
    $('.delete-admin').click(function(){

        $('#admin-delete').submit();
 
     }) 

     $('.b').hover(function(){
        
        $('.b').css('background-color', 'transparent');
        $('.b').css('transition', '0.5s background-color');
        $('.bb').css('color', '#be9342');
     },function() {
        // on mouseout, reset the background colour
        $('.b').css('background-color', 'rgba(255,255,255,0.20)');
        $('.bb').css('color', 'white');
     });
     $('.c').hover(function(){
        
        $('.c').css('background-color', 'transparent');
        $('.c').css('transition', '0.5s background-color');
        $('.cc').css('color', '#be9342');
     },function() {
        // on mouseout, reset the background colour
        $('.c').css('background-color', 'rgba(255,255,255,0.20)');
        $('.cc').css('color', 'white');
     });
    
});