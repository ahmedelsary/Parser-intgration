
 var mark=document.getElementById('mark');
 var model=document.getElementById('model');
 mark.addEventListener("change",find);

function find(){
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  var xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","http://196.205.93.170:21119/parser/index.php/Search/getModels?mark=" + mark.value,true);
xmlhttp.send();

xmlhttp.onreadystatechange=function(){
if(xmlhttp.readyState==4 && xmlhttp.status==200){
model.innerHTML=xmlhttp.responseText;


}
}
}

