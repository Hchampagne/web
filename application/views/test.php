<!DOCTYPE html>
<html>
<body onload="startTime()">

<h5 id="txt"></h5>

<script>
function startTime() {
  var date = new Date();
  var h = date.getHours();
  var m = date.getMinutes();
  var s = date.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById("txt").innerHTML = h + ":" + m + ":" + s;
  var t = setTimeout(function(){ startTime() }, 500);
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
</script>

<p>Fin de partie dans 15min.</p>
<p id="demo"></p>

<script>
var myVar = setInterval(myTimer, 900000); /*15min */

function myTimer() {
  document.getElementById("demo").innerHTML = "Terminé";
}
</script>

<div>
    <span id="test"></span>
</div>

<script>
    
    var date = new Date();
    year= date.getFullYear();
    month= date.getMonth();
    day= date.getDate()
    hour= date.getHours();
    minute= date.getMinutes();
    minutef=date.getMinutes()+15;
    second= date.getSeconds();

    var diff = minutef - minute

    document.getElementById("test").innerHTML = diff;
    // date1 = new Date(year-month-day hour:minute:second);
    // date2 = new Date('year-month-day 13:50:00');
    // tmp = date2 - date1
    // tmp = tmp/1000/60/60
    // document.getElementById("test").innerHTML = tmp;

</script>
<div id="myDiv">

</div>

    <?php 
        date_default_timezone_set('Europe/Paris');

        echo date('d.m.Y H:i:s');
        echo("<br>");
        
        echo date('H:i:s');
    ?>

    <script>
        function refresh() {
            $.ajax({
                url: site_url("test/test1") // Ton fichier ou se trouve ton chat
                success:
                    function(retour){
                    $('#myDiv').html(retour); // rafraichi toute ta DIV "bien sur il lui faut un id "
                }
            });
            
            }
            setInterval(refresh(), 1000)
    </script>

</body>
</html>
