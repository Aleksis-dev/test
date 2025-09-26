<?php

namespace Books;

class Book {
    public $title;
    public $author;
    public $status;

    public function __construct($title, $author, $status) {
        $this->title = $title;
        $this->author = $author;
        $this->status = $status;
    }

    public function display() {
        return " // Title: ". $this->title . " // Author: " . $this->author. " // Status: " . $this->status . "\n\n";
    }

    public function setStatus($status) {
        switch ($status) {
            case 1:
                $this->status = 'available';

                break;
            case 2:
                $this->status = 'not available';
            
                break;

            default:
                $this->status = 'available';
        }
    }
}