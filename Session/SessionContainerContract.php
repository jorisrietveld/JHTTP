<?php
/**
 * Author: Joris Rietveld <jorisrietveld@gmail.com>
 * Created: 18-11-2016 19:54
 * Licence: GNU General Public licence version 3 <https://www.gnu.org/licenses/quick-guide-gplv3.html>
 */

namespace JHTTP\Session;

/**
 * Interface Session container.
 * You can implement this to create your own session storage.
 *
 * @package JHTTP\Session
 */
interface SessionContainerContract
{
    /**
     * Get the name of the container.
     *
     * @return string
     */
    public function getName() : string;

    /**
     * Initialize the container.
     *
     * @param array $array
     * @return mixed
     */
    public function initialize( array &$array );

    /**
     * Get the storage key from the container.
     *
     * @return string
     */
    public function getStorageKey() : string;

    /**
     * Clear all data from the container.
     * @return mixed
     */
    public function clear();
}