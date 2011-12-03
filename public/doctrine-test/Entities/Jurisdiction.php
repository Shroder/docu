<?php
namespace Entities;
/**
 * @Entity @Table(name="Jurisdictions")
 */
class Jurisdiction extends \Doctrine_Node {
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
    
    /*
     * @OneToMany(targetEntity="Bid", "mappedBy="city")
     * @var Bid[]
     */
    protected $associatedBids;
}