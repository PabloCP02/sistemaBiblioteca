<!-- Pie de página -->
<footer>
    <div>
        <h5 class="text-center pie">UPB | IS | Prog. Cliente-Serv | Pablo J. Cervantes Pech | <span id="fecha"></span></h5>
    </div>
    <!-- Javascript para poner la fecha -->
    <script>
        var fecha = new Date();
        document.getElementById("fecha").innerHTML = fecha.toLocaleDateString();
    </script>
</footer>