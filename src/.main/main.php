<?php


require '../../vendor/autoload.php';

use Aws\Sqs\SqsClient;

$client = new SqsClient([
    'region' => 'us-west-2',
    'version' => 'latest'
]);

$result = $client->sendMessage([
    'QueueUrl' => 'https://sqs.us-west-2.amazonaws.com/385668748323/SamsQueue',
    'MessageBody' => 'testqueue'
]);

var_dump($result);

//$totalNum = 164;
//$leds = array_fill(0, $totalNum, 0);
//
// $firstStart = 0;
// $firstEnd = ($totalNum/4) - 1;  //40 start
// $secondStart =($totalNum/2) - 1; //81
// $secondEnd = $totalNum/4; //41 ****
// $thirdStart = $totalNum/2; //82
// $thirdEnd = (($totalNum/4)*3) - 1;  //122
// $fourthStart = $totalNum - 1; //163
// $fourthEnd = ($totalNum/4)*3; //123 ****
//
////        //first loop through here should set 48 and only 48
////        //start at 0, going up to 49
////        // starting at 0, going to 41
//while (in_array(0, $leds)) {
//    $litUpThisFrame = [];
//    for ($i = $firstStart; $i<=$firstEnd; $i++) {
//        if ($leds[$i]!==$leds[($i+1)]) {
//            $litUpThisFrame[] = $i;
//            $leds[$i]=$leds[($i+1)];
//        }
//    }
//    for ($i = $secondStart; $i>=$secondEnd; $i--) {
//        if ($leds[$i]!==$leds[($i-1)]) {
//            $litUpThisFrame[] = $i;
//            $leds[$i]=$leds[($i-1)];
//        }
//    }
//    for ($i = $thirdStart; $i<=$thirdEnd; $i++) {
//        if ($leds[$i]!==$leds[($i+1)]) {
//            $litUpThisFrame[] = $i;
//            $leds[$i]=$leds[($i+1)];
//        }
//    }
//    for ($i = $fourthStart; $i>=$fourthEnd; $i--) {
//        if ($leds[$i]!==$leds[($i-1)]) {
//            $litUpThisFrame[] = $i;
//            $leds[$i]=$leds[($i-1)];
//        }
//    }
//
//    if ($leds[$secondEnd] == 0){
//        $leds[$secondEnd] = 1;
//        $leds[$fourthEnd] = 1;
//        $litUpThisFrame[] = $secondEnd;
//        $litUpThisFrame[] = $fourthEnd;
//    }
//    print_r($litUpThisFrame);
//}

//      //start at 81, go down to 40
//      for (int i = secondStart+1; i>=firstEnd; i--) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i-1)];
//        }
//      for (int i = thirdStart; i<=fourthEnd; i++) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i+1)];
//        }
//      for (int i = fourthStart+1; i>=thirdEnd; i--) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i-1)];
//        }

//      //when there's no sound
//    } else {
//        for (int i = firstEnd; i>=firstStart; i--) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i-1)];
//        }
//      for (int i = secondEnd; i<=secondStart; i++) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i+1)];
//        }
//      for (int i = thirdEnd; i>=thirdStart; i--) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i-1)];
//        }
//      for (int i = fourthEnd; i<=fourthStart; i++) {
//            leds[segmentToLogical(i)]=leds[segmentToLogical(i+1)];
//        }
//      leds[firstStart] = color;
//      leds[secondStart] = color;
//      leds[thirdStart] = color;
//      leds[fourthStart] = color;
//    }
//  }
