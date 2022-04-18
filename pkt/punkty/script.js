var i = 0;
function hiddenPanel(){
    if(i == 0)
    {
        console.log("if");
        document.getElementById('nav').style.display='none';
        document.getElementById('buttons').style.width='100%';
        document.getElementById('buttons').style.clear='both';
        document.getElementById('buttons').style.padding='2vw';
        document.getElementById('hidden').style.display='inline';
        document.getElementById('hidden').style.margin='0 3vw';
        document.getElementById('hidden').innerHTML='Zmniejsz';
        document.getElementById('buttons').style.clear='both';
        document.getElementById('article').style.width='100%';
        document.getElementById('tabela').style.width='90%';
        document.getElementById('tabela').style.margin='auto'; 
        i = 1;
    }
    else
    {
        console.log("else");
        document.getElementById('nav').style.display='block';
        document.getElementById('buttons').style.width='30%';
        document.getElementById('buttons').style.clear='none';
        document.getElementById('buttons').style.padding='0';
        document.getElementById('hidden').style.display='block';
        document.getElementById('hidden').style.margin='1vw auto';
        document.getElementById('hidden').innerHTML='Powiększ';
        document.getElementById('buttons').style.clear='none';
        document.getElementById('article').style.width='70%';
        document.getElementById('tabela').style.width='100%';
        document.getElementById('tabela').style.margin='auto'; 
        i = 0;
    }

}