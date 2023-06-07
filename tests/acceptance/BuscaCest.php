<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class BuscaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function testeLogin(AcceptanceTester $I)
    {
      $I->amOnPage('/Website-Chef-em-Casa/index.html');
      $I->click('Login');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/login.html');
      $I->fillField('usuario', 'Ricardo');
      $I->fillField('senha', '123456');
      $I->click('Fazer login');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/index.html');
    }

    public function testeCadastro(AcceptanceTester $I)
    {
      $I->amOnPage('/Website-Chef-em-Casa/index.html');
      $I->click('Cadastro');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/cadastro.html');
      $I->fillField('usuario', 'Ricardo');
      $I->fillField('senha', '123456');
      $I->fillField('cfsenha', '123456');
      $I->click('Fazer cadastro');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/login.html');
    }

    public function testeContato(AcceptanceTester $I)
    {
      $I->amOnPage('/Website-Chef-em-Casa/index.html');
      $I->click('Contato');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/contato.html');
      $I->fillField('name', 'Ricardo Leite Rodrigues');
      $I->fillField('mensagem', 'Olá, bom dia, gostaria de fazer um pedido para adicionarem mais receitas de doces!');
      $I->click('Enviar');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/contato.html');
    }

    public function testeReceita(AcceptanceTester $I)
    {
      $I->amOnPage('/Website-Chef-em-Casa/index.html');
      $I->click('bolo');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/receita.html');
    }

    public function testeSobre(AcceptanceTester $I)
    {
      $I->amOnPage('/Website-Chef-em-Casa/index.html');
      $I->click('Sobre');
      $I->seeCurrentURLEquals('/Website-Chef-em-Casa/sobre.html');
    }



}

/*
$I = new AcceptanceTester($scenario);
$I->amOnPage('/html/index.html');
$I->click('Cadastro');
$I->seeCurrentURLEquals('/html/cadastro.html');
$I->fillField('usuario', 'Ricardo');
$I->fillField('senha', 'eletro');
$I->fillField('cfsenha', 'eletro');
$I->click('Fazer cadastro');
$I->seeCurrentURLEquals('/html/login.html');
*/

/*
$I = new AcceptanceTester($scenario);
$I->amOnPage('/html/index.html');
$I->click('Login');
$I->seeCurrentURLEquals('/html/login.html');
$I->fillField('usuario', 'Ricardo');
$I->fillField('senha', 'eletro');
$I->click('Fazer login');
$I->seeCurrentURLEquals('/html/index.html');
*/

/*

*/