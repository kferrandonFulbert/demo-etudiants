<?php

class Todo{
    private int $_id;
    private string $_name;
    private bool $_done;
    private string $_description;

    /**
     * Constructeur de la TodoList
     * @param string $aName
     * @param string $aDescription 
     * @param bool $aDone 
     */
    public function __construct(string $aName, $aDescription, $aDone=false)
    {
        $this->set_name($aName);
        $this->_description = $aDescription;
        $this->_done = $aDone;
    }

    public function get_name() : string {
        return $this->_name;
    }

    public function set_name(string $aName) : void {
        $this->_name = strtoupper($aName);
    }

    /**
     * Get the value of _done
     */ 
    public function get_done()
    {
        return $this->_done;
    }

    /**
     * Set the value of _done
     *
     * 
     */ 
    public function set_done($_done): void
    {
        $this->_done = $_done;
    }

    /**
     * Get the value of _description
     */ 
    public function get_description() : string
    {
        return $this->_description;
    }

    /**
     * Set the value of _description
     */ 
    public function set_description($_description) : void
    {
        $this->_description = $_description;
    }
}