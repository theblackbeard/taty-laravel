/*
$("#categories").change(function() {
        if($(this).val() === 'new'){
                location.href = '/admin/categories/new';
        }
});
*/

$(function(){
     $('#tags').tagsInput({
    'height':'60px',
    'width':'280px',
    'defaultText':"Adicione",
  });


    var animationType = 'animated infinite pulse';
    var animationCarv = 'animated infinite rubberBand';
    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    $('img.effect').on(
        {mouseenter : function() {
            $(this).addClass(animationType).one(animationEnd);
        },
        mouseleave: function(){
           $(this).removeClass(animationType);
        }
    });

    $('a.carv').hover(function() {
          $('a.carv').addClass(animationCarv).one(animationEnd);
    }, function() {
          $('a.carv').removeClass(animationCarv);
    });
   
    var $btns = $('.port_filter').click(function() {
        if(this.id == 'all'){
            $('.row > div').fadeIn('slow');
        }else{
            var $el = $('.' + this.id).fadeIn('slow');
            $('.row > div').not($el).hide();
        }
          $btns.removeClass('active');
          $(this).addClass('active');
    });
    var _update = false;
    var _delete = false;
    $("#menu_update").click(function(){

        if(_update == false){
             $('#opcoes').append('<h1 id="title_1">Deseja realmente atualizar?</h1>')
             .append('<input type="hidden" name="_method" class="put_hidden" value="PUT">')
             .append('<button class="btn btn-success update" type="submit" ><span class="glyphicon glyphicon-ok icon"></span>Sim, Atualizar</button>');
             _update = true;

             $('h1#title_2').remove('#title_2');
             $('input.delete_hidden').remove('.delete_hidden');
             $.when($('input.delete').remove('.delete')).then(_delete = false);
             
        }
      
      
    })

 
      $("#menu_delete").click(function(){
         if(_delete == false){
            $('#opcoes').append('<h1 id="title_2">Deseja realmente Remover?</h1>')
             .append('<input type="hidden" name="_method" class="delete_hidden" value="DELETE">')
             .append('<button class="btn btn-danger delete" type="submit" ><span class="glyphicon glyphicon-remove icon"></span>Sim, Remover</button>');
              _delete = true;
            $('h1#title_1').remove('#title_1');
            $('input.put_hidden').remove('.put_hidden');
            $.when($('input.update').remove('.update')).then(_update = false);
           
         }
          
    })

   $('.popup-gallery').magnificPopup({
    delegate: 'a',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title') + '<small>by Tatiana S. Santana</small>';
      }
    }
  });


/*
    $('#menu').blur(function(){
        var name = $(this).val();
        var t = $.get( "/admin/menus/menu_name/" + name, function(data){
            $(this).val(data);
        })
        
       
      })  */

  

});




function submitFunc(i){
    if(i==1) document.thePhoto.action = "{{ '/admin/articles/' + article.id + '/lessphoto'}}";
    if(i==2) document.thePhoto.action = "{{ '/admin/articles/' + article.id + '/savetitle'}}";
    //document.thePhoto.submit();
}

