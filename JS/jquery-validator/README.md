**jQuery Validator**

jQuery Validator es un plugin para jQuery que te permite validar de manera sencilla campos de texto y selects en tu formulario de HTML, su uso es bastante sencillo, y permite cierta personalización.

**Instalación**

Solo necesitas jQuery, y lo incluido en este plugin, agrégalo en el head de tu página y ya puedes usarlo:


        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="js/validator.min.js"></script>
    
**¿Como se usa?**

Su uso es bastante sencillo, solo tienes que llamarlo al inicio con el id del o los formularios a validar.

        $(document).on("ready", function(){
            $("#form1").validate();
        });
    
Para los campos de nuestro formulario que deseamos validar solo agregamos la clase "validate" junto con el tipo de validación que deseamos.
Las opciones para los input de tipo son:

- alphanumeric .- Lo necesario para validar campos de texto, acepta letras, numeros, acentos, puntos y comas
- alpha .- Igual que el anterior, solo que no admite valores numéricos
- numeric .- Solo admite valores numéricos, con separador de miles por comas y decimales opcionales
- email .- Revisa que el campo contenga una dirección de correo electrónico válido
- url .- Valida que el campo contenga una url válida, iniciando con ftp://, http:// o https://

Para los campos de tipo select, solo necesitamos la clase validate, que revisará que la opción seleccionada no sea "" ni "0"

**Personalización**

Podemos personalizar jQuery Validate de una manera muy sencilla, por default las opciones del plugin son

    $("#form").validate({
      class_: ".validate",
      maxlength: 300,
      correct_img: "imgs/correct.png", //ruta relativa a este documento
      incorrect_img: "imgs/incorrect.png", //ruta relativa a este documento
      onsubmit: function(serialized_form){
              //haz lo que necesites con tu form, como mandarlo por ajax
      }
    });
    
Podemos personalizar fácilmente la clase que tienen los campos a validar, su longitud máxima, y las imágenes de estado correcto o incorrecto.
