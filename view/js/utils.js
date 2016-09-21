var inputsRespuesta = 1;

function nuevoInputRespuesta(){
  var inp = document.createElement("input");
  inp.type="text"; inp.name="respuestas[]"; inp.placeholder="posible respuesta";

  var rad = document.createElement("input");
  rad.type="radio"; rad.name="correcta"; rad.value=""+inputsRespuesta;

  var txt = document.createTextNode("correcta");

  var contenedor = document.querySelector("#newquestion fieldset");
  contenedor.appendChild(document.createElement("br"));
  contenedor.appendChild(inp);
  contenedor.appendChild(rad);
  contenedor.appendChild(txt);

  inputsRespuesta++;
}

function cierra(selector){
  document.querySelector(selector).style.display="none";
}
