<?php
/**
* decorater is a structural design pattern that allows objects with
* incompatible interfaces to collaborate.
*/
 namespace Structuraldecorater{
  class decoraterPattern{
    public function __construct(){
         add_action('wp_ajax_decoraterClientCode', array($this,'decoraterClientCode'));
         add_action('wp_ajax_nopriv_decoraterClientCode', array($this,'decoraterClientCode'));
    }
    /**
 * The client code creates a builder object, passes it to the director and then
 * initiates the construction process. The end result is retrieved from the
 * builder object.
 */
  public function decoraterClientCode(){
  $patternBook      = new Book('Gamma, Helm, Johnson, and Vlissides', 'Design Patterns');
  $decorator        = new BookTitleDecorator($patternBook);
  $starDecorator    = new BookTitleStarDecorator($decorator);
  $exclaimDecorator = new BookTitleExclaimDecorator($decorator);
  $thtml='showing title : ';
  $thtml.=$decorator->showTitle();
  $thtml.='<br>showing title after two exclaims added :';
  $thtml.=$exclaimDecorator->exclaimTitle();
  $thtml.=$decorator->showTitle();
  $thtml.='<br>showing title after star added:<br>';
  $thtml.=$starDecorator->starTitle();
  $thtml.='<br>showing title after reset:';
  $thtml.=$decorator->resetTitle();
  $thtml.=$decorator->showTitle();
  echo $thtml;
 wp_die();
    }
 }
 class Book {
    private $author;
    private $title;
    function __construct($title_in, $author_in) {
        $this->author = $author_in;
        $this->title  = $title_in;
    }
    function getAuthor() {
        return $this->author;
    }
    function getTitle() {
        return $this->title;
    }
    function getAuthorAndTitle() {
      return $this->getTitle().' by '.$this->getAuthor();
    }
}

class BookTitleDecorator {
    protected $book;
    protected $title;
    public function __construct(Book $book_in) {
        $this->book = $book_in;
        $this->resetTitle();
    }   
    //doing this so original object is not altered
    function resetTitle() {
        $this->title = $this->book->getTitle();
    }
    function showTitle() {
        return $this->title;
    }
}

class BookTitleExclaimDecorator extends BookTitleDecorator {
    private $btd;
    public function __construct(BookTitleDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function exclaimTitle() {
        $this->btd->title = "!" . $this->btd->title . "!";
    }
}

class BookTitleStarDecorator extends BookTitleDecorator {
    private $btd;
    public function __construct(BookTitleDecorator $btd_in) {
        $this->btd = $btd_in;
    }
    function starTitle() {
       return $this->btd->title ="**".$this->btd->title."**";
    }
}
}