<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Projeto
 *
 * @author Thiago
 */
class Projeto {
    private $cliente_id;
    private $usuario_id;
    private $tipoprojeto_id;
    private $data_entrada;
    private $data_prevista;
    private $descricao;
    private $valor;
    
    function getCliente_id() {
        return $this->cliente_id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getTipoprojeto_id() {
        return $this->tipoprojeto_id;
    }

    function getData_entrada() {
        return $this->data_entrada;
    }

    function getData_prevista() {
        return $this->data_prevista;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setTipoprojeto_id($tipoprojeto_id) {
        $this->tipoprojeto_id = $tipoprojeto_id;
    }

    function setData_entrada($data_entrada) {
        $this->data_entrada = $data_entrada;
    }

    function setData_prevista($data_prevista) {
        $this->data_prevista = $data_prevista;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }


}
