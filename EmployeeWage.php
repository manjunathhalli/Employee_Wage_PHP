<?php
class EmployeeWage
{ public $IS_FULL_TIME = 1;
    public $IS_PART_TIME = 2;
    public $EMP_HRS;
    

    function employeeWageUsingSwitch($num) {
    switch ($num) {
            case 1:
                $EMP_HRS = 8;
                    break;
            case 2:
                $EMP_HRS = 4;
                    break;
            default:
                $EMP_HRS = 0;
        }
        return $EMP_HRS;
    }
}   

class EmpWageChild extends EmployeeWage {

    public $company;
    public $WAGE_PER_HR;
    public $MAX_WORKING_DAYS;
    public $MAX_HRS_IN_MONTH;

    function __construct($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH) {
        $this->company = $company;
        $this->WAGE_PER_HR = $WAGE_PER_HR;
        $this->MAX_WORKING_DAYS = $MAX_WORKING_DAYS;
        $this->MAX_HRS_IN_MONTH = $MAX_HRS_IN_MONTH;
    }

    function wagesForWorkingHourAndDays() {
        $TOTAL_WORKING_DAYS = 0;
        $TOTAL_EMP_HRS = 0;
        while ($TOTAL_WORKING_DAYS < $this->MAX_WORKING_DAYS && $TOTAL_EMP_HRS < $this->MAX_HRS_IN_MONTH) {
            $num = rand(0, 2);
            $EMP_HRS =parent:: employeeWageUsingSwitch($num);
            $TOTAL_EMP_HRS = $TOTAL_EMP_HRS + $EMP_HRS;
            
            $TOTAL_WORKING_DAYS++;
        }
        $TOTAL_SALARY = $this->WAGE_PER_HR * $TOTAL_EMP_HRS;
        echo "Total Employee wage for company " . $this->company . " is : " .$TOTAL_SALARY . "\n";
    }
}