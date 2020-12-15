<?php
class user{
    //propriétes:
    private $_user;  //log et mot de passe de co pour la page d'acceuil
    private $_passwd;

    private $_admin; //false=Non-admin , true=admin
    

    //méthodes:
   
public function Connexion($NDC, $MDP){//Fonction qui permet au utilisateur de se connecter

    try
        {
            $maBase=new PDO('mysql:host=localhost; dbname=site_prison; charset=utf8','siteweb','siteweb');
            $LesUsers = $maBase->query('SELECT `user`,`mot_de_passe` FROM `user` WHERE "'.$NDC.'"=`user` AND "'.$MDP.'"=`mot_de_passe`');
            $admin = $LesUsers->fetch();
            $this->_user = $admin['user'];
            $this->_passwd = $admin['mot_de_passe'];
        }    

            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
}
/*public function UsersNv($NDC, $MDP){//Fonction qui creer un nouvelle utiliateur

    try
    {
        $maBase=new PDO('mysql:host=192.168.65.114; dbname=projet_gps; charset=utf8','siteweb','siteweb');
        $LesNVusers=$maBase->query('INSERT INTO `user`(`user`, `MDP`) VALUES ("'.$NDC.'","'.$MDP.'")') ;
    }    

        catch (Exception $erreur){
            echo 'Erreur : '.$erreur ->getMessage();
    }
    
}*/

public function Compar_passwd($NDC, $MDP){ //compare les id et mdp 
    if($NDC == $this->_user){
        if($MDP == $this->_passwd){
            return true;
        }
    }
    return false;
}
/*public function compar_admin(){
    if($this->_admin==1){
        return true;
    }
    return false;  
}*/

}
