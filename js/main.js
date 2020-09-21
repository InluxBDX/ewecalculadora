
'use strict';
const abreCalculadora = (e) => {
    if(e==-1) { 
          op("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial.";              
          u(op("contato-form"), c.n);
          u(op("btn_verifica"), c.n);
          u(op("msg"), c.f);
          op("msg").style.flexDirection = "column";
          op("num1").value=''
          op("btn_enviar").style.display = "none";
          op("num2").value=''; 
          document.querySelector(".container_btn").style.marginTop = "0px";       
    }
};

function veriEmail(){
    event.preventDefault();      
    const q = [
        u(op("email_error"),c.n),
        u(op("form_1"),c.n),
        u(op("form_3"),c.n),
        u(op("btn_enviar"),c.n),
        u(op("btn_verifica"), c.b),
        op("msg2").innerHTML = "Digite seu e-mail cadastrado no campo abaixo, para"
        + " acessar a caculadora"
    ]    
}
function u(b,c){
    if(b){
        b.style.display = c;
    }
}

function habilitaFormCad(event){
    event.preventDefault();
    u(op("form_1"), c.b);
    u(op("form_3"),c.b);
    u(op("btn_enviar"), c.b);
    u(op("btn_verifica"), c.n);
}

function consultaEmail(event){
        var r = op("email");      
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
                abreCalculadora(errors);
                console.log(this.responseText);
        
                if(errors["email"]){
                    var x = op("email_error");
                    x.textContent = errors.email;
                    x.style.display = "block";
                 }

                if(errors["usuario"]){
                    var modal = document.createElement("div");
                    var modal_content = document.createElement("div");
                    var close = document.createElement("span");
                    var text = document.createElement("p");

				close.setAttribute("class", "close-style");

				modal.setAttribute("class", "modal-style");
				modal_content.setAttribute("class", "modal-content-style");
				text.setAttribute("id", "modal-text");
				close.setAttribute("class", "close-style")
				close.setAttribute("id", "close-modal")
				modal.setAttribute("id", "modal-interesse");
				close.innerHTML ="x";
				
				document.body.append(modal);
				modal.appendChild(modal_content);
			
				modal_content.appendChild(text);
																
				op("modal-text").style.fontWeight = "bolder";
				op("modal-interesse").style.display = "block";
				op("modal-text").innerHTML = errors["usuario"];										
				op("modal-interesse").style.animationName = "modal-animacao-abrir";

                setTimeout(function(){
                    op("modal-interesse").style.animationName = "modal-animacao-fechar";
                    modal.style.display = "none";                    
                    window.location.reload();
                   
                },1500);
              
                }          
        }       
     }
    }

const n = (p) => {
        if(p){
          return document.createElement(p);
        };
}

function b(p,b,o){
        if(p){
          p.setAttribute(b,o);
        }
    }

const a = {r:n("div"),b:n("div"),c:n("input"),d:"u+",g:"u+",y:n("span"),h:"u+"};
const z = {i:"id", c:"class", t:"type", v:"value", s:"style", j:"onclick"};
const c = {b:"block", n:"none", f:"flex"}


const novoCalculo = () => {   
    op("water-drop").style.display = "none";
    op("reset").style.display = "none";         
    op("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial." ;               
    op("contato-form").style.display = "none";
    op("msg").style.display = "flex";
    op("msg").style.flexDirection = "column";
    op("num1").value='';
    op("num2").value='';
};

function calculaGotas(){ 
      const i = {ml:null, perc:null};

      i.ml= op("num1");
      i.perc = op("num2");      

      if(parseFloat(i.ml.value)==0 || i.ml.value==""){
            const x = op("ml_error");
            x.textContent = "Valor deve ser maior que 0!"
            x.style.display = "block";
       } else{
             op("ml_error").style.display="none";
       }
       if(parseFloat(i.perc.value)==0 || i.perc.value==""){
            const x = op("perc_error");
            x.textContent = "Valor deve ser maior que 0!"
            x.style.display = "block";
       }else{
        op("perc_error").style.display="none";
       }

       if(parseFloat( i.ml.value)>0 && parseFloat(i.perc.value)>0){
                a.d = parseFloat(i.perc.value/100);
                a.g = Math.round(parseFloat((parseFloat(i.ml.value)*a.d*0.25)*100));

                op("msg").style.display = "none";

                op("water-drop").style.display = "block";
 
                const v  = [
               
                    b(a.c, z.c, "btn"),
                    b(a.c,z.i, "reset"),
                    b(a.c,z.t, "button"),
                    b(a.c,z.v, "Novo Cálculo"),
                    b(a.c,z.j, "novoCalculo()")
                  ];
    
                op("water-drop").append(a.r);   
                a.r.append(a.y);
                b(a.r,z.c,"gota-container")       
                op("water-drop").append(a.r);
                op("buttons").insertBefore(a.c,op("buttons").childNodes[5]);
                
                b(a.y,z.s, "top: -25px; position: relative;");
                b(op("#social"), z.s, "margin-top:55px;");

                if(op("reset")){
                    op("reset").style.display = "block";   
                }


                b(a.b,z.s, "position: relative;top: 50px;");
                a.h = "<b>"+"Para os valores especificados, você deverá diluir "
                + a.g + " gotas em seu óleo essencial."+"<br>" + "<b>" ;

                //a.c.addEventListener("click", novoCalculo());
                op("msg2").innerHTML=a.h;
              
                a.y.innerHTML = a.g;          
                }
   };
   
function op(b){
    if(b){
       return document.getElementById(b);
    }
}
  
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

        // Don't serialize fields without a name, submits, buttons, file and reset i, and disabled fields
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
function inserirContato(event){
    var form2 = op("contato-form");     
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
                abreCalculadora(errors);               
                //Verificar uma forma melhor de fazer essa validação utilizando O JSON
                if(errors["nome"]){
                    var s = op("nome_error");
                    s.textContent = errors.nome;
                    s.style.opacity = "1";
                }
                if(errors["email"]){
                    var x = op("email_error");
                    x.textContent = errors.email;
                    x.style.display = "block";
                }
                if(errors["telefone"]){
                    var u = op("telefone_error");
                    u.textContent = errors.telefone;
                    u.style.display = "block";
                }
                if(errors["usuario"]){
                    var modal = document.createElement("div");
                    var modal_content = document.createElement("div");
                    var close = document.createElement("span");
                    var text = document.createElement("p");

			        close.setAttribute("class", "close-style");

                    modal.setAttribute("class", "modal-style");
                    modal_content.setAttribute("class", "modal-content-style");
                    text.setAttribute("id", "modal-text");
                    close.setAttribute("class", "close-style")
                    close.setAttribute("id", "close-modal")
                    modal.setAttribute("id", "modal-interesse");
                    close.innerHTML ="x";
                    
                    op("grid").append(modal)
                    modal.appendChild(modal_content);
                    
                    modal_content.appendChild(text);
                                                                    
                    op("modal-text").style.fontWeight = "bolder";
                    op("modal-interesse").style.display = "block";
                    op("modal-text").innerHTML = errors["usuario"] + "<br>" + "Redirecionando para a calculadora..";										
                    op("modal-interesse").style.animationName = "modal-animacao-abrir";

                    setTimeout(function(){
                        op("modal-interesse").style.animationName = "modal-animacao-fechar";
                        modal.style.display = "none";                    
                        op("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial."
                                        
                        op("contato-form").style.display = "none";
                        op("msg").style.display = "block";	
                        op("btn_enviar").style.display = "none";
            
                        op("num1").value=''
                        op("num2").value='';

                    },1500);                    
                    }
                
        }   
    //form2.reset();   
    }
    op("nome_error").style.opacity = "0";
    op("email_error").style.display = "none";
    op("telefone_error").style.display = "none";
}



function loginPainel(event){
        var form2 = op("form-admin");     
        event.preventDefault();  
        var s = serialize(form2);
        //Retirar após debug
        console.log(s);
        var y = new XMLHttpRequest();        
        y.open("POST", "src/admin_ctrl.php", true);       
        y.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        y.send(s);    
        y.onreadystatechange = function(event){    
                
                //Retirar após debug
                        
            if (this.readyState == 4 && this.status == 200) {
               
            if(this.responseText.match("<!DOCTYPE html>")){              
                    window.location.assign("/ewecalculadora/lista.php");                  
            }else{ 
                var errors;
                errors = JSON.parse(this.responseText);
                console.log(errors);   
            if(errors["nome_usuario"]){
                    var s = op("usuario_error");
                    s.textContent = errors.nome_usuario;
                    s.style.opacity = "1";
                }
            if(errors["senha"]){
                    var x = op("senha_error");
                    x.textContent = errors.senha;
                    x.style.display = "block";
                }

             }
            
     }
}
}



