<?php
require_once 'Prateleira.php';
require_once 'Livro.php';

class ProcurarLivro{
    private $registro;
    private $livro;
    
    public function procurarLivro(){
        
    }
    /*public function procurarLivroNome(){
        
    }
    public function procurarLivroRegistro(){
        
    }*/
    public function getRegistro() {
        return $this->registro;
    }

    public function getLivro() {
        return $this->livro;
    }

    public function setRegistro($registro) {
        $this->registro = $registro;
    }

    public function setLivro($livro) {
        $this->livro = $livro;
    }


}
