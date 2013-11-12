function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}

//Function to get add data image
function getData(idImage)
{
   var Destino= document.getElementById("media-meta-data"); //id to apply changes

      ajax=nuevoAjax();
      ajax.open("GET","getdata.php?id="+idImage, true);//send id number of image
      ajax.onreadystatechange=function() {
          if (ajax.readyState==4) {
            Destino.innerHTML = ajax.responseText;
          }
      }
      ajax.send(null);    
} 