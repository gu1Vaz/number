var  url;
if(location.origin.includes("localhost")){
    url = location.origin+"/";
}else{
    url = location.origin+window.location.pathname.substr(0, window.location.pathname.indexOf("public/")+7);
}
export {url}
