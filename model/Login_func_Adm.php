<!--Classe de login funcionario e adm-->
<?php

CLASS Login_func_Adm{
    private $idAdmin;
    private $senhaAdmin;
    private $idFunc;
    private $senhaFunc;

    //metodo set e get admin
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;
    }
    public function getIdAmin()
    {
        return $this->idAdmin;
    }

    public function setSenhaAdmin($senhaAdmin)
    {
        $this->senhaAdmin = $senhaAdmin;
    }
    public function getSenhaAdmin()
    {
        return $this->senhaAdmin;
    }

    // metodos getters e setters funcionario
    public function setIdFunc($idFunc)
    {
        $this->idFunc = $idFunc;
    }
    public function getIdFunc()
    {
        return $this->idFunc;
    }

    public function setSenhaFunc($senhaFunc)
    {
        $this->senhaFunc = $senhaFunc;
    }
    public function getSenhaFunc()
    {
        return $this->senhaFunc;
    }

    

    
}

?>