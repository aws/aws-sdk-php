<?php
namespace Aws\Build\Changelog;

/**
 * @internal
 */

class ChangelogBuilder
{

    private $newServiceFlag = false;
    private $dir;

    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    public function getDir()
    {
        return $this->dir;
    }

    public function putDir($dir)
    {
        $this->dir = $dir;
    }

    public function getNewServiceFlag()
    {
        return $this->newServiceFlag;
    }

    public function putNewServiceFlag($flag)
    {
        $this->newServiceFlag = $flag;
    }

    public function readChangelog()
    {
        $releaseDir = $this->dir . ".changes/nextrelease/";
        $changelogEntries = [];
        if (!is_dir($releaseDir) || !$dh = opendir($releaseDir)) {
            throw new \Exception("nextrelease directory doesn't exists or is not readable at location $releaseDir");
        } else {
            //Ignore any files starting with a (.) dot
            $files = preg_grep('/^([^.])/', scandir($releaseDir));
            if (empty($files)) {
                throw new \Exception("No release notes files found in $releaseDir folder");
            }
            foreach ($files as $file) {
                $str = file_get_contents($releaseDir . "/" . $file);
                $changelogEntries = array_merge($changelogEntries, $this->cleanJSON(json_decode($str)));
            }
            closedir($dh);
        }
        return $changelogEntries;
    }

    public function cleanJSON($arr)
    {
        if (empty($arr) || !is_array($arr)) {
            throw new \Exception("Invalid Input", 2);
        } else {
            $cleanedJSON = [];
            foreach ($arr as $x) {
                if ($x->type == "NEW_SERVICE") {
                    $this->newServiceFlag = true;
                }
                if ($x->type != "DOC_UPDATE") {
                    array_push($cleanedJSON, $x);
                }
            }
            return $cleanedJSON;
        }
    }

    public function createTag($changelogFile)
    {
        if (!file_exists($changelogFile)) {
            throw new \Exception("Changelog File Not Found", 2);
        }
        $lines = file($changelogFile);
        $TAG = explode(".", explode(" ", $lines[2])[1]);
        if ($TAG[0] == "next") {
            throw new \Exception("Untagged changes exits in CHANGELOG.md", 1);
        }
        if ($this->newServiceFlag) {
            //Minor Version Bump if a newservice is being released
            ++$TAG[1];
            $TAG[2] = 0;
            return implode(".", $TAG);
        } else {
            ++$TAG[2];
            return implode(".", $TAG);
        }
    }

    public function createChangelogJson($changelog, $tag, $changesFolder)
    {
        if ($changesFolder == "") {
            $changesFolder = $this->dir;
        }
        $fp = fopen($changesFolder . "/" . $tag, 'w');
        fwrite($fp, json_encode($changelog, JSON_PRETTY_PRINT));
        fclose($fp);
    }

    public function writeToChangelog($changelog, $changelogFile)
    {
        $newChangeLog = "## next release\n\n" . $changelog . "\n";
        $lines = file($changelogFile);
        $lines[2] = $newChangeLog . $lines[2];
        file_put_contents($changelogFile, $lines);
    }

    public function cleanNextReleaseFolder()
    {
        $nextReleaseDir = ".changes/nextrelease/";
        $files = preg_grep('/^([^.])/', scandir($nextReleaseDir));
        foreach ($files as $file) {
            if (is_file($nextReleaseDir . $file)) {
                unlink($nextReleaseDir . $file);
            }

        }
    }

    public function generateChangelogString($changelog)
    {
        usort($changelog, function ($a, $b) {
            return strcmp($a->category, $b->category);
        });
        $str = "";
        foreach ($changelog as $log) {
            $str .= "* `Aws\\" . $log->category . "` - " . $log->description . "\n";
        }
        return $str;
    }

    public function buildChangelog()
    {
        $dir = ".changes/";
        $changelogFile = "CHANGELOG.md";
        $newChangelog = $this->readChangelog();
        $TAG = $this->createTag($changelogFile);
        putenv("TAG=$TAG");
        echo "Tag for next release " . $TAG . "\n";
        $this->createChangelogJson($newChangelog, $TAG, "");
        $ChangelogUpdate = $this->generateChangelogString($newChangelog);
        echo "$ChangelogUpdate";
        $this->writeToChangelog($ChangelogUpdate, $changelogFile);
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
        $str = str_replace("$oldMessage", "$deletedFormat", $str);
        file_put_contents('src/data/endpoints.json', $str);
    }
}
