<?php

use Books\Book;

$books = [
    new Book("The Great Gatsby", "F. Scott Fitzgerald", 'available'), 
    new Book("1984", "George Orwell", 'available'),
    new Book("Pride and Prejudice", "Jane Austen", 'available'),
];

function addBook(&$books) {
    $title = readline("Enter title: ");
    $author = readline("Enter author: ");
    $books[] = new Book($title, $author, 'available');
}

function deleteBook(&$books) {
    $id = readline("Enter book ID you want to delete: ");
    if (isset($books[$id - 1])) {
        echo "Deleted book ID: {$id}" . $books[$id-1]->display();
        unset($books[$id - 1]);
    } else {
        echo "No book found!";
    }
}

function displayBook($id, $book) {
    $newId = $id + 1;
    echo "ID: {$newId}" . $book->display();
}

function displayAllBooks(&$books) {
    foreach ($books as $id => $book) {
        displayBook($id, $book);
    }
}

function getAndDisplayBook(&$books) {
    $id = readline("Enter book id: ");
    displayBook($id - 1, $books[$id - 1]);
}

function exitLoop(&$continue) {
    echo "Goodbye!\n";
    $continue = false;
}

function errorMsg() {
    echo "Invalid Choice!\n";
}

function readStatus(&$books) {
    $id = readline("Enter book id: ");
    if (isset($books[$id - 1])) {
        $status = readline("Enter the status number (1 => available // 2 => not available): ");
        $books[$id-1]->setStatus($status);
    } else {
        echo "No book found!\n";
    }
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
    echo "5 - set status of book\n";
    echo "6 - quit\n\n";
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
            readStatus($books);

            break;
        case 6:
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