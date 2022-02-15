<?php
include 'EmpWageParentClass.php';
include 'EmpWageInterface.php';
class EmployeeWage extends EmpWageParentClass implements EmpWageInterface
{
    const IS_FULL_TIME = 1;
    const IS_PART_TIME = 2;
    public $EMP_HRS;
    public $numOfCompany = 0;

    public $empWage;
    public $dailyEmpWage;

    /**
     * initialize array
     */
    public function __construct()
    {
        $this->empWage = [];
        $this->dailyEmpWage = [];
    }

    /**
     * addEmpWage method is used to add employee wage of multiple companies
     * @param company, WAGE_PER_HR, MAX_WORKING_DAYS, MAX_HRS_IN_MONTH
     */
    public function addEmpWage($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH)
    {
        $companyWage = new EmpWageParentClass($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH);

        $this->empWage[$company] = $this->wagesForWorkingHourAndDays($companyWage);
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
            $this->dailyEmpWage[$companyWage->company][$TOTAL_WORKING_DAYS] = parent::$WAGE_PER_HR * $EMP_HRS;

            $TOTAL_WORKING_DAYS++;
        }

        $TOTAL_SALARY = parent::$WAGE_PER_HR * $TOTAL_EMP_HRS;
        return "Total Employee wage for company " . $companyWage->company . " is : " . $TOTAL_SALARY . "\n";
    }

    /**
     * showCompanyEmpWage method is used to employee wage of multiple companies
     */
    public function showCompanyEmpWage()
    {
        foreach ($this->empWage as $company => $companyDetails) {
            echo $companyDetails;
        }
    }

    /**
     * companyWage method is used to print company wage
     * @param companyName 
     */
    public function companyWage($companyName)
    {
        foreach ($this->empWage as $company => $companyDetails) {
            if ($company == $companyName) {
                echo $companyDetails;
            }
        }
    }

    /**
     * dailyWageEmp method is used to print daily wage of emp in company
     * @param companyName
     */
    public function dailyWageEmp($companyName)
    {
        foreach ($this->dailyEmpWage as $key => $dailyWage) {
            if ($key == $companyName) {
                for ($i = 0; $i < count($dailyWage); $i++) {
                    // echo $dailyWage[$i] . " ";
                    echo "Wage for Day " . $i . " : " . $dailyWage[$i] . "\n";
                }
            }
        }
    }
}
