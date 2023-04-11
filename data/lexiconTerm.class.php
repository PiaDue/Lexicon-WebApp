<?php
class LexiconTerm {
  public $term;
  public $definition;

  function __construct($term, $def) {
    $this->term = $term; 
    $this->definition = $def; 
  }
}