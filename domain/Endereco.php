<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Endereco
 *
 * @author Thiago
 */
class Endereco {
    private $cliente_id;
    private $empresa_id;
    private $rua;
    private $numero;
    private $bairro;
    private $CEP;
    private $cidade;
    private $estado;
    
    /*function __construct() {
        $this->cliente_id = null;
        $this->empresa_id = null;
    }*/
    
 function getCliente_id() {
     return $this->cliente_id;
 }

 function getEmpresa_id() {
     return $this->empresa_id;
 }

 function getRua() {
     return $this->rua;
 }

 function getNumero() {
     return $this->numero;
 }

 function getBairro() {
     return $this->bairro;
 }

 function getCEP() {
     return $this->CEP;
 }

 function getCidade() {
     return $this->cidade;
 }

 function getEstado() {
     return $this->estado;
 }

 function setCliente_id($cliente_id) {
     $this->cliente_id = $cliente_id;
 }

 function setEmpresa_id($empresa_id) {
     $this->empresa_id = $empresa_id;
 }

 function setRua($rua) {
     $this->rua = $rua;
 }

 function setNumero($numero) {
     $this->numero = $numero;
 }

 function setBairro($bairro) {
     $this->bairro = $bairro;
 }

 function setCEP($CEP) {
     $this->CEP = $CEP;
 }

 function setCidade($cidade) {
     $this->cidade = $cidade;
 }

 function setEstado($estado) {
     $this->estado = $estado;
 }


}
