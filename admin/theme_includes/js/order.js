function Ajax(){
 var xmlhttp=false;
 try{
  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
 }catch(e){
  try {
   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }catch(E){
    xmlhttp = false;
  }
 }
 if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
  xmlhttp = new XMLHttpRequest();
 }
 return xmlhttp;
}
function move(id, mov, type){

 var tbody = document.getElementById('moveTable');

 ajax=Ajax();

 ajax.open("GET", "forder.php?id="+id+"&move="+mov+"&t="+type);
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) { 
   tbody.innerHTML = ajax.responseText;
  }
 }
 ajax.send(null);
}