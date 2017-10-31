var user = sessionStorage.getItem('1');
var cpf = sessionStorage.getItem('2');
console.log(user);
console.log(cpf);
 //Limpar
localStorage.clear();

var divNome = document.querySelector('.name');
var divCpf = document.querySelector('.cpf');
var divData = document.querySelector('.data');
 
divNome.innerHTML = user;
divCpf.innerHTML = cpf;
divData.innerHTML = dataAtualFormatada();

function dataAtualFormatada(){
    var data = new Date();
    var dia = data.getDate();
    if (dia.toString().length == 1)
      dia = "0"+dia;
    var mes = data.getMonth()+1;
    if (mes.toString().length == 1)
      mes = "0"+mes;
    var ano = data.getFullYear();  
    var hora = data.getHours(); 
    var min = data.getMinutes(); 
    var seg = data.getSeconds();  
    return dia+"/"+mes+"/"+ano + " As " + hora+":"+min+":"+seg;
}

var pdf = document.querySelector("#btn-pdf");
console.log(pdf);

pdf.addEventListener("click", function(event) {

    function pdf() {
   
            var d = new Date();
            var n = d.getTime();
            var doc = new jsPDF('landscape');
                doc.addHTML($('div#certificado'), function() {

                doc.save("certificado-pdf-"+n+".pdf");
            });
      return doc;
    };


   
    pdf();
     
});


