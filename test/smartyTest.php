<?php

require_once "Smarty/Smarty.class.php";
GLOBAL $MOCK_OBJECTS;
$MOCK_OBJECTS = array();
function print_call_stack() {
    $debug = debug_backtrace();
    array_shift($debug);
    foreach ($debug as $d) {
        if (stripos($d['file'], "PHPUnit") === false)
        {
            echo "File: ".$d['file']."\n";
            echo "Function: ".$d['function']."\n";
            echo "Line: ".$d['line']."\n";
        }
        
    }
}
class DynamicField {

    protected $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function __toString() {
        return (string) $this->value;
    }

}

class Article {

    protected $title;
    protected $author;
    protected $date;
    protected $body;

    public function __set($key, $value) {
        $this->$key = new DynamicField($value);
    }

    public function __get($key) {
        echo "Accessed $key\n";
        return $this->$key;
    }

    public function __toString() {
        return "bar";
    }

}

class smartyTest extends PHPUnit_Framework_TestCase {

    function testSmarty() {
        GLOBAL $MOCK_OBJECTS;
        $smarty = new Smarty();
        $smarty->setTemplateDir(APPLICATION_PATH . '/views/scripts/dummy/');
        $smarty->setCompileDir(APPLICATION_PATH . '/views/templates_c/');
        $smarty->setConfigDir(APPLICATION_PATH . '/configs/');
        $smarty->setCacheDir(APPLICATION_PATH . '/views/cache/');
        $smarty->caching = false;

        $article = new Article();
        $article->title = "Test Foo";
        $article->author = "Author";
        $article->date = strtotime("NOW");
        $article->body = "Test Body";

        //$foo = $article->author;
        //echo $foo;

        $smarty->assign("article", $article);

        $template = $smarty->createTemplate('test.tpl');
        $tags = $smarty->getTags($template);
        //var_dump($tags);
        
        print_r($MOCK_OBJECTS);


        //$content = $smarty->fetch("test.tpl");
    }

}