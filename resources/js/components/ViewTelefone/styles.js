import styled from 'styled-components';
export const Caixa = styled.div`
    display: flex;
    flex-direction: row;
    position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top:0;
    justify-content:center;
    align-items:center;
`;


export const DivNumeroView = styled.div`
    display: flex;
    opacity:1;
    flex-direction: row;
    width: 70%;
    height: 70%;
    align-items:center;

`;
export const DivEsquerda = styled.div`
    display: flex;
    flex-direction: column;
    width: 35%;
    height: 100%;
    align-items:center;
    justify-content:center;
    img{
        width:154px !important;
        object-fit: cover;
        height:154px !important;
        max-width: none !important;
}
`;
export const DivDireita = styled.div`
    display: flex;
    flex-direction: row;
    width: 64%;
    height: 100%;
`;

export const BotaoFechar = styled.button`
    display: flex;
    border: 0 none;
    &:hover {
        box-shadow: 0 0 0 0;
        border: 0 none;
        outline: 0;
      }
    background:transparent;
    flex-direction: row;
    justify-content:center;
    align-items:center;
    width: 8%;
    height: 16%;
    img{
       width:20px;
       height:20px;
    }

`;
export const DivDados = styled.div`
    display: flex;
    flex-direction: row;
    width: 92%;
    padding:60px;
    height: 100%;
    justify-content:flex-start;
    align-items:flex-start;
    div{
        display: flex;
        flex-direction: column;
        justify-content:flex-start;
        height:100%;
        width:100%;
        input{
            display:none;
        }
        h3{
            margin 14px;
        }
    }
`;

