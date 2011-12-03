<?php
// Entities/Article.php
namespace Entities;
/**
 * @Entity @Table(name="articles")
 */
class Article extends \Doctrine_Node
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $id;
    
    /**
     * @Column(type="string")
     * @var string
     */
    protected $title;
    
    /**
     * @Column(type="string")
     * @var string
     */
    public $body;
       
    public function getId()
    {
        return $this->id;
    }
    
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    public function setBody($body)
    {
        $this->body = $body;
    }
}
