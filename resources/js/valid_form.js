
function checkForm()
  {
      erreur = "";
      console.log($('input[name^=passwordinput_saisie]').val());

    if($('input[name^=passwordinput_saisie]').val() != "" && $('input[name^=passwordinput_saisie]').val() == $('input[name^=passwordinput_confirm]').val()) {

        if($('input[name^=passwordinput_saisie]').val().length() < 6) {
        erreur +="Le mot de passe doit contenir au moins 6 caractères!";
            $('input[name^=passwordinput_saisie]').focus();
        return erreur;
        }
    if($('input[name^=passwordinput_saisie]').val() == $('input[name^=textinput_email]').val()) {
        erreur +="Le mot de passe doit être différent du nom d'utilisateur!";
        $('input[name^=passwordinput_saisie]').focus();
        return erreur;
        }
    re = /[0-9]/;
    if(!re.test($('input[name^=passwordinput_saisie]').val())) {
        erreur +="Le mot de passe doit contenir au moins un chiffre (0-9)!";
        $('input[name^=passwordinput_saisie]').focus();
        return erreur;
        }
    re = /[a-z]/;
    if(!re.test($('input[name^=passwordinput_saisie]').val())) {
        erreur +="Le mot de passe doit contenir au moins une lettre minuscule (a-z)!";
        $('input[name^=passwordinput_saisie]').focus();
        return erreur;
        }
    re = /[A-Z]/;
    if(!re.test($('input[name^=passwordinput_saisie]').val())) {
        erreur +="Le mot de passe doit contenir au moins une lettre majuscule (A-Z)!";
        $('input[name^=passwordinput_saisie]').focus();
        return erreur;
        }
    } else {
        erreur +="Vérifier que le mot de passe a été saisi!";
        $('input[name^=passwordinput_saisie]').focus();
        return erreur;
        }

    //alert("Vous avez entré un mot de passe valide: " + $('input[name^=passwordinput_saisie]').val());
    return true;
}


$("#button_valider").click(
        function()
        {
            console.log("button_valider CLICK");
            result = checkForm();

            if (result != true)
            {
                content = '<div class=\"alert alert-error\"><a class=\"close\" data-dismiss=\"alert\">×</a><strong>Erreur!  </strong>' + result + '</div>';


                $('#erreur_catch').html(content);
                $('#erreur_catch').show();
            }
            return false;
        }
);

$("#button_annuler").click(
    function()
    {
        window.location.href='index.php';
    }
);