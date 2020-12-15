<?php
session_start();
//$_SESSION["isconnectUS"];
?> 
<?php require("user.php");?>
<?php
    if(empty($_POST['ID_1']) && empty($_POST['MDP_1'])){ //suite du formulaire de connexion de la condition 2

    }else{
                    
        $user = new user();
        $user->Connexion($_POST['ID_1'],$_POST['MDP_1']);
        $_SESSION["isconnectUS"] = $user->Compar_passwd($_POST['ID_1'],$_POST['MDP_1']);
       // $_SESSION["isconnectAD"] = $user->compar_admin($_POST['ID_1'],$_POST['MDP_1']);
       
        if($_SESSION["isconnectUS"]){

        $_SESSION["isconnectUS"]=true;
        $_SESSION["LogUser"]=$_POST['ID_1'];
        $_SESSION["MdpUser"]=$_POST['MDP_1']; //passe la variable isconnectUS a true ce qui permet de rentrer dans la condition 1 et de faire disparaitre le formulaire 

    }else{
        echo"<p><h3>Identifiants ou mot de passe incorrects, veuillez reessayer.</h3></p></div>"; 
        }
    }
?>
<?php 
if(isset($_POST['deco2'])){ //bouton de deconnexion qui retourne à la condition 2
    session_unset();
    session_destroy();

 }
/* bouton de commande de la camera

if(isset($_POST['balayage'])){

}
if(isset($_POST['zoom_+'])){

}
if(isset($_POST['zoom_-'])){

}
if(isset($_POST['home'])){

}
if(isset($_POST['up'])){

}
if(isset($_POST['left'])){

}
if(isset($_POST['right'])){

}
if(isset($_POST['down'])){

}
if(isset($_POST['on'])){

}
if(isset($_POST['off'])){

}
*/
if(isset($_SESSION["isconnectUS"]) && $_SESSION["isconnectUS"]==true){ //condition 1) si l'utilisateur est connecter, affiche les redirections vers d'autres pages.
?>
 <html>
    <head>
    <link rel="icon" href="image/Sed-09-512.webp" />
        <title>Security Cam</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="fichier_bootstrap/bootstrap-4.5.3-dist/css/bootstrap.css">
    </head>
    <body class="background">
        <div>
            <div class="row">
                <div id="img2" class="header col-lg-8" align="center" > 
                    <h1 id="title">SECURITY CAM</h1>   
                </div> 
                <div class="header col-lg-2" align="center">
                    <button type="submit" class="submit-btn2">SUPPORT</button>   
                </div>
                <div class="header col-lg-2" align="center">
                    <form method="POST">
                        <input type="submit" name="deco2" value="DECONNEXION" class="submit-btn2"/>
                    </form>
                </div>
            </div> 
            <div class="row" align="center">
                <div class="form-box-on" align="center">
                    <div class="row">
                        <div class="col-6" align="center">
                            <input type="button" name="on" value="ALLUMER" class="submit-btn-on"/>
                        </div>
                        <div class="col-6" align="center">
                            <input type="button" name="off" value="ETEINDRE" class="submit-btn-on"/>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="row">
                <div class="form-box-zoom" align="center"><!-- bouton de zoom-->
                    <form method="POST" >
                        <input type="button" name="zoom_+" value="ZOOM +" class="submit-btn-zoom-in"/>
                        <input type="button" name="zoom_-" value="ZOOM -" class="submit-btn-zoom-out"/>
                    </form>
                </div>
                <div class="form-box-direction" align="center"><!-- bouton directionnel-->
                    <form method="$_POST">
                        <div class="row">
                            <div class="col-12" align="center">
                                <input type="button" name="up" value="HAUT" class="submit-btn-up"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4" align="center">
                                <input type="button" name="left" value="GAUCHE" class="submit-btn2"/>
                            </div>
                            <div class="col-4" align="center">
                                <input type="button" name="home" value="CENTRAGE" class="submit-btn2"/>
                            </div>
                            <div class="col-4" align="center">
                                <input type="button" name="right" value="DROITE" class="submit-btn2"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" align="center">
                                <input type="button" name="down" value="BAS" class="submit-btn2"/>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="form-box-balayage" align="center"> <!-- bouton de balayage-->
                    <form method="POST" >
                        <input type="button" name="balayage" value="BALAYAGE" class="submit-btn-balayage"/>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 

}elseif(!isset($_SESSION["isconnectUS"]) || $_SESSION["isconnectUS"]==false){ // condition 2) si l'utilisateur n'est pas deja connecter, affiche un formulaire de connexion

?>
<html>
    <head>
        <link rel="icon" href="image/Sed-09-512.webp" />
        <title>Security Cam</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body class="background">
        <div>
            <div class="form-box">
               <div class="button-box">
                   <div id="btn"></div>
                   <button type="button" class="toggle-btn" onclick="login()" align="center">Se Connecter</button>
               </div>
               <div class="social">
                   <h1 id="title2">Security Cam</h1>
               </div>
               <form id="login" class="input-group" method="POST">
                    <input type="text" class="input-field" placeholder="Pseudo" name="ID_1" required>
                    <input type="password" class="input-field" placeholder="Mot de passe" name="MDP_1" required>
                    <button type="submit" class="submit-btn">Se Connecter</button>
                </form>
            </div>
        </div>
    </body>
</html>
<?php
}
?>