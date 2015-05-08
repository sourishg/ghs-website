$(document).ready(function(){
    
    var last = "";
    var margin = $("#about").width()/2;
    var width=$("#about").width();
    var height=$("#about").height();
    $("#about2").stop().css({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'});
        
        $(".about").hover(function(){
            if (last.trim() != "" && last != 'about') {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            last = 'about';
            $("#about").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#about2").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#about2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#about").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
                if (!(last == 'about'))
                    $("#about_links").css({display: "none"});
        });
        
        $("#about_links").hover(function(){
            $("#about_links").css({display: "block"});
        }, function(){
            if (!(last == 'about'))
                $("#about_links").css({display: "none"});
            $("#about2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#about").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
        })
        
    var margin = $("#infrastructure").width()/2;
    var width=$("#infrastructure").width();
    var height=$("#infrastructure").height();
    $("#infrastructure2").stop().css({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'});
        
        $(".infrastructure").hover(function(){
            if (last.trim() != "") {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            last = 'infrastructure';
            $("#infrastructure").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#infrastructure2").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#infrastructure2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#infrastructure").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
                if (!(last == 'infrastructure'))
                    $("#infrastructure_links").css({display: "none"});
            
        });
        
        $("#infrastructure_links").hover(function(){
            $("#infrastructure_links").css({display: "block"});
        }, function(){
            if (!(last == 'infrastructure'))
                $("#infrastructure_links").css({display: "none"});
            $("#infrastructure2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
		$("#infrastructure").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
        })
        
    var margin = $("#curriculum").width()/2;
    var width=$("#curriculum").width();
    var height=$("#curriculum").height();
    $("#curriculum2").stop().css({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'});
        
        $(".curriculum").hover(function(){
            if (last.trim() != "") {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            last = 'curriculum';
            $("#curriculum").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#curriculum2").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#curriculum2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#curriculum").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
                if (!(last == 'curriculum'))
                    $("#curriculum_links").css({display: "none"});
            
        });
        
        $("#curriculum_links").hover(function(){
            $("#curriculum_links").css({display: "block"});
        }, function(){
            if (!(last == 'curriculum'))
                $("#curriculum_links").css({display: "none"});
            $("#curriculum2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
		$("#curriculum").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
        })
    
    
        
    var margin = $("#admission").width()/2;
    var width=$("#admission").width();
    var height=$("#admission").height();
    $("#admission2").stop().css({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'});
        
        $(".admission").hover(function(){
            if (last.trim() != "") {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            last = 'admission';
            $("#admission").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#admission2").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#admission2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#admission").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
                if (!(last == 'admission'))
                    $("#admission_links").css({display: "none"});
            
        });
        
        $("#admission_links").hover(function(){
            $("#admission_links").css({display: "block"});
        }, function(){
            if (!(last == 'admission'))
                $("#admission_links").css({display: "none"});
            $("#admission2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
		$("#admission").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
        })
        
    var margin_small = $("#downloads").width()/2;
    var width_small=$("#downloads").width();
    var height_small=$("#downloads").height();
    $("#downloads2").stop().css({width:'0px',height:''+height_small+'px',marginLeft:''+margin_small+'px',opacity:'0.5'});
        
        $(".downloads").hover(function(){
            if (last.trim() != "") {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            $("#downloads").stop().animate({width:'0px',height:''+height_small+'px',marginLeft:''+margin_small+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#downloads2").stop().animate({width:''+width_small+'px',height:''+height_small+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#downloads2").stop().animate({width:'0px',height:''+height_small+'px',marginLeft:''+margin_small+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#downloads").stop().animate({width:''+width_small+'px',height:''+height_small+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
            
        });
    
    var margin_small2 = $("#events").width()/2;
    var width_small2=$("#events").width();
    var height_small2=$("#events").height();
    $("#events2").stop().css({width:'0px',height:''+height_small2+'px',marginLeft:''+margin_small2+'px',opacity:'0.5'});
        
        $(".events").hover(function(){
            if (last.trim() != "") {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            last = 'events';
            $("#events").stop().animate({width:'0px',height:''+height_small2+'px',marginLeft:''+margin_small2+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#events2").stop().animate({width:''+width_small2+'px',height:''+height_small2+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#events2").stop().animate({width:'0px',height:''+height_small2+'px',marginLeft:''+margin_small2+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#events").stop().animate({width:''+width_small2+'px',height:''+height_small2+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
                if (!(last == 'events'))
                    $("#events_links").css({display: "none"});
            
            
        });
        
        $("#events_links").hover(function(){
            $("#events_links").css({display: "block"});
        }, function(){
            if (!(last == 'events'))
                $("#events_links").css({display: "none"});
            $("#events2").stop().animate({width:'0px',height:''+height_small2+'px',marginLeft:''+margin_small2+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#events").stop().animate({width:''+width_small2+'px',height:''+height_small2+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
        })
    
    var margin = $("#photos").width()/2;
    var width=$("#photos").width();
    var height=$("#photos").height();
    $("#photos2").stop().css({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'});
        
        $(".photos").hover(function(){
            if (last.trim() != "") {
                last += '_links';
                $('#'+last).css({display: "none"});
            }
            $("#photos").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
            window.setTimeout(function() {
                $("#photos2").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
            },150);
	}, function(){
                $("#photos2").stop().animate({width:'0px',height:''+height+'px',marginLeft:''+margin+'px',opacity:'0.5'},{duration:150});
                window.setTimeout(function() {
                    $("#photos").stop().animate({width:''+width+'px',height:''+height+'px',marginLeft:'0px',opacity:'1'},{duration:150});
                },150);
            
        });
    
    $('.about').click(function(){
        $("#about_links").toggle();
        last = 'about';
    });
    $('.infrastructure').click(function(){
        $("#infrastructure_links").toggle();
        last = 'infrastructure';
    });
    $('.curriculum').click(function(){
        $("#curriculum_links").toggle();
        last = 'curriculum';
    });
    $('.admission').click(function(){
        $("#admission_links").toggle();
        last = 'admission';
    });
    $('.events').click(function(){
        $("#events_links").toggle();
        last = 'events';
    });
    
    $(document).mouseup(function (e){
        last += '_links';
        var container = $("#"+last);
        if (container.has(e.target).length === 0) {
            $('#'+last).css({display: "none"});
            last = '';
        }
    });
    
});