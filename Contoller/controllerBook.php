<?php 
 include "Model\book\BookDAO.php" ;



class contoller_Books {

    function getBooks()  {
        
   $BookDAO = new BookDAO() ;
   $books = $BookDAO-> get_books();

   include "View\Book.php" ; 


    }

    function getBooksForm()  {
        
   $BookDAO = new BookDAO() ;
   $books = $BookDAO-> get_books();

 return $books ;


    }


    function afficheform()  {
        $isbn = "2345678901234"  ; 
        $BookDAO = new BookDAO() ;
        $book = $BookDAO->getBookByID($isbn) ;
  
        include "View\bookForm.php" ; 
    }
 


    function setBooks()  {
       $Title = $_POST["Title"] ; 
       $Genra = $_POST["Genra"] ; 
       $ISBN = $_POST["ISBN"] ; 

   $BookDAO = new BookDAO() ;
   $Book = new Book(  $ISBN  ,  $Title , $Genra , 15 , 150 , "kamal") ;


    $BookDAO->update_book($Book);

    include "View\bookForm.php"  ; 
       
    }


 


 




}