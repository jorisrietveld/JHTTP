<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 18-11-2016 12:54
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Tests;

use JHTTP\ParameterContainer;

class ParameterContainerTest extends \PHPUnit_Framework_TestCase
{
    public $testData = [
        'stringParameterName' => 'StringParameterValue',
        'arrayParameterName' => [
            'arrayParameterValue1',
            'arrayParameterValue2',
        ]
    ];

    public function testConstructor(  )
    {
        $this->testAll();
    }

    public function testAll(  )
    {
        $container = new ParameterContainer( $this->testData );

        $this->assertEquals( $this->testData, $container->all(), '->all( ) gets all get input' );
    }
}