<?php
include('../infusionsoftentity.class.php');

class note extends InfusionSoftEntity {

    public $Accepted;
    public $ActionDate;
    public $ActionDescription;
    public $ActionType;
    public $CompletionDate;
    public $ContactId;
    public $CreatedBy;
    public $CreationDate;
    public $CreationNotes;
    public $EndDate;
    public $IsAppointment;
    public $LastUpdated;
    public $LastUpdatedBy;
    public $Location;
    public $ObjectType;
    public $OpportunityId;
    public $PopupDate;
    public $Priority;
    public $UserID;

    function __construct() {
        unset($this->DateCreated);//remove this property because affiliate table does not have it
    }

}

?>