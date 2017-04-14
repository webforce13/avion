<?php
/* la page de contact pour le formulaire */ 
$this->insert("section/section-header");
$this->insert("section/section-contact",["message"=>$message]);
$this->insert("section/section-footer");
?>