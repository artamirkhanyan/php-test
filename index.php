<?php
    /*
        Company requirements array example 
        [
            'company_name' => [
                ['all parameters in this array are required'],
                ['at least one parameter is required, if type of parameter is array then all parameters in that array are required']
            ]
        ]
    */

    $companyRequirements = [
        'company_A' => [
            ['property insurance'],
            ['apartment', 'house']
        ],
        'company_B' => [
            ['driver license', 'car insurance'], 
            ['5  door car', '4 door car']
        ],
        'company_C' => [
            ['social security number', 'work permit'], 
            []
        ],
        'company_D' => [
            [], 
            ['apartment', 'flat', 'house']
        ],
        'company_E' => [
            ['driver license'], 
            ['2 door car', '3 door car', '4 door car']
        ],
        'company_F' => [
            [], 
            ['scooter', 'bike', ['motorcycle', 'driver license', 'motorcycle insurance']]
        ],
        'company_G' => [
            ['message qualification certificate', 'liability insurance'],
            []
        ],
        'company_H' => [
            [],
            ['storage place', 'garage']
        ],
        'company_J' => [[],[]],
        'company_K' => [
            ['paypal account'],
            []
        ]
    ];

    /*My requirements*/
    $myRequirements = ['bike', 'driver license'];
    $matchedCompanies = [];

    foreach($companyRequirements as $company => $requirements){
        if(sizeof(array_diff($requirements[0], $myRequirements)) > 0){
            /*at least one required parameter is missing*/
            $matchedCompanies[$company] = false;
        }
        else{
            $matchedCompanies[$company] = false;
            if(sizeof($requirements[1]) == 0){
                /*all required parameters matched, at least one parameter from second array matching*/
                $matchedCompanies[$company] = true;
            }
            else{
                /*checking if matching at least one parameter in second requirements array*/
                foreach($requirements[1] as $requirement){
                    if(!is_array($requirement)){
                        /*all parapeters are required here*/
                        if(in_array($requirement, $myRequirements)){
                            $matchedCompanies[$company] = true;
                            break;
                        }
                    }
                    else{
                        /*at least one required parameter is matching*/
                        if(sizeof(array_diff($requirement, $myRequirements)) == 0){
                            $matchedCompanies[$company] = true;
                            break;
                        }
                    }
                }
            }
        }
    }

echo '<pre>';
var_dump($matchedCompanies);


?>
