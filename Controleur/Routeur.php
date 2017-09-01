<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Vue/Vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlBillet = new ControleurBillet();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'billet') {
                $id = intval($this->getParametre($_GET, 'id'));
                if ($id != 0) {
                    $this->ctrlBillet->billet($id);
                }
                else
                    throw new Exception("Identifiant de billet non valide");
            } 
            else if ($_GET['action'] == 'commenter') {
                  $auteur = $this->getParametre($_POST, 'auteur');
                  $contenu = $this->getParametre($_POST, 'contenu');
                  $idBillet = $this->getParametre($_POST, 'id');
                  $this->ctrlBillet->commenter($auteur, $contenu, $idBillet);
            }
            else
              throw new Exception("Action non valide");
      }
      else {  // aucune action définie : affichage de l'accueil
        $this->ctrlAccueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
    
    
// Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
  }
}