<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

<script>
function myfuncion(){
	return confirm("Esta Seguro que desea Eliminar?");
}
function myfuncion2(){
	return confirm("Esta mal");
}
function validacion2(valor){
   if(valor==1){
    var mivarJS=1;
    //document.writeln (mivarJS);
    return 1;
   }else{
     var mivarJS=0;
    return 0;
   }
}
</script>

<script>
//VALIDACION CHECKBOX
function validacion(formu, obj, n) {
  limite=n; //limite de checks a seleccionar
  num=0;
  if (obj.checked) {
    for (i=0; ele=document.getElementById(formu).children[i]; i++)
      if (ele.checked) num++;
  if (num>limite)
    obj.checked=false;
  }
}  
</script>
<!--Comienza codigo javaScript del Cronometro del examen-->
  <script>
    function cronos(hora,min) {
    var hrs=hora;
    var countdownHours = 1;
    var countdownMinutes = min;
    var countdownSeconds = 0;

    countdowntimer.set( hrs, countdownHours, countdownMinutes, countdownSeconds);
  };
  </script>
  <script type="text/javascript">
    var countdowntimer = {
  seconds: 0,
  active: false,
  start: function() {
    if(!this.active) {
      countdownInterval = setInterval(this.update, 1000);
      this.active = true;
    }
  },
  update: function() {

    if(countdowntimer.seconds != 0) {
      countdowntimer.seconds--;
      var date = new Date(countdowntimer.seconds * 1000);
      if ((date.getHours() -(21-real))<10) {
        if (date.getMinutes()<10) {
          if (date.getSeconds()<10) {
            document.getElementById("txtcountdown").innerHTML = "0"+(date.getHours() -(21-real))+ ":" +"0"+date.getMinutes() + ":" +"0"+date.getSeconds();
          }else{
            document.getElementById("txtcountdown").innerHTML = "0"+(date.getHours() -(21-real))+ ":" +"0"+date.getMinutes() + ":" + date.getSeconds();
          }       
        }else{
          if (date.getSeconds()<10) {
            document.getElementById("txtcountdown").innerHTML = "0"+(date.getHours() -(21-real))+ ":" +date.getMinutes() + ":" + "0"+date.getSeconds();
          }else{
            document.getElementById("txtcountdown").innerHTML = "0"+(date.getHours() -(21-real))+ ":" +date.getMinutes() + ":" + date.getSeconds();
        }
        }

      }else{
        if (date.getMinutes()<10) {
          if (date.getSeconds()<10) {
            document.getElementById("txtcountdown").innerHTML = (date.getHours() -(21-real))+ ":" +"0"+date.getMinutes() + ":" +"0"+date.getSeconds();
          }else{
            document.getElementById("txtcountdown").innerHTML = (date.getHours() -(21-real))+ ":" +"0"+date.getMinutes() + ":" + date.getSeconds();
          }       
        }else{
          if (date.getSeconds()<10) {
            document.getElementById("txtcountdown").innerHTML = (date.getHours() -(21-real))+ ":" +date.getMinutes() + ":" + "0"+date.getSeconds();
          }else{
            document.getElementById("txtcountdown").innerHTML = (date.getHours() -(21-real))+ ":" +date.getMinutes() + ":" + date.getSeconds();
        }
        }
      }
      //document.getElementById("txtcountdown").innerHTML = (date.getHours() -(21-real)) + ":" + date.getMinutes() + ":" + date.getSeconds();
      if ((date.getHours() -(21-real))==0 && date.getMinutes()==0 && date.getSeconds()==0) {
      var capa = document.getElementById('noTermino');
          capa.onclick=alert("Tiempo Terminado");
           capa.click();
      }
    }

  },
  set: function(horar, hours,minutes, seconds) {

    var horara=parseInt(horar);
    var hours = parseInt(hours);
    var minutes = parseInt(minutes);
    var seconds = parseInt(seconds);
    if(isNaN(horara)) {
      horara = 0;
    }

    if(isNaN(hours)) {
      hours = 0;
    }

    if(isNaN(minutes)) {
      minutes = 0;
    }
    if(isNaN(seconds)) {
      seconds = 0;
    }
    countdowntimer.seconds = (hours * 3600) + (minutes * 60) + seconds;
    real=horara;

    if(countdowntimer.seconds > 0) {
      this.start();
    }else{
      alert("El tiempo no puede ser negativo o 0");
    }
  }
};
  </script>

  <script type="text/javascript">
    jQuery(document).ready(function(){
        var d = new Date();
        d = d.getTime();
        if (jQuery('#reloadValue').val().length == 0){
            jQuery('#reloadValue').val(d);
            jQuery('body').show();
        }
        else{
            jQuery('#reloadValue').val('');
            location.reload();
        }
    });
</script>


<script type="text/javascript">
var strength = {
  0: "Peor 😭",
  1: "Malo 😠",
  2: "Debil 😩",
  3: "Bueno 😁",
  4: "Fuerte 😎"
}
var password = document.getElementById('password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

password.addEventListener('input', function() {
  var val = password.value;
  var result = zxcvbn(val);

  // Update the password strength meter
  meter.value = result.score;

  // Update the text indicator
  if (val !== "") {
    text.innerHTML = "Fuerza: " + strength[result.score]; 
  } else {
    text.innerHTML = "";
  }
});
</script>
  <!--termina Codigo javaScript del cronometro del examen -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->