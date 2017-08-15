$(document).ready(function(){

    function list(){

        //hidden
        $('#col-title').addClass('hidden');
        $('#add').addClass('hidden');
        $('#table-results').addClass('hidden');
        $('#table-loading').removeClass('hidden');

        //list
        app.util.getjson({
            url : "/controller/administrador/sorteio/list",
            method : 'POST',
            contentType : "application/json",
            success: function(response){
                if(response.results){
                    var html = '';
                    for (var i=0;i<response.results.length;i++) {
                        html += '<tr>'+
                                    '<td>'+ (i+1) + '</td>'+
                                    '<td>'+ response.results[i].created_at + '</td>'+
                                    '<td>'+ response.results[i].cliente + '</td>'+
                                    '<td>'+ response.results[i].cpf + '</td>'+
                                '</tr>';
                    }
                    $("table#table-results > tbody").html(html);
                    
                    //show
                    $('#col-title').removeClass('hidden');
                    $('#add').removeClass('hidden');
                    $('#table-results').removeClass('hidden');
                    $('#table-loading').addClass('hidden');
                }
            },
            error : function(){
                //hidden
                $('#col-title').removeClass('hidden');
                $('#add').removeClass('hidden');
                $('#table-results').removeClass('hidden');
                $('#table-loading').addClass('hidden');
            }
        });
    }

    //add
    $('button#sortear').livequery('click',function(event){
        id =  $(this).data('id');

        var options = {
            cache:false,
            show: true,
            keyboard: false,
            backdrop: 'static'
        }
        $("div#modal").modal(options);

        //clear
        $('div#modal .modal-content').html('');

        $('div#modal .modal-content').load('views/administrador/sorteio/sortition.php');
        return false;
    });

    function onError(response) {
      console.log(response);
    }

    //init
    list();

});