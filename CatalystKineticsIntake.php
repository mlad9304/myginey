<?php

require('vendor/autoload.php');

use setasign\Fpdi\Fpdi;

$pdf = new Fpdi();
$pageCount = $pdf->setSourceFile('templates/template1.pdf');


for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $tplIdx = $pdf->ImportPage($pageNo);
    $s = $pdf->getTemplatesize($tplIdx);

    $pdf->AddPage();

    $pdf->useTemplate($tplIdx);

    switch ($pageNo) {
        case 1:
            print_page_01();
            break;
        case 2:
            print_page_02();
            break;
        case 3:
            print_page_03();
            break;
        case 4:
            print_page_04();
            break;
    }

}

$pdfdoc = $pdf->Output("", "I");




function print_page_01() {
    global $pdf;

    $pdf->SetFont('Helvetica','',10.5);
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetXY(146, 65.5);
    $pdf->Write(0, !isset($_REQUEST['makingdate']) ? '' :  $_REQUEST['makingdate']);

    $pdf->SetXY(34, 79.2);
    $pdf->Write(0, !isset($_REQUEST['fullname']) ? '' : $_REQUEST['fullname']);

    $pdf->SetXY(138.5, 79);
    $pdf->Write(0, !isset($_REQUEST['igoby']) ? '' : $_REQUEST['igoby']);

    $pdf->SetXY(55, 88.1);
    $pdf->Write(0, !isset($_REQUEST['birthday']) ? '' : $_REQUEST['birthday']);

    $pdf->SetXY(110, 88.1);
    $pdf->Write(0, !isset($_REQUEST['age']) ? '' : $_REQUEST['age']);

    if(isset($_REQUEST['sex'])) {
      if($_REQUEST['sex'] == 'male')
          $pdf->Image('imgs/check.png', 153,87,2,2);   //Male
      if($_REQUEST['sex'] == 'female')
          $pdf->Image('imgs/check.png', 171.6,87.1,2,2);    //Female
    }


    $pdf->SetXY(43, 97);
    $pdf->Write(0, !isset($_REQUEST['homeaddress']) ? '' : $_REQUEST['homeaddress']);

    $pdf->SetXY(22, 106.3);
    $pdf->Write(0, !isset($_REQUEST['city']) ? '' : $_REQUEST['city']);

    $pdf->SetXY(108, 106.3);
    $pdf->Write(0, !isset($_REQUEST['provincestate']) ? '' : $_REQUEST['provincestate']);

    $pdf->SetXY(161.5, 106.3);
    $pdf->Write(0, !isset($_REQUEST['zipcode']) ? '' : $_REQUEST['zipcode']);

    $pdf->SetXY(43.5, 115.3);
    $pdf->Write(0, !isset($_REQUEST['primaryphone']) ? '' : $_REQUEST['primaryphone']);

    $pdf->SetXY(123, 115.3);
    $pdf->Write(0, !isset($_REQUEST['cellphone']) ? '' : $_REQUEST['cellphone']);

    $pdf->SetXY(26, 124.3);
    $pdf->Write(0, !isset($_REQUEST['email']) ? '' : $_REQUEST['email']);

    if(isset($_REQUEST['pleasespecify1']) && $_REQUEST['pleasespecify1'] == 'catalyst')
        $pdf->Image('imgs/check.png', 13.3,141.6,2,2);

    $pdf->SetXY(91, 142);
    $pdf->Write(0, !isset($_REQUEST['catalystkinetics']) ? '' : $_REQUEST['catalystkinetics']);

    if(isset($_REQUEST['pleasespecify2']) && $_REQUEST['pleasespecify2'] == 'practitioner')
        $pdf->Image('imgs/check.png', 13.3,148,2,2);
    $pdf->SetXY(102.5, 148);
    $pdf->Write(0, !isset($_REQUEST['practitionerdoctor']) ? '' : $_REQUEST['practitionerdoctor']);

    if(isset($_REQUEST['pleasespecify3']) && $_REQUEST['pleasespecify3'] == 'patient')
        $pdf->Image('imgs/check.png', 13.3,154.2,2,2);
    $pdf->SetXY(92.5, 154.2);
    $pdf->Write(0, !isset($_REQUEST['patientclient']) ? '' : $_REQUEST['patientclient']);

    if(isset($_REQUEST['pleasespecify4']) && $_REQUEST['pleasespecify4'] == 'searchengine')
        $pdf->Image('imgs/check.png', 13.3,160.2,2,2);
    $pdf->SetXY(123.5, 160.4);
    $pdf->Write(0, !isset($_REQUEST['searchenginesocialmedia']) ? '' : $_REQUEST['searchenginesocialmedia']);

    if(isset($_REQUEST['pleasespecify5']) && $_REQUEST['pleasespecify5'] == 'other')
        $pdf->Image('imgs/check.png', 13.3,166.6,2,2);
    $pdf->SetXY(60.7, 166.6);
    $pdf->Write(0, !isset($_REQUEST['otherspecify']) ? '' : $_REQUEST['otherspecify']);

    $pdf->SetXY(37, 176.5);
    $pdf->Write(0, !isset($_REQUEST['occupation']) ? '' : $_REQUEST['occupation']);

    $pdf->SetXY(127, 176.5);
    $pdf->Write(0, !isset($_REQUEST['workphone']) ? '' : $_REQUEST['workphone']);

    $pdf->SetXY(42.3, 185.5);
    $pdf->Write(0, !isset($_REQUEST['familydoctor']) ? '' : $_REQUEST['familydoctor']);

    $pdf->SetXY(132.5, 185.5);
    $pdf->Write(0, !isset($_REQUEST['phonenumber']) ? '' : $_REQUEST['phonenumber']);

    $pdf->SetXY(26, 195.2);
    $pdf->Write(0, !isset($_REQUEST['mspinput']) ? '' : $_REQUEST['mspinput']);
    if(isset($_REQUEST['medicalcoverage']) && $_REQUEST['medicalcoverage'] == 'yes')
        $pdf->Image('imgs/check.png', 163.7,194.4,2,2);
    if(isset($_REQUEST['medicalcoverage']) && $_REQUEST['medicalcoverage'] == 'no')
        $pdf->Image('imgs/check.png', 176.5,194.4,2,2);

    if(isset($_REQUEST['icbcwcbclaim']) && $_REQUEST['icbcwcbclaim'] == 'yes')
        $pdf->Image('imgs/check.png', 109.5,204,2,2);
    if(isset($_REQUEST['icbcwcbclaim']) && $_REQUEST['icbcwcbclaim'] == 'no')
        $pdf->Image('imgs/check.png', 122.4,204,2,2);
    $pdf->SetXY(147.4, 205.3);
    $pdf->Write(0, !isset($_REQUEST['claiminput']) ? '' : $_REQUEST['claiminput']);

    if(isset($_REQUEST['mvaworkplace']) && $_REQUEST['mvaworkplace'] == 'yes')
        $pdf->Image('imgs/check.png', 132.2,213.8,2,2);
    if(isset($_REQUEST['mvaworkplace']) && $_REQUEST['mvaworkplace'] == 'no')
        $pdf->Image('imgs/check.png', 144.9,213.8,2,2);

    if(isset($_REQUEST['currentlystudent']) && $_REQUEST['currentlystudent'] == 'yes')
        $pdf->Image('imgs/check.png', 87.1,225.1,2,2);
    if(isset($_REQUEST['currentlystudent']) && $_REQUEST['currentlystudent'] == 'no')
        $pdf->Image('imgs/check.png', 99.8,225.1,2,2);
    $pdf->SetXY(143.6, 226);
    $pdf->Write(0, !isset($_REQUEST['schoolgrade']) ? '' : $_REQUEST['schoolgrade']);

    $pdf->SetXY(43, 235.4);
    $pdf->Write(0, !isset($_REQUEST['parentsname']) ? '' : $_REQUEST['parentsname']);
    $pdf->SetXY(123.6, 235.4);
    $pdf->Write(0, !isset($_REQUEST['contactnumber']) ? '' : $_REQUEST['contactnumber']);

    $pdf->SetXY(72, 245);
    $pdf->Write(0, !isset($_REQUEST['emergencycontact']) ? '' : $_REQUEST['emergencycontact']);
    $pdf->SetXY(137, 245);
    $pdf->Write(0, !isset($_REQUEST['telephonenumber']) ? '' : $_REQUEST['telephonenumber']);


}
function print_page_02() {
    global $pdf;

    $pdf->SetFont('Helvetica','',10.5);
    $pdf->SetTextColor(0, 0, 0);

    if(isset($_REQUEST['checkpage2value']) && $_REQUEST['checkpage2value'] == 'yes')
        $pdf->Image('imgs/check.png', 35,241,4,4);
}
function print_page_03() {
    global $pdf;

    $pdf->SetFont('Helvetica','',10.5);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(54.5,62.5);
    $pdf->Write(0, !isset($_REQUEST['customersname']) ? '' : $_REQUEST['customersname']);

    if(isset($_REQUEST['credit_card_check']) && $_REQUEST['credit_card_check'] == 'visa')
        $pdf->Image('imgs/check.png', 98,85,4,4);
    if(isset($_REQUEST['credit_card_check']) && $_REQUEST['credit_card_check'] == 'master')
        $pdf->Image('imgs/check.png', 155.5,85,4,4);

    $pdf->SetXY(54.7,97.6);
    $pdf->Write(0, !isset($_REQUEST['credit_number1']) ? '' : $_REQUEST['credit_number1']);
    $pdf->SetXY(64.2,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number2']) ? '' : $_REQUEST['credit_number2']);
    $pdf->SetXY(73.7,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number3']) ? '' : $_REQUEST['credit_number3']);
    $pdf->SetXY(83.2,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number4']) ? '' : $_REQUEST['credit_number4']);
    $pdf->SetXY(92.7,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number5']) ? '' : $_REQUEST['credit_number5']);
    $pdf->SetXY(102.2,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number6']) ? '' : $_REQUEST['credit_number6']);
    $pdf->SetXY(111.9,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number7']) ? '' : $_REQUEST['credit_number7']);
    $pdf->SetXY(121.4,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number8']) ? '' : $_REQUEST['credit_number8']);
    $pdf->SetXY(130.9,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number9']) ? '' : $_REQUEST['credit_number9']);
    $pdf->SetXY(140.4,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number10']) ? '' : $_REQUEST['credit_number10']);
    $pdf->SetXY(149.9,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number11']) ? '' : $_REQUEST['credit_number11']);
    $pdf->SetXY(159.4,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number12']) ? '' : $_REQUEST['credit_number12']);
    $pdf->SetXY(168.9,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number13']) ? '' : $_REQUEST['credit_number13']);
    $pdf->SetXY(178.4,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number14']) ? '' : $_REQUEST['credit_number14']);
    $pdf->SetXY(187.9,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number15']) ? '' : $_REQUEST['credit_number15']);
    $pdf->SetXY(197.4,97.6);
    $pdf->Write(0,  !isset($_REQUEST['credit_number16']) ? '' : $_REQUEST['credit_number16']);

    $pdf->Image('imgs/erase_back.jpg', 53,102,40,6);

    $pdf->SetXY(60,105.5);
    $pdf->Write(0, !isset($_REQUEST['experation_months']) ? '' : $_REQUEST['experation_months']);
    $pdf->SetXY(70,105.5);
    $pdf->Write(0,!isset($_REQUEST['experation_years']) ? '' : $_REQUEST['experation_years']);
    $pdf->SetXY(139,105.5);
    $pdf->Write(0, !isset($_REQUEST['threedigitcvv']) ? '' : $_REQUEST['threedigitcvv']);

    $pdf->SetXY(55,127.7);
    $pdf->Write(0, !isset($_REQUEST['nameoncard']) ? '' : $_REQUEST['nameoncard']);

    $pdf->SetXY(55,133.2);
    $pdf->Write(0, !isset($_REQUEST['billingaddress']) ? '' : $_REQUEST['billingaddress']);

    $pdf->SetXY(55,138.7);
    $pdf->Write(0, !isset($_REQUEST['billingcity']) ? '' : $_REQUEST['billingcity']);

    $pdf->SetXY(55,144);
    $pdf->Write(0, !isset($_REQUEST['billingprovincestate']) ? '' : $_REQUEST['billingprovincestate']);

    $pdf->SetXY(159,144);
    $pdf->Write(0, !isset($_REQUEST['billingzippostalcode']) ? '' : $_REQUEST['billingzippostalcode']);

    $pdf->SetXY(55,149.3);
    $pdf->Write(0, !isset($_REQUEST['billingphone']) ? '' : $_REQUEST['billingphone']);

    $pdf->SetXY(55,154.6);
    $pdf->Write(0, !isset($_REQUEST['billingemailaddress']) ? '' : $_REQUEST['billingemailaddress']);

    $pdf->SetXY(50.4,211);
    $pdf->Write(0, !isset($_REQUEST['printname']) ? '' : $_REQUEST['printname']);

    $pdf->SetXY(139,211);
    $pdf->Write(0, !isset($_REQUEST['printname2']) ? '' : $_REQUEST['printname2']);

    $pdf->SetXY(50.4,226);
    $pdf->Write(0, !isset($_REQUEST['printdate']) ? '' : $_REQUEST['printdate']);

    $pdf->SetXY(139,226);
    $pdf->Write(0, !isset($_REQUEST['printdate2']) ? '' : $_REQUEST['printdate2']);
}
function print_page_04() {
    global $pdf;

    if(isset($_REQUEST['mycheck1']) && $_REQUEST['mycheck1'] == 'mycheckvalue1')
    $pdf->Image('imgs/check.png', 60.8,83,3,3);
    if(isset($_REQUEST['mycheck2']) && $_REQUEST['mycheck2'] == 'mycheckvalue2')
    $pdf->Image('imgs/check.png', 85,83,3,3);
    if(isset($_REQUEST['mycheck3']) && $_REQUEST['mycheck3'] == 'mycheckvalue3')
    $pdf->Image('imgs/check.png', 111.8,83,3,3);
    if(isset($_REQUEST['mycheck4']) && $_REQUEST['mycheck4'] == 'mycheckvalue4')
    $pdf->Image('imgs/check.png', 139.7,83,3,3);
    if(isset($_REQUEST['mycheck5']) && $_REQUEST['mycheck5'] == 'mycheckvalue5')
    $pdf->Image('imgs/check.png', 167.6,83,3,3);
    if(isset($_REQUEST['mycheck6']) && $_REQUEST['mycheck6'] == 'mycheckvalue6')
    $pdf->Image('imgs/check.png', 195.6,83,3,3);

    if(isset($_REQUEST['mycheck7']) && $_REQUEST['mycheck7'] == 'mycheckvalue7')
    $pdf->Image('imgs/check.png', 60.8,91.5,3,3);
    if(isset($_REQUEST['mycheck8']) && $_REQUEST['mycheck8'] == 'mycheckvalue8')
    $pdf->Image('imgs/check.png', 85,91.5,3,3);
    if(isset($_REQUEST['mycheck9']) && $_REQUEST['mycheck9'] == 'mycheckvalue9')
    $pdf->Image('imgs/check.png', 111.8,91.5,3,3);
    if(isset($_REQUEST['mycheck10']) && $_REQUEST['mycheck10'] == 'mycheckvalue10')
    $pdf->Image('imgs/check.png', 139.7,91.5,3,3);
    if(isset($_REQUEST['mycheck11']) && $_REQUEST['mycheck11'] == 'mycheckvalue11')
    $pdf->Image('imgs/check.png', 167.6,91.5,3,3);
    if(isset($_REQUEST['mycheck12']) && $_REQUEST['mycheck12'] == 'mycheckvalue12')
    $pdf->Image('imgs/check.png', 195.6,91.5,3,3);

    if(isset($_REQUEST['mycheck13']) && $_REQUEST['mycheck13'] == 'mycheckvalue13')
    $pdf->Image('imgs/check.png', 60.8,100.3,3,3);
    if(isset($_REQUEST['mycheck14']) && $_REQUEST['mycheck14'] == 'mycheckvalue14')
    $pdf->Image('imgs/check.png', 85,100.3,3,3);
    if(isset($_REQUEST['mycheck15']) && $_REQUEST['mycheck15'] == 'mycheckvalue15')
    $pdf->Image('imgs/check.png', 111.8,100.3,3,3);
    if(isset($_REQUEST['mycheck16']) && $_REQUEST['mycheck16'] == 'mycheckvalue16')
    $pdf->Image('imgs/check.png', 139.7,100.3,3,3);
    if(isset($_REQUEST['mycheck17']) && $_REQUEST['mycheck17'] == 'mycheckvalue17')
    $pdf->Image('imgs/check.png', 167.6,100.3,3,3);
    if(isset($_REQUEST['mycheck18']) && $_REQUEST['mycheck18'] == 'mycheckvalue18')
    $pdf->Image('templates/imgs/check.png', 195.6,100.3,3,3);
}

?>
