// test
console.log("beep");

// validation
$('input[type="submit"]').click( function(){
    $('form').addClass('submitted');
});

// header/nav scroll
$(window).on('scroll',function(){
     if ($(window).scrollTop() >= 50) {
         $('.navbar').css({
          'background' : 'var(--accent)',
          'color' : '#fff',
          'box-shadow' : '3px 3px 7px rgba(0,0,0,0.3)',
         });             
         $('.navbar li a').css({
          'color' : '#fff',
          'padding' : '20px',          
         });  
         $('.navbar li:hover').css({
          'opacity' : '0.5',
          // 'background' : 'var(--darkaccent)',          
         });  
     } else {
         $('.navbar').css({
             'background' : 'transparent',
             'color' : '#fff',
             'box-shadow' : 'none',
         });
         $('.navbar li a').css({
          'color' : '#fff',
          'padding' : '30px',
         });  
         $('.navbar li:hover').css({
          'opacity' : '0.8',
          'background' : 'none',          
         });  
     }
 });