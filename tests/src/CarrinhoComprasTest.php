<?php
/**
 * Carrinho de compras test
 * @group Artigo
 */
class CarrinhoComprasTest extends PHPUnit_Framework_TestCase {
  private $carrinho;

  function setup() {
    $this->carrinho = array(
      'total' => 0,
      'itens' => array(
      )
    );
  }


  function testCarrinhoTipoEAtributos() {
    $this->assertTrue( is_array( $this->carrinho ), 'Carrinho é um array: ok' );

    $this->assertArrayHasKey('total', $this->carrinho, 'Carrinho tem indice total: ok');

    $this->assertArrayHasKey('itens', $this->carrinho, 'Carrinho tem indice itens: ok');
  }

  function testCarrinhoDeveTer3Itens() {
    $this->encherCarrinhoComItens();

    $this->assertEquals( 3, count( $this->carrinho['itens'] ), 'Carrinho tem 3 itens: ok' );
  }

  function testCarrinhoDeveTerValorTotal() {
    $this->encherCarrinhoComItens();

    $totalCarrinho = $this->carrinho['itens'][0]['valor'] +
    $this->carrinho['itens'][1]['valor'] +
    $this->carrinho['itens'][2]['valor'];

    $this->assertEquals( 250.8, $totalCarrinho, 'Valor total do carrinho: ok' );
  }

  function testCarrinhoDeveTerValorComDesconto() {
    $this->encherCarrinhoComItens();

    $totalCarrinho = $this->carrinho['itens'][0]['valor'] +
    $this->carrinho['itens'][1]['valor'] +
    $this->carrinho['itens'][2]['valor'];

    $this->assertEquals( 200.64, $totalCarrinho * ( 1 - 0.2 ), 'Valor com desconto: ok' );
  }

  function tearDown() {
    $this->carrinho = null;
  }

  function encherCarrinhoComItens() {
    $item = array(
      'desc' => 'Sapato de festa azul',
      'valor' => 49.9
    );
    $this->carrinho['itens'][] = $item;

    $item = array(
      'desc' => 'Sapato preto com enfeites',
      'valor' => 79.9
    );
    $this->carrinho['itens'][] = $item;

    $item = array(
      'desc' => 'Sapato de marca famosa',
      'valor' => 121.0
    );
    $this->carrinho['itens'][] = $item;
  }
}