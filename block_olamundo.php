<?php
class block_olamundo extends block_base {
    
    public function init() {
        $this->title = get_string('pluginname', 'block_olamundo');
    }

    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }

        global $USER;

        $this->content = new stdClass();
        
        if (isloggedin() && !isguestuser()) {
            $nome = fullname($USER);
            $this->content->text = "<p>Olá, <strong>{$nome}</strong>! Seja bem-vindo de volta ao ambiente virtual.</p>";
        } else {
            $this->content->text = "<p>Olá, Visitante! Faça login para aproveitar todos os recursos.</p>";
        }

        $this->content->footer = 'Plugin Moodle - Olá Mundo';

        return $this->content;
    }

    // Permite que o bloco seja adicionado em qualquer página
    public function applicable_formats() {
        return array('all' => true);
    }
}