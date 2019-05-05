<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PokemonsModel extends CI_Model {

	public static function all() {
      $CI = & get_instance();
      $pokemons = $CI->db->select("*")->from("pokemons")->limit('200')->get()->result();
      return $pokemons;
  }

  public static function list($page) {
  		$offset = 15;

  		$page = $page <= 0 ? 1 : $page;
			$begin = $page - 1;
			$begin = $begin * $offset;

      $CI = & get_instance();
      $pokemons = $CI->db->select("*")->from("pokemons")->where("removed", 0)->limit($offset, $begin)->get()->result();
      return $pokemons;
  }

  public static function filter($word) {
      $CI = & get_instance();
      $pokemons = $CI->db->select("*")->from("pokemons")->like("name", $word)->limit('200')->get()->result();
      return $pokemons;
  }

  public static function modify($pokemon, $id) {
      $CI = & get_instance();
      $CI->db->where("id", $id);
      try {
          $CI->db->update("pokemons", $pokemon);
          return true;
      } catch (Exception $e) {
          return false;
      }
  }
}
