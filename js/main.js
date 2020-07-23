
function veriEmail(){
    event.preventDefault();
    document.getElementById("form_1").style.display = "none";
    document.getElementById("form_3").style.display = "none";
    document.getElementById("btn_enviar").style.display = "none";
    document.getElementById("btn_verifica").style.display = "block";
}

function consultaEmail(){

        var r = document.getElementById("email");      
        event.preventDefault();   
        //Retirar após debug
        console.log(encodeURIComponent(r.name) + "=" + encodeURIComponent(r.value));
        var y = new XMLHttpRequest();        
        y.open("POST", "src/contato_ctrl.php", true);       
        y.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        y.send(encodeURIComponent(r.name) + "=" + encodeURIComponent(r.value)+"&" + "verifica_email="+"");    
        y.onreadystatechange = function(event){    
            if (this.readyState == 4 && this.status == 200) {
                var errors;
                 errors = JSON.parse(this.responseText);
                //Retirar após debug
                console.log(errors);
                if(errors==0){
                    document.getElementById("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial."
                    
                    document.getElementById("contato-form").style.display = "none";
                    document.getElementById("msg").style.display = "block";	

                    document.getElementById("num1").value="";
                    document.getElementById("num2").value="";
                }
                console.log(this.responseText);
        
                if(errors["email"]){
                    var x = document.getElementById("email_error");
                    x.textContent = errors.email;
                    x.style.display = "block";
            }

            if(errors["usuario"]){
                alert(errors['usuario']);
            }
           
    
            
        }
       
        }


    }


function calculaGotas(){ 
      var input_ml = document.getElementById("num1");
      var input_perc = document.getElementById("num2");
      

      if(parseFloat(input_ml.value)==0 || input_ml.value==""){
            var x = document.getElementById("ml_error");
            x.textContent = "Valor deve ser maior que 0!"
            x.style.display = "block";
       }    
       if(parseFloat(input_perc.value)==0 || input_ml.value==""){
            var x = document.getElementById("perc_error");
            x.textContent = "Valor deve ser maior que 0!"
            x.style.display = "block";
       }

       if(parseFloat(input_ml.value)>0 && parseFloat(input_perc.value)>0){
            var perc_valor = parseFloat(input_perc.value/100);
          
            var gotas = Math.round(parseFloat((parseFloat(input_ml.value)*perc_valor*0.25)*100));
        
            document.getElementById("msg").style.display = "none";

            document.getElementById("water-drop").style.display = "block";
            var result = document.createElement("span");

            var result_container = document.createElement("div");
            var btn_container = document.createElement("div");
            var btn_reset = document.createElement("input");
            document.getElementById("grid").appendChild(result_container);
            result_container.setAttribute("id", "result");
            result_container.setAttribute("class", "gotas");
            btn_container.setAttribute("class", "container_btn");
            btn_reset.setAttribute("class", "btn");
            btn_reset.setAttribute("id", "reset");
            btn_reset.setAttribute("type", "button");
            btn_reset.setAttribute("value", "Novo Cálculo");
            result_container.appendChild(result);
            result_container.appendChild(btn_container);
            btn_container.appendChild(btn_reset);
            result.setAttribute("style", "top: -25px; position: relative;")

            btn_container.setAttribute("style", "position: relative;top: 50px;")
            

          
            document.getElementById("msg2").innerHTML="Para os valores especificados, você deverá diluir "
            + "<b>" + gotas +"</b>" + " gotas em seu óleo essencial.";


            result.innerHTML = gotas + " gotas";
     

             
       }


   };
   
/*!
 * Serialize all form data into a query string
 * (c) 2018 Chris Ferdinandi, MIT License, https://gomakethings.com
 * @param  {Node}   form The form to serialize
 * @return {String}      The serialized form data
 */
function serialize(form) {

    // Setup our serialized data
    var serialized = [];

    // Loop through each field in the form
    for (var i = 0; i < form.elements.length; i++) {

        var field = form.elements[i];

        // Don't serialize fields without a name, submits, buttons, file and reset inputs, and disabled fields
        if (!field.name || field.disabled || field.type === 'file' || field.type === 'reset' || field.type === 'submit' || field.type === 'button') continue;

        // If a multi-select, get all selections
        if (field.type === 'select-multiple') {
            for (var n = 0; n < field.options.length; n++) {
                if (!field.options[n].selected) continue;
                serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[n].value));
            }
        }

        // Convert field data to a query string
        else if ((field.type !== 'checkbox' && field.type !== 'radio') || field.checked) {
            serialized.push(encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value));
        }
    }

    return serialized.join('&');

};
/*
function validaCampos(form){

    var form = document.getElementById("contato-form");
    if(form.elements.namedItem("nome_contato").value=="" || 
    form.elements.namedItem("email_contato").value==""
    ||form.elements.namedItem("telefone_contato").value==""){
        alert("Campo vazio");
        return false;
    }else{

    return true;
    }

}*/


function inserirContato(){
    var form2 = document.getElementById("contato-form");     
        event.preventDefault();  
        var s = serialize(form2);
        //Retirar após debug
        console.log(s);
        var y = new XMLHttpRequest();        
        y.open("POST", "src/contato_ctrl.php", true);       
        y.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        y.send(s);    
        y.onreadystatechange = function(event){    
            if (this.readyState == 4 && this.status == 200) {
                var errors;
                errors = JSON.parse(this.responseText);
                //Retirar após debug
                console.log(errors);
                if(errors==-1){
                    document.getElementById("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial."
                    
                    document.getElementById("contato-form").style.display = "none";
                    document.getElementById("msg").style.display = "block";	

                    document.getElementById("num1").value="";
                    document.getElementById("num2").value="";
                }
                //Verificar uma forma melhor de fazer essa validação utilizando O JSON
                if(errors["nome"]){
                    var s = document.getElementById("nome_error");
                    s.textContent = errors.nome;
                    s.style.opacity = "1";
                }
                if(errors["email"]){
                    var x = document.getElementById("email_error");
                    x.textContent = errors.email;
                    x.style.display = "block";
                }
                if(errors["telefone"]){
                    var u = document.getElementById("telefone_error");
                    u.textContent = errors.telefone;
                    u.style.display = "block";
                }

                if(errors["usuario"]){
                    alert(errors['usuario']);
                }
               
        }   
    form2.reset();   
    }
    document.getElementById("nome_error").style.opacity = "0";
    document.getElementById("email_error").style.display = "none";
    document.getElementById("telefone_error").style.display = "none";
}

