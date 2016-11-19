<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 19-11-2016 02:38
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session\Storage\Handler;


use JHTTP\Session\Storage\NativeSessionStorage;

class NativeFileSessionHandler extends \JHTTP\Session\Storage\Handler\NativeSessionHandler
{
    public function __construct( string $savePath = NULL )
    {
        if ( $savePath === NULL )
        {
            $savePath = ini_get('session.save_path');
        }

        $baseDir = $savePath;

        if ( $count = substr_count( $savePath, ';'))
        {
            if ($count > 2)
            {
                throw new \InvalidArgumentException( 'Invalid argument $savePath \'' . $savePath . '\'' );
            }

            // characters after last ';' are the path
            $baseDir = ltrim(strrchr($savePath, ';'), ';');
        }

        if ($baseDir && !is_dir($baseDir) && !@mkdir($baseDir, 0777, true) && !is_dir($baseDir)) {
            throw new \RuntimeException(sprintf('Session Storage was not able to create directory "%s"', $baseDir));
        }

        ini_set('session.save_path', $savePath);
        ini_set('session.save_handler', 'files');
    }
}