<?php

$books = [
    1 => [
        'title' => 'The Great Gatsby',
        'author' => 'F. Scott Fitzgerald'
    ],
    2 => [
        'title' => '1984',
        'author' => 'George Orwell'
    ],
    3 => [
        'title' => 'Pride and Prejudice',
        'author' => 'Jane Austen'
    ]
];

function addBook(&$books) {
    $title = readline("Enter title: ");
    $author = readline("Enter author: ");
    $books[] = ['title' => $title, 'author' => $author];
}

function deleteBook(&$books) {
    $id = readline("Enter book ID you want to delete: ");
    unset($books[$id]);
}

function displayBook($id, $book) {
    echo "ID: {$id} // Title: ". $book['title'] . " // Author: " . $book['author']. "\n\n";
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
            foreach ($books as $id => $book) {
                displayBook($id, $book);
            }

            break;
        case 2:
            $id = readline("Enter book id: ");
            displayBook($id, $books[$id]);

            break;
        case 3:
            addBook($books);
            break;
        case 4:
            deleteBook($books);
            break;
        case 5:
            echo "Goodbye!\n";
            $continue = false;
            break;
        case 13:
            print_r($books);
            break;
        default:
            echo "Invalid choice\n";
    };

} while ($continue == true);