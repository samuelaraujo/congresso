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

    function onError(response) {
      console.log(response);
    }

    //save
    save();

    
    setTimeout(function() {
    console.log("loading1...");
    save1();   
    }, 5000);
       
     setTimeout(function() {
        console.log("loading...");
     save();
     }, 10000);
   

});