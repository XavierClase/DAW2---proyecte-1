<?php
    class Comanda {
        
        protected $ID_Pedido;
        protected $ID_Usuari;
        protected $Data_Hora;
        protected $Estat;
        protected $Metode_pagament;
        protected $Total;
        protected $direccio;

        public function __construct($ID_Pedido = null, $ID_Usuari, $Data_Hora, $Estat, $Metode_pagament, $Total, $direccio) {
                $this->ID_Pedido = $ID_Pedido !== null ? (int)$ID_Pedido : null; 
                $this->ID_Usuari = (int)$ID_Usuari;
                $this->Data_Hora = (string)$Data_Hora;
                $this->Estat = (string)$Estat;
                $this->Metode_pagament = (string)$Metode_pagament;
                $this->Total = (float)$Total;
                $this->direccio = (string)$direccio;
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
    }
    



?>