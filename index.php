<?php

class Utilisateur {
    protected $nom;
    protected $prenom;
    protected $type_utilisateur;

    public function __construct($nom, $prenom, $type_utilisateur) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->type_utilisateur = $type_utilisateur;
    }

    public function afficherNomComplet() {
        return $this->prenom . " " . $this->nom;
    }

    public function changerNom($nouveauNom) {
        $this->nom = $nouveauNom;
    }

    public function changerPrenom($nouveauPrenom) {
        $this->prenom = $nouveauPrenom;
    }
}

class Patient extends Utilisateur {
    private $rendez_vous = [];

    public function __construct($nom, $prenom) {
        parent::__construct($nom, $prenom, "Patient");
    }

    public function prendreRendezVous($date, $medecin) {
        $this->rendez_vous[] = [
            'date' => $date,
            'medecin' => $medecin
        ];
    }

    public function getRendezVous() {
        return $this->rendez_vous;
    }
}

class Medecin extends Utilisateur {
    private $specialite;

    public function __construct($nom, $prenom, $specialite) {
        parent::__construct($nom, $prenom, "Medecin");
        $this->specialite = $specialite;
    }

    public function consulterPatient($patient) {
        return "Consultation du patient " . $patient->afficherNomComplet() . " par Dr. " . $this->afficherNomComplet();
    }

    public function getSpecialite() {
        return $this->specialite;
    }
}

$patient = new Patient("Doe", "John");
$medecin = new Medecin("Smith", "Jane", "Cardiologue");

echo $patient->afficherNomComplet() . "\n";
echo $medecin->afficherNomComplet() . "\n";

$patient->prendreRendezVous("2024-12-25", $medecin);
echo $medecin->consulterPatient($patient);
