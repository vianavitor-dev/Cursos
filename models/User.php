<?php 

class User {
    private $name, $email, $password, $cpf, $dt;
    
    public function getName(): String {
        return $this->name;
    }

    public function setName(String $name): void {
        $this->name = $name;
    }

    public function getEmail(): String {
        return $this->email;
    }

    public function setEmail(String $email): void {
        $this->email = $email;
    }
    
    public function getCpf(): int {
        return $this->cpf;
    }
    
    public function setCpf(int $cpf): void {
        $this->cpf = $cpf;
    }

    public function getDt(): DateTime {
        return $this->dt;
    }

    public function setDt(DateTime $dt): void {
        $this->dt= $dt;
    }

}

