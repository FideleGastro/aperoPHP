<?php

namespace App;

class Zombie {

    private $sac;
    private $bras;
    private $jambes;
    private $envieFete;

    public function __construct(int $bras = 2, int $jambes = 2)
    {
        if ($bras < 0 || $bras > 2 || $jambes < 0 || $jambes > 2) {
            throw new \InvalidArgumentException("Mauvais");
        }

        $this->sac = [
            'bras' => 2 - $bras,
            'jambes' => 2 - $jambes
        ];

        $this->envieFete = true;
        $this->bras = $bras;
        $this->jambes = $jambes;
    }

    /**
     * @return bool
     */
    public function isEnvieFete(): bool
    {
        return $this->envieFete;
    }

    /**
     * @param bool $envieFete
     */
    public function setEnvieFete(bool $envieFete)
    {
        $this->envieFete = $envieFete;
    }

    public function nourrir(Aliment $aliment)
    {
        if ($this->envieFete) {

            if ($aliment instanceof Ail) {
                $this->perdreMembre();
            }

            if ($aliment instanceof Banane) {
                $this->perdreMembre();
            }

            if ($aliment instanceof Pizza) {
                $this->gagnerMembre();
            }

            if ($aliment instanceof Poivron) {
                $this->perdreMembre();
            }
        }
    }

    private function perdreMembre()
    {
        $methodes = [];

        if ($this->getBras() > 0) {
            $methodes[] = 'retirerBrasDuZombie';
        }

        if ($this->getJambes() > 0) {
            $methodes[] = 'retirerJambeDuZombie';
        }

        if (!empty($methodes)) {
           $methodeUtilise = array_rand($methodes);
           $this->{$methodes[$methodeUtilise]}();
        } else {
            $this->envieFete = false;
        }
    }

    private function gagnerMembre()
    {
        $methodes = [];

        if ($this->getBras() < 2 && $this->sac['bras'] > 0) {
            $methodes[] = 'ajouterBrasDuZombie';
        }

        if ($this->getJambes() < 2 && $this->sac['jambes'] > 0) {
            $methodes[] = 'ajouterJambeDuZombie';
        }

        if (!empty($methodes)) {
            $methodeUtilise = array_rand($methodes);
            $this->{$methodes[$methodeUtilise]}();
        } else {
            $this->envieFete = false;
        }
    }

    /**
     * @return array
     */
    public function getSac(): array
    {
        return $this->sac;
    }

    /**
     * @param array $sac
     */
    public function setSac(array $sac)
    {
        $this->sac = $sac;
    }

    /**
     * @return int
     */
    public function getBras(): int
    {
        return $this->bras;
    }

    /**
     * @param int $bras
     */
    public function setBras(int $bras)
    {
        $this->bras = $bras;
    }

    private function retirerBrasDuZombie()
    {
        $this->bras--;
        $this->sac['bras']++;
    }

    private function ajouterBrasDuZombie()
    {
        $this->bras++;
        $this->sac['bras']--;
    }

    /**
     * @return int
     */
    public function getJambes(): int
    {
        return $this->jambes;
    }

    /**
     * @param int $jambes
     */
    public function setJambes(int $jambes)
    {
        $this->jambes = $jambes;
    }

    private function retirerJambeDuZombie()
    {
        $this->jambes = max(0, $this->jambes - 1);
        $this->sac['jambes']++;
    }

    private function ajouterJambeDuZombie()
    {
        $this->jambes = min(2 , $this->jambes + 1);
        $this->sac['jambes']--;
    }
}
