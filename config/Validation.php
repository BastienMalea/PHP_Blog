<?php
    class Validation{

        static function verifChamp($auteur,$commentaire){
                $error = array();
                if(empty($auteur)){
                    $error []= 'erreur veuillez renseigner le premier champ';
                }
                if(empty($commentaire)){
                    $error []= 'erreur veuillez renseigner le second champ';
                }
                return $error;
            }
        //Pour vérifier les pages et les id
        static function is_int($value){
                if(filter_var($value, FILTER_VALIDATE_INT)) return true;
            }
        //Pour vérifier les chaines de caractères dans la connection par exemple
        static function is_string($value){
                return filter_var($value, FILTER_SANITIZE_STRING);
        }
    }
?>