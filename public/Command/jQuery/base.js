window.onload = function (){
    $('.collapse .navbar-nav li').click(function(){
        var index = $(this).index();
        $('collapse .navbar-nav li').removeClass('active');
        $(this).addClass('active');
    });
    // $('.top-index .collapse .navbar-nav li').click(function(){
    //     var index = $(this).index();
    //     $('.top-index .collapse .navbar-nav li a').removeClass('activeSize');
    //     $(this).addClass('activeSize');
    // });
}
window.onresize = function(){
    $('.carousel-top').each(function(){
        var  minwidth=224;
        var  minheight=192;
        var radio=0;
        var width=$(this).width();
        var height=$(this).height();
        console.log(width+'...'+height);
        console.log();
        if(width>minwidth){
            radio=((width - minwidth) / minwidth);
            maxheight = minheight * radio;
            console.log(radio);
            console.log(maxheight);
            if(width < 414){
                $('.carousel-top').css('height',192);
                return
            }
            // $('.carousel-top').css('width',width);
            $('.carousel-top').css('height',maxheight);
        }
    })
    $('.lab-carousel').each(function(){
        var  minwidth=224;
        var  minheight=192;
        var radio=0;
        var width=$(this).width();
        var height=$(this).height();
        console.log(width+'...'+height);
        console.log();
        if(width>minwidth){
            radio=((width - minwidth) / minwidth);
            maxheight = minheight * radio;
            console.log(radio);
            console.log(maxheight);
            if(width < 414){
                $('.carousel-top').css('height',192);
                return
            }
            // $('.carousel-top').css('width',width);
            $('.carousel-top').css('height',maxheight);
        }
    })
}
