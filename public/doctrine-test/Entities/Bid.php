<?php
namespace Entities;
/**
 * @Entity @Table(name="Bids")
 * Enter description here ...
 * @author josterholt
 *
 */
class Bid extends \Doctrine_Node {
    /** 
     * @Id @Column(type="integer") @GeneratedValue 
     * @var string
     */
    protected $id;
    
    /** 
     * @Column(type="string") 
     * @var string
     */
    protected $title;
    
    /** @Column(type="string") */
    protected $subtype;
    
    /** 
     * @Column(type="string") 
     * @var string
     */
    protected $project_code;
    
    /** 
     * @Column(type="string")
     * @var string
     */
    protected $description;
    protected $contract_value;
    protected $contract_value_estimated;
    protected $conference;
    protected $conference_mandatory;
    protected $conference_location;
    protected $conference_date;
    protected $using_agency;
    protected $preferred_contact_method;
    protected $agency_type;
    protected $pdf;
    protected $bid_url;
    /**
     * @ManyToOne(targetEntity="Jurisdiction", inversedBy="associatedBids")
     */
    protected $city;
    protected $state;
    protected $agency_type_pk;
    protected $jur_pk;
    protected $inst_pk;
    protected $mod_date;
    protected $published;    
    protected $due_date;
    protected $pub_date;
    protected $create_date;
    protected $push_date;
    protected $award_date;
    protected $fiscal_year;
    protected $pushed_hourly;
    protected $pushed_daily;
    protected $pushed_weekly;    
    protected $em_only;
    protected $emn;
    protected $dgn;
    protected $den;
    protected $old_pk;
    
    public __construct() {

    }

    public function setTitle($param) {
        $this->title = $param;
    }

    public function getCity() {
        return $this->city;
    }
    
    public function getState() {
        
    }
}