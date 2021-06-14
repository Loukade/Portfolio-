<!-- Pied de page de toute les pages -->
 

<section>



    <a href="index.php?Controleur=Admin&action=afficher"> Connexion </a> <br>
    <a href="index.php?Controleur=Inscription&action=afficher"> Inscription au site </a>


</div> <!-- /row -->     	
</section>


<div id="preloader"> 

    <div id="loader"></div>



</div> 
<SCRIPT LANGUAGE="JavaScript">
    /*
     Source :  http://www.editeurjavascript.com
     Adaptation : http://www.outils-web.com
     */
    function HeureCheckEJS()
    {
        krucial = new Date;
        heure = krucial.getHours();
        min = krucial.getMinutes();
        sec = krucial.getSeconds();
        jour = krucial.getDate();
        mois = krucial.getMonth() + 1;
        annee = krucial.getFullYear();
        if (sec < 10)
            sec0 = "0";
        else
            sec0 = "";
        if (min < 10)
            min0 = "0";
        else
            min0 = "";
        if (heure < 10)
            heure0 = "0";
        else
            heure0 = "";
        DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
        which = DinaHeure
        if (document.getElementById) {
            document.getElementById("ejs_heure").innerHTML = which;
        }
        setTimeout("HeureCheckEJS()", 1000)
    }
    window.onload = HeureCheckEJS;
</SCRIPT>

</head>


    <div id="ejs_heure">Initialisation</div>

</head>
<body bgcolor="#FFFFFF">



    <script language="JavaScript">
        function getLongDateString()
        {
            monthNames = new Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
            dayNames = new Array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
            dayOfWeek = this.getDay();
            day = dayNames[dayOfWeek];
            dateOfMonth = this.getDate();
            monthNo = this.getMonth();
            month = monthNames[monthNo];
            year = this.getYear();
            if (year < 2000)
                year = year + 1900;
            dateStr = day + " " + dateOfMonth + " " + month + " " + year;
            return dateStr;
        }
        Date.prototype.getLongDateString = getLongDateString;

        function DocDate()
        {
            DateTimeStr = document.lastModified;
            secOffset = Date.parse(DateTimeStr);
            if (secOffset == 0 || secOffset == null) //Opera3.2
                dateStr = "Unknown";
            else
            {
                aDate = new Date();
                aDate.setTime(secOffset);
                datestr = aDate.getLongDateString();
            }
            return dateStr;
        }
    </script>

    <script language="JavaScript">
        document.write(" <font face=Verdana size=2 color=#FFFFFF>Derniere mise a jour : <b>");
        document.writeln(DocDate(), "</b></font>");
    </script>


    <!-- Java Script
    ================================================== --> 
    <script src='public/js/jquery-2.1.3.min.js'></script>
    <script src= 'public/js/plugins.js'></script>
    <script src='public/js/main.js'></script>
