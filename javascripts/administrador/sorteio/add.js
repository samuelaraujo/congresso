$(document).ready(function(){

    function save(){
        app.util.getjson({
            url : "/controller/administrador/sorteio/add",
            method : 'POST',
            contentType : "application/json",
            success: function(response){
                if(response.success){
                    $('h1#id').html(response.results.id);
                    $('h3#cliente').html(response.results.cliente);
                    //hidden
                    $('.modal-loading').addClass('hidden');
                    $('.modal-header').removeClass('hidden');
                    $('.modal-body').removeClass('hidden');
                    $('.modal-footer').removeClass('hidden');
                }
            },
            error : onError
        });
    };

    $('button#girar').livequery('click',function(event){
        $('h1#id').html('0000000');
        $('h3#cliente').html('???????');
        setTimeout(function(){
            save();
        }, 10000);
    });

    function onError(response) {
      console.log(response);
    }

    //save
    setTimeout(function(){
        save();
    }, 5000);

});