<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Thiago
 */
class Cliente {
    private $nome;
    private $cpf_cnpj;
    private $telefone1;
    private $telefone2;
    private $email;
    
    function getNome() {
        return $this->nome;
    }

    function getCpf_cnpj() {
        return $this->cpf_cnpj;
    }

    function getTelefone1() {
        return $this->telefone1;
    }

    function getTelefone2() {
        return $this->telefone2;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setCpf_cnpj($cpf_cnpj) {
        $this->cpf_cnpj = $cpf_cnpj;
    }

    function setTelefone1($telefone1) {
        $this->telefone1 = $telefone1;
    }

    function setTelefone2($telefone2) {
        $this->telefone2 = $telefone2;
    }

    function setEmail($email) {
        $this->email = $email;
    }
}
