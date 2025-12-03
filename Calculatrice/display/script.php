<?php

class Calculatrice
{
    public $valeurA;
    public $valeurB;
    public $operateur;

    // function __construct($valeurA, $valeurB, $operateur)
    // {
    //     $this->valeurA = $valeurA;
    //     $this->valeurB = $valeurB;
    //     $this->operateur = $operateur;
    // }

    function verifieValeurs($nb)
    {
        if (empty($this->operateur)) {
            $this->valeurA = $this->valeurA . $nb;
        } else {
            $this->valeurB = $this->valeurB . $nb;
        };
    }

    function verifieOperateur($op)
    {
        $this->operateur = $op;
    }

    function calcule()
    {
        // FONCTION QUI RETOURNE LE RESULTAT D'UN CALCULE 
        // CONVERSION IMPLICITE DE PHP STRING -> INT
        $resultat = '';
        match ($this->operateur) {
            '+' => $resultat = $this->valeurA + $this->valeurB,
            '-' => $resultat = $this->valeurA - $this->valeurB,
            '*' => $resultat = $this->valeurA * $this->valeurB,
            '/' => $resultat = $this->valeurA / $this->valeurB,
            default => 'Erreur'
        };
        // ECHO POUR TEST
        echo 'Le resultat de mon calcule : ' . $resultat . "\n";
        // RESET DES VALEURS
        $this->valeurA = null;
        $this->valeurB = null;
        $this->operateur = null;
        // RETURN LE RESULTAT
        return $resultat;
    }
};


// TESTE DE L'ALGORITHME -> Ok !


// INSTANCE DE LA CLASS
$maCalculatrice = new Calculatrice();

// TEST DE L'ALGO
$maCalculatrice->verifieValeurs('3');
$maCalculatrice->verifieValeurs('0');
$maCalculatrice->verifieOperateur('/');
$maCalculatrice->verifieValeurs('1');
$maCalculatrice->verifieValeurs('0');
print_r($maCalculatrice);
$maCalculatrice->calcule();
print_r($maCalculatrice);