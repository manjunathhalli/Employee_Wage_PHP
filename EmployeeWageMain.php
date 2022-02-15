<?php
include 'EmployeeWage.php';
echo "Welcome to Employee Wage Problem" . "\n";

$wage = new EmployeeWage();
$wage->addEmpWage("Big-Bazaar", 35, 43, 267);
$wage->addEmpWage("Home mart", 20, 45, 175);

$wage->showCompanyEmpWage();
