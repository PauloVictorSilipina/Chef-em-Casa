<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class BuscaCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function buscarResultadosNaPaginaTest(AcceptanceTester $I)
    {
      $I->amOnPage('/Website-Chef-em-Casa/index.html');
      $I->click('Login');
      $I->seeCurrentURLEquals('/login.html');
      $I->fillField('usuario', 'Ricardo');
      $I->fillField('senha', '123456');
      $I->click('Fazer login');
      $I->seeCurrentURLEquals('/index.html');
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