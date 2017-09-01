<?php

require_once 'Modele/Modele.php';

class Billet extends Modele {

  // Renvoie la liste des billets du blog
  public function getBillets() {
    $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM billets ORDER BY id DESC';
    $billets = $this->executerRequete($sql);
    return $billets;
  }

  // Renvoie les informations sur un billet
  public function getUnique($id) {
    $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM billets WHERE id =?';
    $billet = $this->executerRequete($sql, array($id));
    if ($billet->rowCount() == 1)
      return $billet->fetch();  // Accès à la première ligne de résultat
    else
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
}