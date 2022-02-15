<?php
include 'EmployeeWage.php';
echo "Welcome to Employee Wage Problem"."\n";

$wage = new EmpWageChild("D-Mart",20,22,100);
$wage->wagesForWorkingHourAndDays();
$wage = new EmpWageChild("Star Home",15,26,120);
$wage->wagesForWorkingHourAndDays("D-Mart",20,22,100);
