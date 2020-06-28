<?php

Class session{

  public function __construct(){
    session_start();
  }

  public function Add($name, $value){
    $_SESSION[$name] = $value;
  }

  public function User($name, $value){
    $_SESSION[$name] = $value;
  }

  public function NivelAcceso($name, $value){
    $_SESSION[$name] = $value;
  }

  public function Retorna($name){
    return $_SESSION[$name];
  }

  public function out(){
    session_unset();
    session_destroy();
  }

}
