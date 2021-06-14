
<!-- Affichage d'inscription des clients -->
<head>
   
    <link href ="<?php echo chemins::STYLES . 'styleform.css'; ?>" rel ="stylesheet" type ="text/css" />
    <link href ="<?php echo chemins::STYLES . 'autocompletion.css'; ?>" rel ="stylesheet" type ="text/css" />
     
    
   <script type="text/javascript" src="<?php echo chemins::JS . 'jquery-1.4.2.min.js'; ?>"></script>
    <script type='text/javascript' src="<?php echo chemins::JS . "jquery.autocomplete.js"; ?>"></script>

    <script type="text/javascript">





        $(document).ready(function () {
            var formValide;
            //TRAITEMENT DU CLICK SUR LE BOUTON VALIDER
            //-----------------------------------------
            $("#valider").click(function () {
                formValide = true;
                //Traitements de toutes les zones de saisies
                $("#nouveauClient input[type=text], #nouveauClient input[type=password]").each(function ()
                {
                    controleSaisie($(this).attr('id'));
                });
                
                //On valide ou pas le formulaire selon le booleen formValide
                return formValide;
            });
//TRAITEMENT DU KEYPRESS DANS LES ZONES DE SAISIES :
// On efface le message lorsqu'on remplit les champs
//---------------------------------------------------
            $("#nouveauClient input[type=text], #nouveauClient input[type=password]").keypress(function ()
            {
                $(this).next().fadeOut();
            });

//TRAITEMENT LORSQUE LES ZONES DE SAISIES PERDENT LE FOCUS
//-------------------------------------------------------- 
            $("#nouveauClient input[type=text], #nouveauClient input[type=password]").blur(function ()
            {
                controleSaisie($(this).attr('id'));
            });
//-------------------------------------
// TRAITEMENT DES CONTROLES DE SAISIES
//-------------------------------------
            function controleSaisie(idchamp)
            {
                if ($("#" + idchamp).val() == "")
                {
                    $("#" + idchamp).next().removeClass("message-ok").addClass("message-erreur").text("Le champ est vide !").fadeIn();
                    formValide = false;
                } else {
                    var regex, messageErreur;
                    switch (idchamp) //Traitement selon l'id
                    {
                        case 'pseudo' :
                            
                            regex = /^[a-z]+$/i
                            messageErreur = "Pseudo non valide !";
                            break;


                        case 'pass1' :
                            regex = /^[0-9a-zA-Z]{6,20}$/;
                            messageErreur = "Mots de passe non valide !";
                            break;

                        case 'pass2' :

                            regex = /^[0-9a-zA-Z]{6,20}$/;
                            messageErreur = "Mots de passe non valide !";
                            break;

                        case 'mail' :
                            regex = /^([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/i;
                            messageErreur = "Email non valide !";
                            break

                        case 'nom' :
                            regex = /^[a-zA-Z]+$/i;
                            messageErreur = "Nom non valide !";
                            break

                        case 'prenom' :
                            regex = /^[a-zA-Z]+$/i;
                            messageErreur = "Prenom non valide !";
                            break

                        case 'cp' :
                            regex = /^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/;
                            messageErreur = "Code Postal non valide !";
                            break

                        case 'Ville' :
                            regex = /^[[:alpha:]]([-' ]?[[:alpha:]])*$/;
                            messageErreur = "Ville non valide !";
                            break

                        default :
                            regex = "";
                    }
                    traiterRegex(idchamp, regex, messageErreur);
                }
            }
            function traiterRegex(idchamp, regex, messageErreur)
            {
                if (!$("#" + idchamp).val().match(regex))
                {
                    $("#" + idchamp).next().removeClass("message-ok").addClass("message-erreur").text(messageErreur).show();
                    formValide = false;
                } else
                    $("#" + idchamp).next().removeClass("message-erreur").addClass("message-ok").text("OK").show();
            }

           
//-------------------------------------
// TRAITEMENT AUTOCOMPLETE CODEPOSTAL
//-------------------------------------
            $("#cp").autocomplete("ChercherCpVille.php", {
                width: 200
            }); //Dâautres options sont disponibles, voir doc en ligne
            $("#cp").result(function (event, data, formatted) {
                if (data)
                {
                    $("#cp").val(data[1]);
                    $("#ville").val(data[2]).attr("disabled", true);
                }
            });

        });
//----------------------------------------
// TRAITEMENT VERIFICATION PSEUDO EXISTANT
//----------------------------------------
            function cherchePseudoBD() {
                $.ajax({
                    async: false,
                    type: "POST",
                    url: "Libs/AJAX/chercherPseudo.php",
                    data: "pseudo=" + $("#pseudo").val(),
                    success: function (reponse) {
                        if (reponse == 1)
                        {
                            $("#pseudo").next().removeClass("message-ok").addClass("message-erreur").text("Et non ! Le pseudo existe déjà ").show();
                            formValide = false;
                            pseudoExistant = true;
                        }

                    }
                
                
                });
            }


    </script> 




<form id="nouveauClient" action="index.php?Controleur=Inscription&action=AjouterClient" method="post">
    <div class="titre">Nouveau compte CLIENT</div>
    <fieldset>
        <legend> Identification : </legend>
        <label for="pseudo">Pseudo choisi :</label> <input type='text' name='pseudo' id='pseudo' onfocusout = "cherchePseudoBD()" /><span></span><br /> <br />
        <label for="pass1"> Mot de passe :</label><input type='password' name='pass1' id='pass1'/><span></span><br />
        <label for="pass2"> Resaisir le passe :</label><input type='password' name='pass2' id='pass2'/><span></span><br />
    </fieldset>
    <fieldset>
        <legend> Coordonnees : </legend>
        <label for="mail">Adresse mail :</label> <input type='text' name='mail' id='mail'/><span></span><br />
        <label for="nom">Nom :</label><input type='text' name='nom' id='nom'/><span></span><br />
        <label for="prenom">Prenom :</label><input type='text' name='prenom' id='prenom'/><span></span><br />
        <label for="cp">Code Postal :</label><input type='text' name='cp' id='cp'/><span></span><br /> 
        <label for="ville">Ville :</label><input type='text' name='ville' id='ville'/><span></span> 
    </fieldset>
    <fieldset class="sansBordure">
    
       

        <input type='submit' name='valider' id='valider' value='VALIDER'/>
    </fieldset>
</form>


