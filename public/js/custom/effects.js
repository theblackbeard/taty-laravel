var effects = [
	'wow fadeInLeft', 
	'wow bounceInLeft',
	'wow bounceIn',
	'wow fadeInRight',
	'wow zoomIn',
	'wow fadeIn',
	'wow fadeInUp'

	];
var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
  
//titles
$('#content > h1').addClass(effects[3]).one(animationEnd);
$('#content > h2').addClass(effects[4]).one(animationEnd);
$('.esquerda').addClass(effects[0]).one(animationEnd);
$('.direita').addClass(effects[3]).one(animationEnd);
$('#quick-contact').addClass(effects[6]).one(animationEnd);

$('.gallery').addClass(effects[5]).one(animationEnd);
$('#photo_perfil').addClass(effects[1]).one(animationEnd);
$('#perfil').addClass(effects[2]).one(animationEnd);

$('.gallery').addClass(effects[6]).one(animationEnd);

//contact
$('#form').addClass(effects[2]).one(animationEnd);
$('#contact').addClass(effects[5]).one(animationEnd);

//login
$('#login').addClass(effects[2]).one(animationEnd);


$('#a_form').addClass(effects[2]).one(animationEnd);

$('.showE').addClass(effects[5]).one(animationEnd);