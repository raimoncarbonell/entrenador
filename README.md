# Entrenador
## Práctica del curso de desarrollo web

~~~
Se trata de un generador de preguntas tipo test aleatorias.
~~~



|Entrada   | Salida Esperada |Descripcion|
|-----------------|----------|------------------|
|    2+3|false|sin nigun parentesis|
|(26+10+30|fasle|solo con parentesis de abertura|
|26+10+30)|fasle|solo con parentesis de ciere|
|(26+10+30)|fasle|con pararentesis de abertura i cierre al inici i la fin|
|(26+10+30))|fasle|con pararentesis con dos parentesis en el cierre|
|((26+10+30|fasle|con dos parentesis al inicio i ninguno en el fin|
|((26+10+30))|fasle|doble parentesis al inicio i al fin|
|(26+10+30))|fasle|un parentesis al inicio i otro al fin|
|(26+10)+30)|fasle||
