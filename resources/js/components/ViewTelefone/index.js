import React, { useState }from 'react';
import { FaTimes } from 'react-icons/fa';
import {url} from '../../scripts/config.js';
import { DivNumeroView,Caixa,DivDireita,DivEsquerda,BotaoFechar,DivDados } from './styles';


var dadosNumero = {
    id:""
};
function fecharViewTelefone(){
    var view = document.getElementById("viewNumero");
    var fundo = document.getElementById("fundoOpaco");
    view.remove();
    fundo.remove();
}

class ViewTelefone extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
          dados: [],
        };
      }
   componentDidMount() {
        console.log(url);
        var urlCompleta = new URL(url+'verNumero/'+dadosNumero.id)
        fetch(urlCompleta)
        //fetch(location.protocol+'/verNumeros/'+dadosNumero.id)
        .then(res => res.json())
        .then(
        (result) => {
            this.setState({ dados: result });
        },
        (error) => {

        }
      )
   }
   render(){
       const {dados} = this.state
       var urlImage = url+"XX"+ dados.image_url;
       urlImage = urlImage.replace("XXpublic/","storage/")
    return(
        <>
        <Caixa  className="fixed-bottom" >
        <DivNumeroView className="card bg-white shadow-sm  m-2 border-white mb-3" >
            <DivEsquerda>
            <img src={urlImage}   className="img-thumbnail rounded-circle"/>
            <div style={{height:"40px"}} ></div>
            <h4>{dados.ref}</h4>
            </DivEsquerda>
            <hr style={{height:"80%",width:"0",border:"1px solid #bbb",border_radius: "10px"}}></hr>
            <DivDireita>
                <DivDados>
                <div>
                  <h3>Nome: {dados.ref}</h3>
                  <h3>Numero: {dados.numero}</h3>
                  <h3>Tipo: {dados.tipo}</h3>
                  <h3>Pais: {dados.pais}</h3>
                  <h3>DDD: {dados.ddd}</h3>
                </div>
                </DivDados>
               <BotaoFechar onClick={fecharViewTelefone}> <img src={'imgs/cancel.png'}></img></BotaoFechar>
            </DivDireita>
        </DivNumeroView>
        </Caixa>
        </>
   )
 }
}


export {ViewTelefone};
export {dadosNumero};


