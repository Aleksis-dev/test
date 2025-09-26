<?php

$books = [
    1 => [
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald',
        'status' => 'available'
    ],
    2 => [
        'title' => '1984',
        'author' => 'George Orwell',
        'status' => 'available'
    ],
    3 => [
        'title' => 'Pride and Prejudice',
        'author' => 'Jane Austen',
        'status' => 'available'
    ]
];

function addBook(&$books) {
    $title = readline("Enter title: ");
    $author = readline("Enter author: ");
    $books[] = ['title' => $title, 'author' => $author];
}

function deleteBook(&$books) {
    $id = readline("Enter book ID you want to delete: ");
    if (isset($books[$id])) {
        echo "\nDeleted book ID: {$id} // Title: ". $books[$id]['title'] . " // Author: " . $books[$id]['author']. "\n\n";
        unset($books[$id]);
    } else {
        echo "No book found!";
    }
}

function displayBook($id, $book) {
    echo "ID: {$id} // Title: ". $book['title'] . " // Author: " . $book['author']. "\n\n";
}

function displayAllBooks(&$books) {
    foreach ($books as $id => $book) {
        displayBook($id, $book);
    }
}

function getAndDisplayBook(&$books) {
    $id = readline("Enter book id: ");
    displayBook($id, $books[$id]);
}

function exitLoop(&$continue) {
    echo "Goodbye!\n";
    $continue = false;
}

function errorMsg() {
    echo "Invalid Choice!\n";
}

function secret(&$books) {
    print_r($books);
}


echo "\n\nWelcome to the Library\n";

do {
    echo "\n\n";
    echo "1 - show all books\n";
    echo "2 - show a book\n";
    echo "3 - add a book\n";
    echo "4 - delete a book\n";
    echo "5 - quit\n\n";
    $choice = readline();
    $continue = true;

    switch ($choice) {
        case 1:
            displayAllBooks($books);

            break;
        case 2:
            getAndDisplayBook($books);

            break;
        case 3:
            addBook($books);
            break;
        case 4:
            deleteBook($books);
            break;
        case 5:
            exitLoop($continue);

            break;
        case 13:
            secret($books);
            break;
        default:
            errorMsg();

            break;
    };

} while ($continue == true);