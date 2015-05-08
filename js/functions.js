function add_main_link() {
    var url = "./admin_inc/adder.php";
    var t = $('#main_link_text').val();
    if (t.trim() == '') {
        alert('Please enter some value.');
    } else {
        $('#status').css("display", "block");
        $('#status').html("Adding Link...");
        $.post(url, {main_link: t, type: 1}, function(data){
            $('#status').html(data);
        });
    }
}
function add_sub_link() {
    var url = "./admin_inc/adder.php";
    var id = $('#sel_sub_link option:selected').val();
    if (id == 0) {
        alert('Please choose a main link.');
    } else {
        var t = $('#sub_link_text').val();
        if (t.trim() == '') {
            alert('Please enter some value.');
        } else {
            $('#status').css("display", "block");
            $('#status').html("Adding Sublink...");
            $.post(url, {sub_link: t, type: 2, mid: id}, function(data){
                $('#status').html(data);
            });
        }
    }
}
function add_sub_link_content() {
    var url = "./admin_inc/adder.php";
    var id = $('#sel_contento :selected').val();
    var slide_ids = $('#slideshow_ids').val();
    if (id == 0) {
        alert('Please choose a sub link.');
    } else {
        var t = $('#sub_link_content').val();
        if (t.trim() == '') {
            alert('Please enter some value.');
        } else {
            $('#status').css("display", "block");
            $('#status').html("Adding Content...");
            $.post(url, {content: t, type: 3, sid: id, slideshow_ids: slide_ids}, function(data){
                $('#status').html(data);
            });
        }
    }
}
function submit_dept() {
    var url = "./admin_inc/adder.php";
    var dept_name = $('#dept_name').val();
    var dept_emails = $('#dept_emails').val();
    if (dept_name.trim() == '') {
        alert('Please enter some value.');
    } else {
        if (dept_emails.trim() == '') {
            alert('Please enter some value.');
        } else {
            $('#status').css("display", "block");
            $('#status').html("Adding Content...");
            $.post(url, {dept_name: dept_name, type: 4, dept_emails: dept_emails}, function(data){
                $('#status').html(data);
            });
        }
    }
}

//contact system
var started = false;
var topic = "";
function startContactSystem(topic_val) {
    topic = topic_val;
    $('#main_message_area').css({display: "none"});
    $('#details_area').css({display: "block"});
    $('#topic_area').css({display: "none"});
}

var email = "";
var id_no = "";
function requestToken() {
    var url = './inc/processContact.php';
    email = $('#c_email').val();
    id_no = $('#c_id_no').val();
    $('#c_status').css({display: "block"});
    $('#c_status').html("Processing...");
    $.post(url, {email: email, id_no: id_no, type: 0}, function(data){
        $('#c_status').html(data);
    });
}

function startMainMessage() {
    $('#details_area').css({display: "none"});
    $('#c_status').css({display: "none"});
    $('#main_message_area').css({display: "block"});
    $('#verify').css({display: "block"});
}

var v_code = "";
var c_message = "";
var c_name_anony = "";
var c_email_anony = "";
function processFinalData() {
    var url = './inc/processContact.php';
    if (topic == "General") {
        c_message = $('#c_message').val();
        c_name_anony = $('#c_name_anony').val();
        c_email_anony = $('#c_email_anony').val();
        $('#c_status').css({display: "block"});
        $('#c_status').html("Sending message...");
        $.post(url, {topic: topic, email: c_email_anony, name: c_name_anony, message: c_message, type: 2}, function(data){
            $('#c_status').html(data);
        });
    } else {
        c_message = $('#c_message').val();
        v_code = $('#v_code').val();
        $('#c_status').css({display: "block"});
        $('#c_status').html("Sending message...");
        $.post(url, {topic: topic, email: email, id_no: id_no, v_code: v_code, message: c_message, type: 1}, function(data){
            $('#c_status').html(data);
        });
    }
}
var open = false;
function resetForm() {
    open = !open;
    if (!open) {
        $('#topic_area').css({display: "none"});
        $('#c_status').css({display: "none"}).empty();
        $('#details_area').css({display: "none"});
        $('#main_message_area').css({display: "none"});
        $('#anony').css({display: "none"});
        document.getElementById("dept_topics").selectedIndex = 0;
        $('#c_email').val(null);
        $('#c_id_no').val(null);
        $('#v_code').val(null);
        $('#c_message').val(null);
        $('#c_name_anony').val(null);
        $('#c_email_anony').val(null);
    } else {
        $('#topic_area').css({display: "block"});
    }
}
function otherh3clicks() {
    open = false;
    $('#topic_area').css({display: "none"});
    $('#c_status').css({display: "none"}).empty();
    $('#details_area').css({display: "none"});
    $('#main_message_area').css({display: "none"});
    $('#anony').css({display: "none"});
    document.getElementById("dept_topics").selectedIndex = 0;
    $('#c_email').val(null);
    $('#c_id_no').val(null);
    $('#v_code').val(null);
    $('#c_message').val(null);
    $('#c_name_anony').val(null);
    $('#c_email_anony').val(null);
}

function showEditor() {
    var id = $('#editor_select option:selected').val();
    if (id != 0) {
        var url = './inc/edit.php';
        $.getJSON(url, {id: id}, function(data){
            $('#editor').html(data.content);
            $('#slide_ids').val(data.slideshow_ids);
        });
    } else {
        $('#editor').empty();
        $('#slide_ids').empty();
    }
}
function submitEditedContent() {
    var id = $('#editor_select option:selected').val();
    var content = $('#editor').val();
    var slide_ids = $('#slide_ids').val();
    if (id == 0) {
        alert('Choose an id.');
    } else {
        if (content.trim() == '') {
            alert('Write some content');
        } else {
            var url = './inc/edit.php';
            $('#status').css("display", "block");
            $('#status').html("Saving content...");
            $.post(url, {id: id, content: content, slideshow_ids: slide_ids}, function(data) {
                $('#status').html(data);
            });
        }
    }
}