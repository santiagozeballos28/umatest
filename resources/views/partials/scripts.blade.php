<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<script>
function myfuncion1(){
	return confirm("Esta bien");
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

    function cronos(min) {
    var countdownHours = 0;
    var countdownMinutes = min;
    var countdownSeconds = 0;

    countdowntimer.set(countdownHours, countdownMinutes, countdownSeconds);
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
      if (date.getMinutes()<10) {
        if (date.getSeconds()<10) {
          document.getElementById("txtcountdown").innerHTML = "0"+date.getMinutes() + ":" +"0"+date.getSeconds();
        }else{
          document.getElementById("txtcountdown").innerHTML = "0"+date.getMinutes() + ":" + date.getSeconds();
        }     
      }else{
        if (date.getSeconds()<10) {
          document.getElementById("txtcountdown").innerHTML = date.getMinutes() + ":" + "0"+date.getSeconds();
        }else{
          document.getElementById("txtcountdown").innerHTML = date.getMinutes() + ":" + date.getSeconds();

        }
      }
      if (date.getMinutes()==0 && date.getSeconds()==0) {
        var capa = document.getElementById('noTermino');
        capa.onclick=alert("Tiempo Terminado");
        capa.click();
    }
    }

  },
  set: function(hours, minutes, seconds) {

    var hours = parseInt(hours);
    var minutes = parseInt(minutes);
    var seconds = parseInt(seconds);

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
  <!--termina Codigo javaScript del cronometro del examen -->
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->