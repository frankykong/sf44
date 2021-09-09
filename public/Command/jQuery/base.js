window.onload = function (){
    $('.collapse .navbar-nav li').click(function(){
        var index = $(this).index();
        $('collapse .navbar-nav li').removeClass('active');
        $(this).addClass('active');
    });
    $('.info-2 .my-info-list .info-left').click(function(){
        var index = $(this).index();
        $('.info-2 .my-info-list .info-left').removeClass('active');
        $(this).addClass('active');
        console.log(111)
    });
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
