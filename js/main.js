'use strict';
const c = {b:"block", n:"none", f:"flex"}
const abreCalculadora = (e) => {
    if(e==-1 || e==1) { 
          op("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial.";              
          u(op("contato-form"), c.n);
          u(op("btn_verifica"), c.n);
          u(op("msg"), c.f);
          u(op("btncalc"), c.b);
          op("msg").style.flexDirection = "column";
          window['num1'].focus();
          op("num1").value=''
          op("btn_enviar").style.display = "none";
          op("num2").value=''; 
          document.querySelector(".container_btn").style.marginTop = "0px"; 
          document.querySelector(".grid-form").setAttribute("rota", "m1"); 
          op("btncalc").style.marginTop ="0px";
          op("gota_campo").addEventListener("keypress", (event) => {        
            if(event.keyCode==13){
                window['num1'].focus();
                }
        },);      
          op("num1").addEventListener("keypress", (event) => {
                    if(event.keyCode==13){
                        window['num2'].focus();
                        }
                },);       
         op("num2").addEventListener("keypress", (event) => {        
                    if(event.keyCode==13){                     
                        if(navigator.appCodeName == "Mozilla"){                        
                            window['btncalc'].focus()
                            window['btncalc'].click();                             
                        }else{
                            window['btncalc'].click();
                        }
                  }                        
                }, );        
    }
};
function veriEmail(){
    event.preventDefault();      
    const q = [
        op("email_error").style.visibility = "hidden",
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
        const r = op("email");      
        event.preventDefault();   
        const y = new XMLHttpRequest();        
        y.open("POST", "src/contato_ctrl.php", true);       
        y.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        y.send(encodeURIComponent(r.name) + "=" + encodeURIComponent(r.value)+"&" + "verifica_email="+"");    
        y.onreadystatechange = function(event){    
            if (this.readyState == 4 && this.status == 200) {
                var errors;
                 errors = JSON.parse(this.responseText);
                abreCalculadora(errors);
                if(errors["email"]){
                    var x = op("email_error");
                    x.innerHTML = errors.email;
                    x.style.display = "block";
                    x.style.visibility = "visible";
                    op("email").focus();                    
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
    }
}
function b(p,b,o){
        if(p){
          p.setAttribute(b,o);
        }
    }
const a = {r:n("div"),b:n("div"),c:n("input"),d:"u+",g:"u+",y:n("span"),h:"u+"};
const z = {i:"id", c:"class", t:"type", v:"value", s:"style", j:"onclick"};
window.onload = function(){
    op("padrao").checked = true;  
    op("gota_ml").checked = false;
}
const yr = () => {   
    u(op("btncalc"), c.b); 
    op("padrao").checked = true;  
    op("gota_ml").checked = false;  
    op("qtd_gotas").innerHTML = '';
    op("padrao_msg").style.display = "block";
    op("gota_campo").value = '';
    op("gota").style.display = "none"
    op("water-drop").style.display = "none";
    op("reset").style.display = "none";         
    op("msg2").innerHTML ="Digite a quantidade em ML e a porcentagem de diluição do seu óleo essencial." ;               
    op("contato-form").style.display = "none";
    op("msg").style.display = "flex";
    op("msg").style.flexDirection = "column";
    window['num1'].focus();
    op("num1").value='';
    op("num2").value='';
};
function calculaGotas(){ 
      const i = {ml:null, perc:null, gota: null};
      i.ml= op("num1");
      i.perc = op("num2");            
      if(op("gota_ml").checked){       
          i.gota = op("gota_campo").value;
      }else if(op("padrao").checked){
            i.gota = 25;
      }
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
       if(parseFloat(i.gota)==0 || i.gota==""){
        const x = op("gota_error");
        x.textContent = "Valor deve ser maior que 0!"
                x.style.display = "block";
        }else{
            op("gota_error").style.display="none";
        }
       if(parseFloat( i.ml.value)>0 && parseFloat(i.perc.value)>0 && parseFloat(i.gota)>0){
                a.d = parseFloat(i.perc.value/100);
                a.h = parseFloat(i.gota/100);
                console.log(a.h);
                a.g = Math.round(parseFloat((parseFloat(i.ml.value)*a.d*a.h)*100));
                op("msg").style.display = "none";
                op("water-drop").style.display = "block";
                const v  = [
                    b(a.c, z.c, "btn"),
                    b(a.c,z.i, "reset"),
                    b(a.c,z.t, "button"),
                    b(a.c,z.v, "Novo Cálculo"),
                    b(a.c,z.j, "yr()")
                  ];
                op("water-drop").append(a.r);   
                a.r.append(a.y);
                b(a.r,z.c,"gota-container")       
                op("water-drop").append(a.r);
                op("buttons").insertBefore(a.c,op("buttons").childNodes[5]);
                b(a.y,z.s, "top: -5px; position: relative;");
                b(op("#social"), z.s, "margin-top:55px;");
                if(op("reset")){
                    op("reset").style.display = "block";   
                }               
                b(a.b,z.s, "position: relative;top: 50px;");
                a.h = "<b>"+"Para uma diluição dos valores especificados, você deverá diluir "
                + "<span style='color:#DAA521; font-weight:bolder';>"+a.g +"</span>" + " gotas em seu óleo essencial."+"<br>" + "<b>" ;
                 document.getElementsByClassName("grid-form")[0].setAttribute("rota", "m2");
                b(op("buttons"), z.s, "margin-top:-10px");
                u(op("btncalc"), c.n);
                op("msg2").innerHTML=a.h;
                a.c.style.marginTop = "0px";
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
function inserirContato(event){
        const form2 = op("contato-form");     
        event.preventDefault();  
        var s = serialize(form2);
        const y = new XMLHttpRequest();        
        y.open("POST", "src/contato_ctrl.php", true);       
        y.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        y.send(s);    
        y.onreadystatechange = function(event){    
            if (this.readyState == 4 && this.status == 200) {
                var errors;
                errors = JSON.parse(this.responseText);          
                abreCalculadora(errors);               
                if(errors["nome"]){
                    var s = op("nome_error");
                    s.innerHTML = errors.nome;
                    s.style.visibility = "visible";
                    op("nome").focus();
                }else{
                    op("nome_error").style.display = "none"
                }
                if(errors["telefone"]){
                    var u = op("telefone_error");
                    u.innerHTML  = errors.telefone;
                    u.style.visibility = "visible"; 
                }else{
                    op("telefone_error").style.display = "none"
                }
                if(errors["email"]){
                    var x = op("email_error");
                    x.innerHTML  = errors.email;
                    x.style.visibility = "visible";
                }else{
                    op("email_error").style.display = "none"
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
                        abreCalculadora(errors['size']);
                        op("num1").value=''
                        op("num2").value='';
                        },1500);                    
                    }
        }   
    }
}
function loginPainel(event){
        var form2 = op("form-admin");     
        event.preventDefault();  
        var s = serialize(form2);
        var y = new XMLHttpRequest();        
        y.open("POST", "src/admin_ctrl.php", true);       
        y.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        y.send(s);    
        y.onreadystatechange = function(event){    
            if (this.readyState == 4 && this.status == 200) {
            if(this.responseText.match("<!DOCTYPE html>")){              
                    window.location.assign("lista.php");                  
            }else{ 
                var errors;
                errors = JSON.parse(this.responseText);
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