<?php

    class Producte {

        protected $ID_Producte;
        protected $nom;
        protected $descripcio;
        protected $preu;
        protected $categoria;
        protected $disponibilitat;
        protected $descompte;
        protected $imatge;

        public function __construct() {
            
        }

        public function getNom()
        {
                return $this->nom;
        }

        public function setNom($nom)
        {
                $this->nom = $nom;

                return $this;
        }

        public function getDescripcio()
        {
                return $this->descripcio;
        }

        public function setDescripcio($descripcio)
        {
                $this->descripcio = $descripcio;

                return $this;
        }

        public function getPreu()
        {
                return $this->preu;
        }

        public function setPreu($preu)
        {
                $this->preu = $preu;

                return $this;
        }

        public function getCategoria()
        {
                return $this->categoria;
        }

        public function setCategoria($categoria)
        {
                $this->categoria = $categoria;

                return $this;
        }

        public function getDisponibilitat()
        {
                return $this->disponibilitat;
        }

        public function setDisponibilitat($disponibilitat)
        {
                $this->disponibilitat = $disponibilitat;

                return $this;
        }

        public function getDescompte()
        {
                return $this->descompte;
        }

        public function setDescompte($descompte)
        {
                $this->descompte = $descompte;

                return $this;
        }

        public function getImatge()
        {
                return $this->imatge;
        }

        public function setImatge($imatge)
        {
                $this->imatge = $imatge;

                return $this;
        }

        public function getID_Producte()
        {
                return $this->ID_Producte;
        }

        public function setID_Producte($ID_Producte)
        {
                $this->ID_Producte = $ID_Producte;

                return $this;
        }



        public function toArray()
        {
                return [
                        'ID_Producte' => $this->ID_Producte,
                        'Nom' => $this->nom,
                        'Descripcio' => $this->descripcio,
                        'Preu' => $this->preu,
                        'Categoria' => $this->categoria,
                        'Disponibilitat' => $this->disponibilitat,
                        'Descompte' => $this->descompte,
                        'Imatge' => $this->imatge
                ];
        }

    }

?>