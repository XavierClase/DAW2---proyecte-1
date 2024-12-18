<?php
    class Comanda {
        
        protected $ID_Pedido;
        protected $ID_Usuari;
        protected $Data_Hora;
        protected $Estat;
        protected $Metode_pagament;
        protected $Total;
        protected $direccio;
        protected $Nom_client;
        protected $Telefon_client;
        protected $Correu_client;

        public function __construct($ID_Pedido = null, $ID_Usuari, $Data_Hora, $Estat, $Metode_pagament, $Total, $direccio, $Nom_client = null, $Telefon_client = null, $Correu_client = null) 
        {
                $this->ID_Pedido = $ID_Pedido !== null ? (int)$ID_Pedido : null; 
                $this->ID_Usuari = (int)$ID_Usuari;
                $this->Data_Hora = (string)$Data_Hora;
                $this->Estat = (string)$Estat;
                $this->Metode_pagament = (string)$Metode_pagament;
                $this->Total = (float)$Total;
                $this->direccio = (string)$direccio;
                $this->Nom_client = $Nom_client !== null ? (string)$Nom_client : null;
                $this->Telefon_client = $Telefon_client !== null ? (string)$Telefon_client : null;
                $this->Correu_client = $Correu_client !== null ? (string)$Correu_client : null;
        }
            

        /**
         * Get the value of ID_Usuari
         */ 
        public function getID_Usuari()
        {
                return $this->ID_Usuari;
        }

        /**
         * Set the value of ID_Usuari
         *
         * @return  self
         */ 
        public function setID_Usuari($ID_Usuari)
        {
                $this->ID_Usuari = $ID_Usuari;

                return $this;
        }

        

        /**
         * Get the value of Estat
         */ 
        public function getEstat()
        {
                return $this->Estat;
        }

        /**
         * Set the value of Estat
         *
         * @return  self
         */ 
        public function setEstat($Estat)
        {
                $this->Estat = $Estat;

                return $this;
        }

        /**
         * Get the value of Metode_pagament
         */ 
        public function getMetode_pagament()
        {
                return $this->Metode_pagament;
        }

        /**
         * Set the value of Metode_pagament
         *
         * @return  self
         */ 
        public function setMetode_pagament($Metode_pagament)
        {
                $this->Metode_pagament = $Metode_pagament;

                return $this;
        }

        /**
         * Get the value of Total
         */ 
        public function getTotal()
        {
                return $this->Total;
        }

        /**
         * Set the value of Total
         *
         * @return  self
         */ 
        public function setTotal($Total)
        {
                $this->Total = $Total;

                return $this;
        }

        /**
         * Get the value of direccio
         */ 
        public function getDireccio()
        {
                return $this->direccio;
        }

        /**
         * Set the value of direccio
         *
         * @return  self
         */ 
        public function setDireccio($direccio)
        {
                $this->direccio = $direccio;

                return $this;
        }

        /**
         * Get the value of Data_Hora
         */ 
        public function getData_Hora()
        {
                return $this->Data_Hora;
        }

        /**
         * Set the value of Data_Hora
         *
         * @return  self
         */ 
        public function setData_Hora($Data_Hora)
        {
                $this->Data_Hora = $Data_Hora;

                return $this;
        }

        /**
         * Get the value of ID_Pedido
         */ 
        public function getID_Pedido()
        {
                return $this->ID_Pedido;
        }

        /**
         * Set the value of ID_Pedido
         *
         * @return  self
         */ 
        public function setID_Pedido($ID_Pedido)
        {
                $this->ID_Pedido = $ID_Pedido;

                return $this;
        }

        /**
         * Get the value of Nom_client
         */ 
        public function getNom_client()
        {
                return $this->Nom_client;
        }

        /**
         * Set the value of Nom_client
         *
         * @return  self
         */ 
        public function setNom_client($Nom_client)
        {
                $this->Nom_client = $Nom_client;

                return $this;
        }

        /**
         * Get the value of Telefon_client
         */ 
        public function getTelefon_client()
        {
                return $this->Telefon_client;
        }

        /**
         * Set the value of Telefon_client
         *
         * @return  self
         */ 
        public function setTelefon_client($Telefon_client)
        {
                $this->Telefon_client = $Telefon_client;

                return $this;
        }

        /**
         * Get the value of Correu_client
         */ 
        public function getCorreu_client()
        {
                return $this->Correu_client;
        }

        /**
         * Set the value of Correu_client
         *
         * @return  self
         */ 
        public function setCorreu_client($Correu_client)
        {
                $this->Correu_client = $Correu_client;

                return $this;
        }


        public function toArray()
        {
                return [
                'ID_Pedido' => $this->ID_Pedido,
                'ID_Usuari' => $this->ID_Usuari,
                'Data_Hora' => $this->Data_Hora,
                'Estat' => $this->Estat,
                'Metode_pagament' => $this->Metode_pagament,
                'Total' => $this->Total,
                'Direccio' => $this->direccio,
                'Nom_client' => $this->Nom_client,
                'Telefon_client' => $this->Telefon_client,
                'Correu_client' => $this->Correu_client
                ];
        }
    }
    
?>