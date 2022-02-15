<?php
include 'EmpWageParentClass.php';
class EmployeeWage extends EmpWageParentClass
{
    public $IS_FULL_TIME = 1;
    public $IS_PART_TIME = 2;
    public $EMP_HRS;
    public $numOfCompany = 0;

    public $empWage;

    /**
     * initialize array
     */
    public function __construct()
    {
        $this->empWage = [];
    }

    /**
     * addEmpWage method is used to add employee wage of multiple companies
     * @param company, WAGE_PER_HR, MAX_WORKING_DAYS, MAX_HRS_IN_MONTH
     */
    public function addEmpWage($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH)
    {
        $companyWage = new EmpWageParentClass($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH);

        $this->empWage[$this->numOfCompany] = $this->wagesForWorkingHourAndDays($companyWage);
        $this->numOfCompany++;
    }

    /**
     * wagesForWorkingHoursAndDay method is used to calculate total salary
     * @param companyWage
     * @return totalSalary 
     */
    protected function wagesForWorkingHourAndDays($companyWage)
    {
        $TOTAL_WORKING_DAYS = 0;
        $TOTAL_EMP_HRS = 0;
        while ($TOTAL_WORKING_DAYS < $companyWage->MAX_WORKING_DAYS && $TOTAL_EMP_HRS < $companyWage->MAX_HRS_IN_MONTH) {
            $num = rand(0, 2);
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
            $TOTAL_EMP_HRS = $TOTAL_EMP_HRS + $EMP_HRS;
            $TOTAL_WORKING_DAYS++;
        }

        $TOTAL_SALARY = parent::$WAGE_PER_HR * $TOTAL_EMP_HRS;
        return "Total Employee wage for company " . parent::$company . " is : " . $TOTAL_SALARY . "\n";
    }

    /**
     * showCompanyEmpWage method is used to employee wage of multiple companies
     */
    public function showCompanyEmpWage()
    {
        for ($i = 0; $i < count($this->empWage); $i++) {
            echo $this->empWage[$i];
        }
    }
}
