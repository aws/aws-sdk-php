<?php

namespace Aws\Test\Build\Changelog;

use PHPUnit\Framework\TestCase;

class CurrentChangesTest extends TestCase
{
    public function testVerifyDotChangesFolder()
    {
        $files = glob(__DIR__ . '/../../../.changes/*');
        foreach ($files as $file) {
            $portions = explode('/', $file);
            $lastPortion = end($portions);
            if ($lastPortion === 'nextrelease') {
                if (!is_dir($file)) {
                    $this->fail('`.changes/nextrelease` must be a folder.');
                }
            } elseif (!preg_match('/3\.[0-9]+\.[0-9]+/', $lastPortion)) {
                $this->fail('Invalid file name `' . $lastPortion
                    . '` in `.changes` folder.');
            } elseif (json_decode(file_get_contents($file), true) === null) {
                $this->fail('Files in `.changes` must be valid JSON.');
            }
        }
    }

    public function testVerifyNextreleaseContents()
    {
        if (!is_dir(__DIR__ . '/../../../.changes/nextrelease/')) {
            return;
        }

        $files = glob(__DIR__ . '/../../../.changes/nextrelease/*');
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            if ($data === null) {
                $this->fail('Files in `.changes/nextrelease` must be'
                    .' valid JSON.');
            }
            if (count($data) !== 1) {
                $this->fail('More than one item in changelog document.');
            }

            foreach (['type', 'category', 'description'] as $key) {
                if (empty($data[0][$key])) {
                    $this->fail('Missing required key `' . $key
                        . '` in changelog document.');
                }
            }

            if (!in_array(
                $data[0]['type'],
                ['feature', 'api-change', 'enhancement', 'bugfix']
            )) {
                $this->fail('Invalid `type` provided in changelog document.');
            }
        }
    }
}
