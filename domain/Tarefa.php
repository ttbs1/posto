<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tarefa
 *
 * @author Thiago
 */
class Tarefa {
    private $usuario_id;
    private $projeto_id;
    private $tipoprojeto_id;
    private $descricao;
    private $peso;
    private $status;
    
    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProjeto_id() {
        return $this->projeto_id;
    }

    function getTipoprojeto_id() {
        return $this->tipoprojeto_id;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPeso() {
        return $this->peso;
    }

    function getStatus() {
        return $this->status;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProjeto_id($projeto_id) {
        $this->projeto_id = $projeto_id;
    }

    function setTipoprojeto_id($tipoprojeto_id) {
        $this->tipoprojeto_id = $tipoprojeto_id;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPeso($peso) {
        $this->peso = $peso;
    }

    function setStatus($status) {
        $this->status = $status;
    }

}
