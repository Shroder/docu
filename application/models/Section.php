<?php
class Section extends Entity {
    private $listType = 'Standard';
    protected $domain;
    protected $path; // ex. /topics/foo
    protected $segmentedPath; // ex. /foo
    protected $parent;
    protected $children;
    /**
     *
     * @var array
     * array(
     *     "left"   => array(Module),
     *     "center" => array(Module),
     *     "right"  => array(Module)
     *     
     */
    protected $modules = array();
    
    /**
     *
     * @var array
     * array(Content)
     * 
     */
    protected $contentList = array();

    /**
     * @property
     * array(
     *     "main"         => "site/listing/template", 
     *     "contentType"  => "site/detail/detail", 
     *     "contentType2" => "site/detail/detail2" 
     *     ) 
     *  ) 
     */
    protected $templates = array(); 
    
    /*
     * Sections are called using a valid index: id, path, title
     */
    public function __construct() {
        $params = func_get_args();
        for ($i=0; $i < count($params); $i++) {
            if (is_numeric($params[$i]) && empty($this->_id)) {
                $this->_id = $params[$i];
            } elseif (strpos($params[$i], "/") !== false) {
                $this->path = $params[$i];
            } else {
                $this->title = $params[$i];
            }
        }
        if (empty($this->_id) && empty($this->path) && empty($this->title)) {
            throw new Exception("Invalid section specified");
        }

        /*
        if (empty($this->_id) && !$this->getParent()) {
            throw new Exception("Invalid parent set");
        }
         * 
         */
    }
    
    protected function initContentList() {
        $this->contentList = new $this->listType;
    }

    public function getPath() {
        return $this->path;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getSegmentedPath() {
        return $this->segmentedPath;
    }

    /*
     * Lazy load parent
     */
    public function getParent() {
        throw new Exception("This method has not been implemented");
        return;
    }
    
    /*
     * Internal method for fetching template by index
     */
    private function getTemplate($index) {
        if (empty($this->templates[$index])) {
            return null;
        }
        return new Template($this->templates[$index]);
    }
    
    private function setTemplate($index, $path) {
        $this->templates[$index] = $path;
    }
    
    public function getMainTemplate() {
        return $this->getTemplate("main");
    }
    
    public function setMainTemplate($path) {
        $this->setTemplate("main", $path);
        return true;
    }
    
    public function getDetailTemplate($content_type) {
        return $this->getTemplate($content_type);
    }
    
    public function setDetailTemplate($content_type, $path) {
        if (empty($content_type)) {
            throw new Exception("Invalid content-type set");
        }
        if (empty($path)) {
            throw new Exception("Invalid path set");
        }
        $this->setTemplate($content_type, $path);
        return true;
    }
    
    public function getAllTemplates() {
        return array();
    }
    
    public function getAllDetailTemplates() {
        return array();
    }    
    
    /*
     * Intended for detail pages,
     * retrieves a single content item
     */
    public function getContent($index) {
        return $this->contentList->getContent($index);
    }

    /*
     * Retrieve list of content items by associated items or search.
     */
    public function getContentList() {
        return $this->contentList();
    }
    
    public function getModule($column, $position) {
        if (empty($this->modules[$column][$position])) {
            return null;
        }
        return $this->modules[$column][$position];
    }

    public function getModules($column) {
        return (array) $this->modules[$column];
    }
    
    public function setModule($column, $module, $position = null) {
        if (!($module instanceof Module)) {
            throw new Exception("Module must be type Module");
        }
        if (empty($this->modules[$column])) {
            $this->modules[$column] = array();
        }
        if ($position == null) {
            $position = count($this->modules[$column]) - 1;
        }
        array_splice($this->modules[$column], $position, 0, $module);
    }
    
}