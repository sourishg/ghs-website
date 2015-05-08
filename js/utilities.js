var frag;
var subVisible = false;
var noticeShadow = false;
var playing_music = false;
$(function() {
    $( "#accordion" ).accordion({
        collapsible: true,
        heightStyle: "content",
        active: false
    });
});

$(window).load(function(){
    $('#load-area').hide("slide", {direction: "up"}, 500);
});
$('#el-sxl').click(function(){
    window.location.href = 'http://ghs.schoolexcel.in/ghsse/';
});
$(document).ready(function(){

    jQuery.preLoadImages("assets/load.gif", "assets/m_note_over.png", "assets/mainload.gif"
    );

    $('#head_wrapper').show("slide", {direction: "up"}, 800);
    $('#home_page_link').click(function(){
        $('#s_content').hide("slide", {direction: "left"}, 800);
        $('#show_area').hide("slide", {direction: "right"}, 800).empty();
        $('#dashboard').hide("slide", {direction: "up"}, 400);
        $('#back_img_wrap').show();
        $('#head_wrapper').show("slide", {direction: "up"}, 400);
        $('#mainContainer').fadeIn(500, function(){

        });
        $('#el-sxl').show();
        $('#contact-us').show();
    });
    
    var show = 2;
    var current = 1;
    
    var gallery = $('#live-tile-feed');


    var galleryItems = gallery.children('li');
    length = galleryItems.length;

    setInterval(function(){
        current = (current+1)%(length+1);
        
        galleryItems.eq(current).slideDown();
        galleryItems.eq(current - show).slideUp();
    }, 5000);

});

$('#music').click(function(){
    if (!playing_music) {
        $('#music').css({background: "url(assets/m_note_over.png) no-repeat top left"});
        $('#music').text('Pause School Song');
        document.getElementById('ghs_theme_song').play();
        playing_music = true;
    }
    else {
        $('#music').css({background: "url(assets/m_note.png) no-repeat top left"});
        $('#music').text('Play School Song');
        $.each($('audio'), function () {
            this.pause();
        });
        playing_music = false;
    }
});
(function($) {
    var cache = [];

    $.preLoadImages = function() {
        var args_len = arguments.length;
        for (var i = args_len; i--;) {
            var cacheImage = document.createElement('img');
            cacheImage.src = arguments[i];
            cache.push(cacheImage);
        }
    }
})(jQuery)
function loadContent(mid, sid) {
    $('#s_content').show("slide", {direction: "left"}, 800);
    $('#show_area').show("slide", {direction: "right"}, 800);
    $('#dashboard').show("slide", {direction: "up"}, 1000);
    var load = '<img src="assets/load.gif" style="margin-left: 320px; margin-top: 90px;" />';
    $('#show_area').html(load);
    $('#back_img_wrap').hide();
    $('#head_wrapper').hide("slide", {direction: "up"}, 400);
    $('#mainContainer').hide("slide", {direction: "right"}, 400);
    $.get('view.php?mid='+mid+'&sid='+sid, function(data){
        $('#show_area').html(data);
    });
    $('#el-sxl').hide();
    $('#contact-us').hide();
}
function changeLoadedContent(mid, sid) {
    $('#shadow').hide();
    $('#subnav_links').hide('slide', {direction: "left"}, 800);
    subVisible = false;
    $('#show_area').hide('slide', {direction: "right"}, 800);

    var load = '<img src="assets/load.gif" style="margin-left: 320px; margin-top: 90px;" />';
    $('#show_area').show('slide', {direction: "left"}, 800);
    $('#show_area').html(load);
    $.get('view.php?mid='+mid+'&sid='+sid, function(data){
        $('#show_area').html(data);
    });
}
$('#subnav li a').click(function(){

    var mid = $(this).attr('id');
    if (mid) {
        var load = '<img src="assets/load.gif" style="margin-left: 20px;" />';
        $('#subnav_links').html(load);

        $('#shadow').fadeIn(200, function(){});
        if (!subVisible) {
            $('#subnav_links').show('slide', {direction: "left"}, 800);
            subVisible = true;
        }
        $('#subnav_links').load('nav.php?mid=' + mid, function(){});
    }
});
$('#shadow').click(function(){
    $('#shadow').hide();
    if (!noticeShadow) {
        $('#subnav_links').hide('slide', {direction: "left"}, 800);
    } else {
        $('#noticeBoard').hide('slide', {direction: 'right'}, 800);
        noticeShadow = false;
    }
    subVisible = false;
});

function getSearch(value){
    if (value.trim() == ""){
        $('#searchResults').css({
            "display": "none"
        });
        $('#searchResults').empty();
    } else {
        var item = value.trim();
        if (item.length > 3){
            $('#searchResults').html("Searching...");
            $.post("search.php",{
                sItem:item
            },function(data){
                $('#searchResults').css({
                    "display": "block"
                });
                $('#searchResults').html(data);
            });
        }
    }
}
$(document).mouseup(function (e){
    var container = $("#searchResults");
    if (container.has(e.target).length === 0){
        container.hide();
        container.empty();
    }
});

$('#notices_link').click(function(){
    $('#shadow').fadeIn(200, function(){});
    noticeShadow = true;
    $('#noticeBoard').show('slide', {direction: 'right'}, 800);
    var load = '<img src="assets/load.gif" style="margin-left: 20px;" />';
    $('#noticeBoard').html(load);
    $('#noticeBoard').load('notices.php', function(){});
});

$('#contact-us').click(function(){
    $('#top_slide').show('slide', {direction: "up"}, 800);
    $('#contact_A').show('slide', {direction: "left"}, 1200);
});
$('#close').click(function(){
    $('#contact_A').hide('slide', {direction: "right"}, 1200);
    $('#top_slide').hide('slide', {direction: "up"}, 800);
});
function incWidth(){
    $('#search').animate({
        width: '400px'
    },100,'linear',function(){

        });
}
function decWidth(){
    $('#search').animate({
        width: '300px'
    },100,'linear',function(){

        });
}
function closeSearch(){
    $('#searchResults').hide();
    $('#search').val('');
}
function closeSmallNav() {
    $('#shadow').hide();
    $('#subnav_links').hide('slide', {direction: "left"}, 800);
    subVisible = false;
}
function closeNotice() {
    $('#shadow').hide();
    $('#noticeBoard').hide('slide', {direction: 'right'}, 800);
    noticeShadow = false;
}