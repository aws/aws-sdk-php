<?php
namespace Aws\Build\Changelog;


/**
 * @internal
 */
class ChangelogBuilder 
{
  
  public $newServiceFlag = False;


  public function readChangelog($dir)
  {
    $dir = $dir."nextrelease/";
    $changelogEntries = [];
    if ( !is_dir($dir) || !$dh = opendir($dir) ) {
        throw new \Exception("nextrelease directory doesn't exists or is not readable at location $dir");
    } else {
      //Ignore any files starting with a (.) dot 
      $files=preg_grep('/^([^.])/', scandir($dir));
      if ( empty($files) ) {
        throw new \Exception("No release notes files found in $dir folder");
      }
      foreach ( $files as $file ) {
        $str = file_get_contents($dir."/".$file);
        $changelogEntries= array_merge($changelogEntries, $this->cleanJSON(json_decode($str)));
      }
      closedir($dh);
    }
    return $changelogEntries;
  }

  public function cleanJSON($arr) 
  {
    if ( empty($arr) || !is_array($arr) ) {
      throw new \Exception("Invalid Input", 2);
    } else {
        $cleanedJSON=[];
        foreach ( $arr as $x ) {
          if ( $x->type == "NEW_SERVICE" ) {
              $this->newServiceFlag=True;
            }
          if ( $x->type != "DOC_UPDATE" ) {
            array_push($cleanedJSON,$x);
          }
        }
        return $cleanedJSON;
    }
  }

  public function createTAG($newServiceFlag,$changelogFile)
  {
    if ( !file_exists($changelogFile) ) {
      throw new \Exception("Changelog File Not Found", 2);
    }
    $lines = file($changelogFile);  
    $TAG = explode(".",explode(" ",$lines[2])[1]);
    if ( $TAG[0] == "next") {
      throw new \Exception("Untagged changes exits in CHANGELOG.md", 1);
    }
    if ( $newServiceFlag ) {
      //Minor Version Bump if a newservice is being released
      ++$TAG[1];
      $TAG[2] = 0;
      return implode(".",$TAG);
    } else {
      ++$TAG[2];
      return implode(".",$TAG);
    }
  }

  public function createChangelogJson($dir,$CHANGELOG,$TAG)
  {
    $fp = fopen($dir . "/" . $TAG, 'w');
    fwrite($fp, json_encode($CHANGELOG, JSON_PRETTY_PRINT));
    fclose($fp);
  }

  public function writeToChangelog($CHANGELOG,$changelogFile)
  {
    $NEWCHANGELOG = "## next release \n\n".$CHANGELOG."\n";
    $lines = file($changelogFile);
    $lines[2] = $NEWCHANGELOG.$lines[2];
    file_put_contents($changelogFile, $lines);
  }

  public function cleanNextReleaseFolder()
  {
    $dir = ".changes/nextrelease/";
    $files = preg_grep('/^([^.])/', scandir($dir));
    foreach( $files as $file ) {
      if( is_file($dir.$file) )
        unlink($dir.$file);
    }
  }

  public function generateChangelogString($CHANGELOG)
  {
    usort($CHANGELOG, function ($a, $b) {
      return strcmp($a->category, $b->category);
    });
    $str = "";
    foreach ( $CHANGELOG as $log ) {
      $str .= "* `Aws\\".$log->category."` - ".$log->description."\n";
    }
    return $str;
  }

  public function buildChangelog()
  {
    $dir = ".changes/";
    $changelogFile = "CHANGELOG.md";
    $newChangelog = $this->readChangelog($dir);
    $TAG = $this->createTAG($this->newServiceFlag,$changelogFile);
    putenv("TAG=$TAG");
    echo "Tag for next release ".$TAG. "\n";
    $this->createChangelogJson($dir,$newChangelog,$TAG);
    $ChangelogUpdate=$this->generateChangelogString($newChangelog);
    echo "$ChangelogUpdate";
    $this->writeToChangelog($ChangelogUpdate,$changelogFile);
  }

  public function fixEndpointFile()
  {
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
    $str = file_get_contents('src/data/endpoints.json');
    $str = str_replace("$oldMessage", "$deletedFormat",$str);
    file_put_contents('src/data/endpoints.json', $str);
  }
}
