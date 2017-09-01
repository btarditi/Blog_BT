<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele {

// Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($billetId) {
        $sql = 'select id as id, date as date,'
        . ' auteur as auteur, contenu as contenu from commentaires'
        . ' where billet_id=?';
        $commentaires = $this->executerRequete($sql, array($billetId));
        return $commentaires;
    }
    
// Ajoute un commentaire dans la base
    public function ajouterCommentaire($auteur, $contenu, $id) {
        $sql = 'insert into commentaires(date, auteur, contenu, billet_id)' . ' values(now(), ?, ?, ?)';
        
        $this->executerRequete($sql, array($auteur, $contenu, $id));
    }
}