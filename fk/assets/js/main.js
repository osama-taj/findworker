 // Trigger MixitUp
    

 $(function () {
    mixitup( $('#Container'));
 // Adjus Shuffle Links
 $('.shuffle a').click(function () {    
     $(this).addClass('active').siblings().removeClass('active');
 });



 // 

 function getElementsByText(str, tag = 'a') {
    return Array.prototype.slice.call(
        document.getElementsByTagName(tag)).filter(el => el.textContent.trim().search(str.trim()) >= 0
        );
  }
console.log();

  function getdiv(ser){
        $('.mix').css(
            'display', 'none'
        );
        $(getElementsByText(ser, 'h5')).parent().parent().parent().parent().parent().css(
            'display', 'block'
        );
        console.log(getElementsByText(ser, 'h5'));
  }

  document.getElementById('search').onkeyup = function (){
    getdiv(this.value)
  }

 /* document.getElementById('form-search').onsubmit = function (){
    var myinput = document.getElementById('search');
    getdiv(myinput.value)


    return false;
  }*/



});