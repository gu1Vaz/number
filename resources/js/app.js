import React from 'react';
import ReactDOM from 'react-dom';
import {ViewTelefone,dadosNumero} from './components/ViewTelefone';

require('./bootstrap');


//var valores = e.target.childNodes[5]
//var divPai = e.target.parentNode
//var valores = pegarNumero(2);
//definirValores(valores.innerText);

const gerarDivViewNumero = e =>{
    e.preventDefault()
    var body = document.getElementById('body');

    var divView = document.createElement("div");
    var divFundo = document.createElement("div");

    divView.id = 'viewNumero';
    divFundo.id = 'fundoOpaco';

    divFundo.style.height= $("body").innerHeight() +"px";

    body.appendChild(divFundo);
    body.appendChild(divView);

    dadosNumero.id = e.target.name;
    ReactDOM.render(<ViewTelefone />, document.getElementById('viewNumero'));

}
function linkarComponentes(){
    var obj = document.querySelectorAll("#numero");

    Object.keys(obj).forEach((key) => {
        obj[key].addEventListener("click", gerarDivViewNumero);
    });
}

window.onload = function(){
    document.getElementById("loading").style.display = "none";
    document.getElementById("app").style.display = "inline";
}
setTimeout(function() {
    $('#alerta').fadeOut('fast');
 }, 1500);
linkarComponentes();
