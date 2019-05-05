<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokemon extends CI_Controller {

	public function index() {
		echo 'Pokémon API';
	}

	public function all() {
		echo json_encode(PokemonsModel::all());
	}

	public function list($page = 1) {
		echo json_encode(PokemonsModel::list($page));
	}

	public function filter() {
		$word = $this->input->post('word');
		echo json_encode(PokemonsModel::filter($word));
	}

	public function modify() {
		$pokemon = $this->input->post();
		$id = $pokemon['id'];
		unset($pokemon['id']);

		echo json_encode(PokemonsModel::modify($pokemon, $id));
	}

	public function remove() {
		$pokemonID = $this->input->post('id');
		echo json_encode(PokemonsModel::modify(array('removed' => 1 ), $pokemonID));
	}
}
