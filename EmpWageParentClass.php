<?php
class EmpWageParentClass
{
    public static $company;
    public static $WAGE_PER_HR;
    public $MAX_WORKING_DAYS;
    public $MAX_HRS_IN_MONTH;

    /**
     * initialize instance variables
     */
    public function __construct($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH)
    {
        self::$company = $company;
        self::$WAGE_PER_HR = $WAGE_PER_HR;
        $this->MAX_WORKING_DAYS = $MAX_WORKING_DAYS;
        $this->MAX_HRS_IN_MONTH = $MAX_HRS_IN_MONTH;
    }
}
