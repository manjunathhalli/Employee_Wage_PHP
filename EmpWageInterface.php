<?php
interface EmpWageInterface
{
    public function addEmpWage($company, $WAGE_PER_HR, $MAX_WORKING_DAYS, $MAX_HRS_IN_MONTH);
    public function showCompanyEmpWage();
}
