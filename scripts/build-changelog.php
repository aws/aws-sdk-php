<?php

/*
* This script generates changelog based on the json files in "../.changes/nextrelease/"
* and generates a new TAG for the build.
*/

$dir = "../.changes/";
$newServiceFlag = False;


function readChangelog($dir){
	$dir = $GLOBALS['dir']."/nextrelease/";
	$CHANGELOG=[];
	if (is_dir($dir)){
	  if ($dh = opendir($dir)){
	  	//Ignore any files starting with a (.) dot 
	  	$files=preg_grep('/^([^.])/', scandir($dir));
	  	foreach ($files as $file ){
	      $str = file_get_contents($dir."/".$file);
	      $CHANGELOG= array_merge($CHANGELOG, cleanJSON(json_decode($str)) );
	    }
	    closedir($dh);
	  }
	}
	return $CHANGELOG;
}

function cleanJSON($arr){
	$cleanedJSON=[];
	foreach ($arr as $x){
		if ($x->type != "docupdate"){
			if ($x->type == "newservice"){
				$GLOBALS['newServiceFlag']=True;
			}
			array_push($cleanedJSON,$x);
		}
	}
	return $cleanedJSON;
}

function createTAG($newServiceFlag){
	$changelogFile = "../CHANGELOG.md";
	$lines = file($changelogFile);
	
	$TAG= explode(".",explode(" ",$lines[2])[1]);
	if ($newServiceFlag){
		//Minor Version Bump if a newservice is being released
		++$TAG[1];
		$TAG[2]=0;
		return implode(".",$TAG);
	}
	else{
		++$TAG[2];
		return implode(".",$TAG);
	}
}

function createChangelogJson($CHANGELOG,$TAG){
	$fp = fopen($GLOBALS['dir'].$TAG, 'w');
	fwrite($fp, json_encode($CHANGELOG,JSON_PRETTY_PRINT));
	fclose($fp);

}

function writeToChangelog($CHANGELOG){
	$NEWCHANGELOG="## next release \n\n".$CHANGELOG."\n";
	$file = "../CHANGELOG.md";
	$lines = file($file);
	$lines[2] = $NEWCHANGELOG.$lines[2];
	file_put_contents($file, $lines);
}

function cleanNextReleaseFolder(){
	$dir = $GLOBALS['dir']."/nextrelease/";
	$files=preg_grep('/^([^.])/', scandir($dir));
	foreach($files as $file){
		if(is_file($file))
		unlink($file);
	}
}

function cmp($a, $b)
{
    return strcmp($a->category, $b->category);
}

function generateChangelogString($CHANGELOG){
	usort($CHANGELOG, "cmp");
	$str="";
	foreach ($CHANGELOG as $log){
		$str.="* `Aws\\".$log->category."` - ".$log->description."\n";
	}
	return $str;
}

function buildChangelog(){

	$newChangelog=readChangelog($GLOBALS['dir']);
	$TAG=createTAG($GLOBALS['newServiceFlag']);

	echo "Tag for next release ".$TAG. "\n";

	createChangelogJson($newChangelog,$TAG);

	$ChangelogUpdate=generateChangelogString($newChangelog);
	echo "$ChangelogUpdate";

	writeToChangelog($ChangelogUpdate);	

	cleanNextReleaseFolder();	

}

function fixEndpointFile(){
	//Replace string in sdb as PHP doesnt support v2
	$oldMessage = '"sdb": {
	          "defaults": {
	            "protocols": [
	              "http",
	              "https"
	            ],
	            "signatureVersions": [
	              "v2"
	            ]
	          }';

	$deletedFormat = '"sdb": {
	          "defaults": {
	            "protocols": [
	              "http",
	              "https"
	            ]
	          }';
	$str=file_get_contents('../src/data/endpoints.json');
	$str=str_replace("$oldMessage", "$deletedFormat",$str);
	file_put_contents('../src/data/endpoints.json', $str);
}

buildChangelog();
fixEndpointFile();



