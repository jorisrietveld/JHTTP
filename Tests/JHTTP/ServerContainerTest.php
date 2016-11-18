<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 18-11-2016 19:36
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Tests;


use JHTTP\ServerContainer;

class ServerContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testExtractHeadersFromServerArray()
    {
        $server = [
            'SOME_SERVER_VARIABLE' => 'value',
            'SOME_SERVER_VARIABLE2' => 'value',
            'ROOT' => 'value',
            'HTTP_CONTENT_TYPE' => 'text/html',
            'HTTP_CONTENT_LENGTH' => '0',
            'HTTP_ETAG' => 'asdf',
        ];

        $serverContainer = new ServerContainer( $server );

        $this->assertEquals( [
            'CONTENT_TYPE' => 'text/html',
            'CONTENT_LENGTH' => '0',
            'ETAG' => 'asdf',
        ], $serverContainer->getHeaders() );
    }
}