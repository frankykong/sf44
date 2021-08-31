// define(function(require, exports, module){
// }
window.onload = function (){
    let wrap = document.getElementById("wrap");
    let pic=document.getElementById('pic').getElementsByTagName("li");
    console.log(pic);
    let list=document.getElementById('list').getElementsByTagName('li');
    let index=0;
    let timer=null;
    // 自动播放
    timer = setInterval(autoPlay, 2000);
    // 鼠标划入清除定时器
    wrap.onmouseover = function () {
        clearInterval(timer);
    }
    wrap.onmouseout = function () {
        timer = setInterval(autoPlay, 2000);
    }
    // 遍历所有数字导航实现划过切换至对应的图片
    for (let i = 0; i < list.length; i++) {
        list[i].onmouseover = function () {
            clearInterval(timer);
            index = this.innerText - 1;
            changePic(index);
        };
    }
    function autoPlay () {
        if (++index >= pic.length) index = 0;
        changePic(index);
    }
    // 轮播图切换
    function changePic (curIndex) {
        for (let i = 0; i < pic.length; ++i) {
            pic[i].style.display = "none";
            list[i].className = "";
        }
        pic[curIndex].style.display = "block";
        list[curIndex].className = "active";
        // pic.style.width = '331px';
    }
}
