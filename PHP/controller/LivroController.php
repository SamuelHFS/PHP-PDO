<?php
include_once 'C:/xampp/htdocs/PAcademia/PHP/dao/daolivro.php'; #casa
include_once 'C:/xampp/htdocs/PAcademia/PHP/model/livro.php'; #casa
#include_once  'C:/xampp/htdocs/ProAcademia/PHP/dao/daolivro.php';
#include_once 'C:/xampp/htdocs/ProAcademia/PHP/model/livro.php';


class LivroController{
    public function inserirLivro($titulo, $autor, $editora, $qtdEstoque){
        $livro = new Livro();
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQtdEstoque($qtdEstoque);

        $daoLivro = new daolivro();
        return $daoLivro->inserir($livro);
    }

    public function listarLivros(){
        $daoLivro = new daolivro();
        return $daoLivro->listarLivrosDAO();
    

}
//metodo para atualizar 

    //metodo para atualizar dados da tabela livro 

    public function atualizarLivro($id, $titulo, $autor, $editora, $qtdEstoque)
    {
        $livro = new Livro();
        $livro->setId($id);
        $livro->setTitulo($titulo);
        $livro->setAutor($autor);
        $livro->setEditora($editora);
        $livro->setQtdEstoque($qtdEstoque);

        $daoLivro = new DaoLivro();
        return $daoLivro->atualizarLivroDAO($livro);
    }
//metodo para excluir livro 
    public function excluirLivro($id){
        $daoLivro = new daolivro();
        $daoLivro->excluirLivroDAO($id);
    }

    //metodo para retornar livro com os dados do banco de dados
    public function pesquisarLivroId($id){
        $daoLivro = new daolivro();
        return $daoLivro->pesquisarLivroIdDAO($id);
    }

    //método para editar livro

    public function editarLivro($id){
        $daoLivro = new daolivro();
       return  $daoLivro->editarLivroDAO($id);
    }

//método para limpar formulário
public function limpar(){
    return $pr = new Livro();
}

}

