<?php
include 'EmployeeWage.php';
echo "Welcome to Employee Wage Problem" . "\n";

$wage = new EmployeeWage();

while (true) {
    echo "Enter 1 to add new Emp wage \nEnter 2 to print daily wage of company \nEnter 3 to print total wage of company" .
        "\nEnter 4 to print all company wage\nEnter 5 to exit\n";
    $userInput = readline();
    switch ($userInput) {
        case 1:
            $company = readline("Comapny Name : ");
            $wagePerHr = readline("Enter wage per hr : ");
            $maxDays = readline("Enter Max working days : ");
            $maxHrs = readline("Enter Max working hrs : ");
            $wage->addEmpWage($company, $wagePerHr, $maxDays, $maxHrs);
            break;
        case 2:
            $company = readline("Enter company name : ");
            $wage->dailyWageEmp($company);
            break;
        case 2:
            $company = readline("Enter company name : ");
            $wage->companyWage($company);
            break;
        case 3:
            $wage->showCompanyEmpWage();
            break;
        case 4:
            exit("Exit");
            break;
        default:
            echo "Invalid user input";
    }
}
