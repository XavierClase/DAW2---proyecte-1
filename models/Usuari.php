<?php

    class Usuari {

        protected $ID_Usuari;
        protected $Nom;
        protected $Cognoms;
        protected $Correu_electronic;
        protected $Contrasenya;
        protected $Telefon;
        protected $Data_naixement;
        protected $Tipus_usuari;


        public function getID_Usuari()
        {
            return $this->ID_Usuari;
        }

        public function setID_Usuari($ID_Usuari)
        {
            $this->ID_Usuari = $ID_Usuari;

            return $this;
        }

        public function getNom()
        {
            return $this->Nom;
        }

        public function setNom($Nom)
        {
            $this->Nom = $Nom;

            return $this;
        }

        public function getCorreu_electronic()
        {
            return $this->Correu_electronic;
        }

        public function setCorreu_electronic($Correu_electronic)
        {
            $this->Correu_electronic = $Correu_electronic;

            return $this;
        }

        public function getContrasenya()
        {
            return $this->Contrasenya;
        }

        public function setContrasenya($Contrasenya)
        {
            $this->Contrasenya = $Contrasenya;

            return $this;
        }

        public function getTelefon()
        {
            return $this->Telefon;
        }

        public function setTelefon($Telefon)
        {
            $this->Telefon = $Telefon;

            return $this;
        }
 
        public function getData_naixement()
        {
            return $this->Data_naixement;
        }

        public function setData_naixement($Data_naixement)
        {
            $this->Data_naixement = $Data_naixement;

            return $this;
        }

        public function getTipus_usuari()
        {
            return $this->Tipus_usuari;
        }

        public function setTipus_usuari($Tipus_usuari)
        {
            $this->Tipus_usuari = $Tipus_usuari;

            return $this;
        }

        public function getCognoms()
        {
                return $this->Cognoms;
        }

        public function setCognoms($Cognoms)
        {
                $this->Cognoms = $Cognoms;

                return $this;
        }
    }