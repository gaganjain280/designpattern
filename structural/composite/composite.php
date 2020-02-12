<?php
/**
* composite is a structural design pattern that allows objects with
* incompatible interfaces to collaborate.
*/
 namespace StructuralComposite{
  class CompositePattern{
    public function __construct(){
         add_action('wp_ajax_compositeClientCode', array($this,'compositeClientCode'));
         add_action('wp_ajax_nopriv_compositeClientCode', array($this,'compositeClientCode'));
    }
    /**
 * The client code creates a builder object, passes it to the director and then
 * initiates the construction process. The end result is retrieved from the
 * builder object.
 */
  public function compositeClientCode(){
  $firstBook = new OneBook('Core PHP Programming, Third Edition', 'Atkinson and Suraski');
  $thtml='(after creating first book) oneBook info: ';
  $thtml.=$firstBook->getBookInfo(1);
  $secondBook = new OneBook('PHP Bible', 'Converse and Park');
  $thtml.='<br>(after creating second book) oneBook info: ';
  $thtml.=$secondBook->getBookInfo(1);
  $thirdBook = new OneBook('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

  $thtml.='<br>(after creating third book) oneBook info: ';
  $thtml.=$thirdBook->getBookInfo(1);
  
  $books = new SeveralBooks();
  $booksCount = $books->addBook($firstBook);
  $thtml.='<br>(after adding firstBook to books) SeveralBooks info :';
  $thtml.=$books->getBookInfo($booksCount);

  $booksCount = $books->addBook($secondBook);
  $thtml.='<br>(after adding secondBook to books) SeveralBooks info : ';
  $thtml.=$books->getBookInfo($booksCount);
 
  $booksCount = $books->addBook($thirdBook);
  $thtml.='<br>(after adding thirdBook to books) SeveralBooks info :';
  $thtml.=$books->getBookInfo($booksCount);

  $booksCount = $books->removeBook($firstBook);
  $thtml.='<br>(after removing firstBook from books) SeveralBooks count :';

  $thtml.=$books->getBookCount();
  $thtml.='(after removing firstBook from books) SeveralBooks info 1 :';
  $thtml.=$books->getBookInfo(1);
  $thtml.='(after removing firstBook from books) SeveralBooks info 2 :';
  $thtml.=$books->getBookInfo(2);
  echo $thtml;

 wp_die();
    }
 }
abstract class OnTheBookShelf {
    abstract function getBookInfo($previousBook);
    abstract function getBookCount();
    abstract function setBookCount($new_count);
    abstract function addBook($oneBook);
    abstract function removeBook($oneBook);
}

class OneBook extends OnTheBookShelf {
    private $title;
    private $author;
    function __construct($title, $author) {
      $this->title = $title;
      $this->author = $author;
    }
    function getBookInfo($bookToGet) {
      if (1 == $bookToGet) {
        return $this->title." by ".$this->author;
      } else {
        return FALSE;
      }
    }
    function getBookCount() {
      return 1;
    }
    function setBookCount($newCount) {
      return FALSE;
    }
    function addBook($oneBook) {
      return FALSE;
    }
    function removeBook($oneBook) {
      return FALSE;
    }
}

class SeveralBooks extends OnTheBookShelf {
    private $oneBooks = array();
    private $bookCount;
    public function __construct() {
      $this->setBookCount(0);
    }
    public function getBookCount() {
      return $this->bookCount;
    }
    public function setBookCount($newCount) {
      $this->bookCount = $newCount;
    }
    public function getBookInfo($bookToGet) {   
      if ($bookToGet <= $this->bookCount) {
        return $this->oneBooks[$bookToGet]->getBookInfo(1);
      } else {
        return FALSE;
      }
    }
    public function addBook($oneBook) {
      $this->setBookCount($this->getBookCount() + 1);
      $this->oneBooks[$this->getBookCount()] = $oneBook;
      return $this->getBookCount();
    }
    public function removeBook($oneBook) {
      $counter = 0;
      while (++$counter <= $this->getBookCount()) {
        if ($oneBook->getBookInfo(1) == $this->oneBooks[$counter]->getBookInfo(1)) {
          for ($x = $counter; $x < $this->getBookCount(); $x++) {
            $this->oneBooks[$x] = $this->oneBooks[$x + 1];
          }
          $this->setBookCount($this->getBookCount() - 1);
        }
      }
      return $this->getBookCount();
    }
}
 
}