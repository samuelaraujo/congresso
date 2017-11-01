var user = sessionStorage.getItem('1');
var cpf = sessionStorage.getItem('2');
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
    return dia+"/"+mes+"/"+ano + " As " + hora+":"+min+":"+seg+" Hs";
}

var pdf = document.querySelector("#btn-pdf");

pdf.addEventListener("click", function(event) {

    function pdf() {
   
            var d = new Date();
            var n = d.getTime();
            var doc = new jsPDF('l', 'pt', 'a4');
           
            doc.addHTML($('div#certificado'), function() {
            doc.save("certificado-pdf-"+n+".pdf")
            });


      return doc;
    };


   
    pdf();
     
});

var pdfImp = document.querySelector("#btn-pdfImp");
var footer = document.querySelector(".modal-footer");

pdfImp.addEventListener("click", function(event) {
    footer.classList.add("hidden");
    window.print();
    footer.classList.remove("hidden");

     
});


