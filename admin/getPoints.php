<?php

function getImages($val){
    switch($val){
        //personal
        case "It's OK":
            $point = "confirm.png";
            break;
      
        case "Not quite":
            $point = "doubt.png";
            break;
        case "It’s not OK":
            $point = "cancel.png";
            break;
            
        
        //religism
        case "No":
            $point = "confirm.png";
            break;
        case "Insignifiant":
            $point = "doubt.png";
            break;
        case "Cognitive position taking (passive)":
            $point = "doubt.png";
            break;
        case "Operational position statement (active)":
            $point = "cancel.png";
            break;
        case "Agitated person likely to cause disorders":
            $point = "cancel.png";
            break;
            
         //physical_state
        case "Unsatisfactory physical condition":
            $point = "cancel.png";
            break;
        case "Low physical condition":
            $point = "doubt.png";
            break;
        case "Satisfactory physical condition":
            $point = "confirm.png";
            break;
        case "Good to very good physical condition":
            $point = "confirm.png";
            break;
            
        //psychological_state
        case "Risk of a depressive state":
            $point = "cancel.png";
            break;
        case "Common psychological condition but moderately weak":
            $point = "doubt.png";
            break;
        case "Current and moderately good psychological state":
            $point = "confirm.png";
            break;
        case "Good to very good psychological condition":
            $point = "confirm.png";
            break;
            
        
        //alcohol
        case "Yes":
            $point = "cancel.png";
            break;
        case "Not significant":
            $point = "cancel.png";
            break;
        case "Appreciate without being dependent":
            $point = "doubt.png";
            break;
        case "Light dependence":
            $point = "confirm.png";
            break;
        case "Significant dependence":
            $point = "confirm.png";
            break;
            
        //integrity
        case "Honest person":
            $point = "cancel.png";
            break;
        case "He can grant himself freedoms":
            $point = "cancel.png";
            break;
        case "Risk of deviance":
            $point = "doubt.png";
            break;
        case "Fallacious integrity":
            $point = "confirm.png";
            break;
            
            
        //studies
        case "Insufficient preparation (studies or useful experience)":
            $point = "cancel.png";
            break;
        case "Gaps in current preparation":
            $point = "cancel.png";
            break;
        case "Sufficient preparation":
            $point = "doubt.png";
            break;
        case "Good preparation":
            $point = "confirm.png";
            break;
        case "Excellent preparation":
            $point = "confirm.png";
            break;
        //safety
        case "Proceeds no matter how with risk taking":
            $point = "cancel.png";
            break;
        case "Often violates safety instructions":
            $point = "cancel.png";
            break;            
        case "Works safely without specially caring for others":
            $point = "doubt.png";
            break;
        case "Works safely and provides for the safety of others":
            $point = "confirm.png";
            break;            
        case "Excellent security guarantor":
            $point = "confirm.png";
            break;
        //Quality
        case "Many things to complain and inadequate care":
            $point = "cancel.png";
            break;
        case "Care and unstable care, variable reliability":
            $point = "cancel.png";
            break;
        case "Work reasonably performed. Few remarks to make":
            $point = "doubt.png";
            break;
        case "Reliable work, we can trust him":
            $point = "confirm.png";
            break;
        case "Careful work of the best quality":
            $point = "confirm.png";
            break;
        //organization    
        case "Without order or method. Potentially dangerous":
            $point = "cancel.png";
            break;
        case "Order and method at the limit of the acceptable. Must be monitored":
            $point = "cancel.png";
            break;
        case "Orderly and methodical":
            $point = "doubt.png";
            break;
        case "Organization and exemplary work":
            $point = "confirm.png";
            break;
        case "Demonstrates remarkable organizational ability":
            $point = "confirm.png";
            break;
            
            
        //terms_of_work    
        case "Insufficient speed of intervention and reaction":
            $point = "cancel.png";
            break;
        case "Slowness at the limit of the acceptable":
            $point = "cancel.png";
            break;
        case "Reasonable work rate":
            $point = "doubt.png";
            break;
        case "Achieves above average speed":
            $point = "confirm.png";
            break;
        case "Excels in the use of time available":
            $point = "confirm.png";
            break;
        
        
       
        //responsibilities
         case "Assuming responsibility is the least of the worries":
            $point = "cancel.png";
            break;
        case "Does what he can, but it must be followed":
            $point = "cancel.png";
            break;
        case "In normal conditions it does what it takes":
            $point = "doubt.png";
            break;
        case "Reliable, assumes no need to monitor he/ she":
            $point = "confirm.png";
            break;
        case "Excellent autonomy and judicious steps":
            $point = "confirm.png";
            break;
            
         //initiative
        case "You have to be constantly behind to tell what to do":
            $point = "cancel.png";
            break;
        case "Limited motivation for initiative, must be stimulated":
            $point = "cancel.png";
            break;
        case "Does and manage well":
            $point = "doubt.png";
            break;
        case "Faced with unexpected situations he succeeds very well":
            $point = "confirm.png";
            break;
        case "Creative and innovative":
            $point = "confirm.png";
            break;
         //social_behavior
        case "At first it does not arrange with anyone":
            $point = "cancel.png";
            break;
        case "Behavior and social fingering at the limit of acceptable":
            $point = "cancel.png";
            break;
        case "Correct social behavior":
            $point = "doubt.png";
            break;
        case "Good ability for communication, easily integrates":
            $point = "confirm.png";
            break;
        case "Excellent communicator, everyone looking for it":
            $point = "confirm.png";
            break;
            
            
        //motivation
        case "The work related to this function is the least of its interests":
            $point = "cancel.png";
            break;
        case "Limited interest, risk of a short-term departure":
            $point = "cancel.png";
            break;
        case "Good motivation to invest in this function":
            $point = "doubt.png";
            break;
        case "Very motivated by this function":
            $point = "confirm.png";
            break;
        case "Investing in this function satisfies a real passion":
            $point = "confirm.png";
            break;
            
        //professional_availability
        case "Reluctant against any work outside the hours":
            $point = "cancel.png";
            break;
        case "Readily dissociates to participate after hours":
            $point = "cancel.png";
            break;
        case "Sometimes agrees to work outside of hours":
            $point = "doubt.png";
            break;
        case "Above average availability":
            $point = "confirm.png";
            break;
        case "We can always count on":
            $point = "confirm.png";
            break;
        //attendance_and_punctuality
        case "We can not count on":
            $point = "cancel.png";
            break;
        case "To rely on it is to take a risk":
            $point = "cancel.png";
            break;
        case "Is in the general average":
            $point = "doubt.png";
            break;
        case "Very reliable":
            $point = "confirm.png";
            break;
        case "If he is not there what has happened to him a big problem":
            $point = "confirm.png";
            break;
            
        //training
        case "Recalcitrant to show others":
            $point = "cancel.png";
            break;
        case "Is limited to showing the essentials and keeping":
            $point = "cancel.png";
            break;
        case "We can entrust him with the training of new collaborators":
            $point = "doubt.png";
            break;
        case "He easily transmits his/ her knowledge":
            $point = "confirm.png";
            break;
        case "Very developed sense to transmit the knowledge":
            $point = "confirm.png";
            break;
            
         //command
        case "Has no authority and he does it very badly":
            $point = "cancel.png";
            break;
        case "Does not succeed well in the role of influence":
            $point = "cancel.png";
            break;
        case "Usually manages to pass his/ her instructions":
            $point = "doubt.png";
            break;
        case "He is very good at influencing and exercising authority":
            $point = "confirm.png";
            break;
        case "Natural ability to command":
            $point = "confirm.png";
            break;
        
        default: 
            $point = "cancel.png";
            
        
    }
    return $point;
    
}
            
   // echo getImages("Insufficient speed of intervention and reaction");   
 
 
function getNumber($val){
    switch($val){
        
        case "do not selected":
            $point = 0;
            break;
        //Religia - 1,2
        case "No":
            $point = -1;
            break;
        case "Insignifiant":
            $point = -2;
            break;
        case "Cognitive position taking (passive)":
            $point = -3;
            break;
        case "Operational position statement (active)":
            $point = -4;
            break;
        case "Agitated person likely to cause disorders":
            $point = -5;
            break;
        
        
        //physical_state
        case "Unsatisfactory physical condition":
            $point = 1;
            break;
        case "Low physical condition":
            $point = 2;
            break;
        case "Satisfactory physical condition":
            $point = 3;
            break;
        case "Good to very good physical condition":
            $point = 4;
            break;
            
        //psychological_state
        case "Risk of a depressive state":
            $point = 1;
            break;
        case "Common psychological condition but moderately weak":
            $point = 2;
            break;
        case "Current and moderately good psychological state":
            $point = 3;
            break;
        case "Good to very good psychological condition":
            $point = 4;
            break;
            
        //alcohol - 3
        case "Yes":
            $point = 1;
            break;
        case "Not significant":
            $point = 2;
            break;
        case "Appreciate without being dependent":
            $point = 3;
            break;
        case "Light dependence":
            $point = 4;
            break;
        case "Significant dependence":
            $point = 5;
            break;
            
         //integrity 4
        case "Honest person":
            $point = 1;
            break;
        case "He can grant himself freedoms":
            $point = 2;
            break;
        case "Risk of deviance":
            $point = 3;
            break;
        case "Fallacious integrity":
            $point = 4;
            break;
        
        
        //Studies 5
        case "Insufficient preparation (studies or useful experience)":
            $point = 1;
            break;
        case "Gaps in current preparation":
            $point = 2;
            break;
        case "Sufficient preparation":
            $point = 3;
            break;
        case "Good preparation":
            $point = 4;
            break;
        case "Excellent preparation":
            $point = 5;
            break;
        //safety 6
        case "Proceeds no matter how with risk taking":
            $point = 1;
            break;
        case "Often violates safety instructions":
            $point = 2;
            break;            
        case "Works safely without specially caring for others":
            $point = 3;
            break;
        case "Works safely and provides for the safety of others":
            $point = 4;
            break;            
        case "Excellent security guarantor":
            $point = 5;
            break;  
        //Quality 7
        case "Many things to complain and inadequate care":
            $point = 1;
            break;
        case "Care and unstable care, variable reliability":
            $point = 2;
            break;
        case "Work reasonably performed. Few remarks to make":
            $point = 3;
            break;
        case "Reliable work, we can trust him":
            $point = 4;
            break;
        case "Careful work of the best quality":
            $point = 5;
            break;
        //organization 8
        case "Without order or method. Potentially dangerous":
            $point = 1;
            break;
        case "Order and method at the limit of the acceptable. Must be monitored":
            $point = 2;
            break;
        case "Orderly and methodical":
            $point = 3;
            break;
        case "Organization and exemplary work":
            $point = 4;
            break;
        case "Demonstrates remarkable organizational ability":
            $point = 5;
            break;
            
        //terms_of_work 9   
        case "Insufficient speed of intervention and reaction":
            $point = 1;
            break;
        case "Slowness at the limit of the acceptable":
            $point = 2;
            break;
        case "Reasonable work rate":
            $point = 3;
            break;
        case "Achieves above average speed":
            $point = 4;
            break;
        case "Excels in the use of time available":
            $point = 5;
            break;
        
        //responsibilities 10
        case "Assuming responsibility is the least of the worries":
            $point = 1;
            break;
        case "Does what he can, but it must be followed":
            $point = 2;
            break;
        case "In normal conditions it does what it takes":
            $point = 3;
            break;
        case "Reliable, assumes no need to monitor he/ she":
            $point = 4;
            break;
        case "Excellent autonomy and judicious steps":
            $point = 5;
            break;
            
        //initiative 11
        case "You have to be constantly behind to tell what to do":
            $point = 1;
            break;
        case "Limited motivation for initiative, must be stimulated":
            $point = 2;
            break;
        case "Does and manage well":
            $point = 3;
            break;
        case "Faced with unexpected situations he succeeds very well":
            $point = 4;
            break;
        case "Creative and innovative":
            $point = 5;
            break;
            
        //social_behavior  12
        case "At first it does not arrange with anyone":
            $point = 1;
            break;
        case "Behavior and social fingering at the limit of acceptable":
            $point = 2;
            break;
        case "Correct social behavior":
            $point = 3;
            break;
        case "Good ability for communication, easily integrates":
            $point = 4;
            break;
        case "Excellent communicator, everyone looking for it":
            $point = 5;
            break;
        //motivation 13
        case "The work related to this function is the least of its interests":
            $point = 1;
            break;
        case "Limited interest, risk of a short-term departure":
            $point = 2;
            break;
        case "Good motivation to invest in this function":
            $point = 3;
            break;
        case "Very motivated by this function":
            $point = 4;
            break;
        case "Investing in this function satisfies a real passion":
            $point = 5;
            break;
        //professional_availability 14
        case "Reluctant against any work outside the hours":
            $point = 1;
            break;
        case "Readily dissociates to participate after hours":
            $point = 2;
            break;
        case "Sometimes agrees to work outside of hours":
            $point = 3;
            break;
        case "Above average availability":
            $point = 4;
            break;
        case "We can always count on":
            $point = 5;
            break;
        //attendance_and_punctuality 15
        case "We can not count on":
            $point = 1;
            break;
        case "To rely on it is to take a risk":
            $point = 2;
            break;
        case "Is in the general average":
            $point = 3;
            break;
        case "Very reliable":
            $point = 4;
            break;
        case "If he is not there what has happened to him a big problem":
            $point = 5;
            break;
        //training 16
        case "Recalcitrant to show others":
            $point = 1;
            break;
        case "Is limited to showing the essentials and keeping":
            $point = 2;
            break;
        case "We can entrust him with the training of new collaborators":
            $point = 3;
            break;
        case "He easily transmits his/ her knowledge":
            $point = 4;
            break;
        case "Very developed sense to transmit the knowledge":
            $point = 5;
            break;
            
        //command 17
        case "Has no authority and he does it very badly":
            $point = 1;
            break;
        case "Does not succeed well in the role of influence":
            $point = 2;
            break;
        case "Usually manages to pass his/ her instructions":
            $point = 3;
            break;
        case "He is very good at influencing and exercising authority":
            $point = 4;
            break;
        case "Natural ability to command":
            $point = 5;
            break;
        
        default: 
            $point = "0";
    }
    return $point;
    
}

function getComments($value){
    switch($value){
        case "":
            $comment = "";
            break;
    }
}
?>
