<?php
class Ajax_model extends CI_Model
{
    protected $table = 'produits';
    public function __construct()
    {
        parent::__construct();
    }

   public function doublon($verif, $champs, $table){
       //condition where 
        $this->db->where($champs, $verif);
        // requete db compte le nombre occurence
        $data = $this->db->count_all_results($table);
        //retourne le resultat au controleur
        return $data;
    }
}