<?php 

class User {
    private $name, $email, $password, $cpf, $dt;
    
    public function getName(): String {
        return $this->name;
    }

    public function setName(String $name) {
        $this->name = $name;
    }

    public function getEmail(): String {
        return $this->email;
    }

    public function setEmail(String $email) {
        $this->email = $email;
    }
    
    public function getCpf(): int {
        return $this->cpf;
    }
    
    public function setCpf(int $cpf) {
        $this->cpf = $cpf;
    }

    public function getPassword(): String {
        return $this->password;
    }

    public function setPassword(String $password) {
        $this->password = $password;
    }

    public function getDt(): DateTime {
        return $this->dt;
    }

    public function setDt(String $dt){
        $this->dt= new DateTime($dt);
    }

}

