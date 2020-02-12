<?php
/**
* proxy is a structural design pattern that allows objects with
* incompatible interfaces to collaborate.
*/
 namespace StructuralProxy{
  class proxyPattern{
    public function __construct(){
         add_action('wp_ajax_proxyClientCode', array($this,'proxyClientCode'));
         add_action('wp_ajax_nopriv_proxyClientCode', array($this,'proxyClientCode'));
    }
   

/**
 * The client code may issue several similar download requests. In this case,
 * the caching proxy saves time and traffic by serving results from cache.
 *
 * The client is unaware that it works with a proxy because it works with
 * downloaders via the abstract interface.
 */
  public function proxyClientCode(){
  $thtml='';
   $title_type=$_POST['title_type'];
    $realSubject = new SimpleDownloader;
   if($title_type==1){
    $thtml.="Executing client code with real subject\n";
    $realSubject->download("http://gagan.codingkloud.com/wp-content/uploads/2019/11/5.jpg");
   }else{
    echo "Executing the same client code with a proxy:";
    $proxy = new CachingDownloader($realSubject);
    $proxy->download("http://gagan.codingkloud.com/wp-content/uploads/2019/11/5.jpg");
   }
   echo $thtml;
   wp_die();
  }
}
/**
 * The Subject interface describes the interface of a real object.
 *
 * The truth is that many real apps may not have this interface clearly defined.
 * If you're in that boat, your best bet would be to extend the Proxy from one
 * of your existing application classes. If that's awkward, then extracting a
 * proper interface should be your first step.
 */
interface Downloader
{
    public function download(string $url): string;
}

/**
 * The Real Subject does the real job, albeit not in the most efficient way.
 * When a client tries to download the same file for the second time, our
 * downloader does just that, instead of fetching the result from cache.
 */
class SimpleDownloader implements Downloader
{
    public function download(string $url): string
    {
        $img = 'C:/Users/HP/Downloads/';
        file_put_contents($img, file_get_contents($url));
        echo "Downloading a file from the Internet.\n";
        $result = file_get_contents($url);
        echo "Downloaded bytes: " . strlen($result) . "\n";
        
        return $result;
    }
}

/**
 * The Proxy class is our attempt to make the download more efficient. It wraps
 * the real downloader object and delegates it the first download calls. The
 * result is then cached, making subsequent calls return an existing file
 * instead of downloading it again.
 *
 * Note that the Proxy MUST implement the same interface as the Real Subject.
 */
class CachingDownloader implements Downloader
{
   
    private $downloader;

   
    public $cache = [];

    public function __construct(SimpleDownloader $downloader)
    {
        $this->downloader = $downloader;
    }

    public function download(string $url): string
    { 
        if (!isset($this->cache[$url])) {
            echo "CacheProxy MISS. ";
            $result = $this->downloader->download($url);
            $this->cache[$url] = $result;
        } else {
            echo "CacheProxy HIT. Retrieving result from cache.\n";
        }
        return $this->cache[$url];
    }
}

}