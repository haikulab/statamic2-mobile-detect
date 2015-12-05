<?php

namespace Statamic\Addons\MobileDetect;

use Statamic\Extend\Tags;

/**
 * Addon
 * Mobile Device detection implementation for Statamic 2
 *
 * @author      Sergei Filippov
 *
 * @copyright   2015 Haiku Lab Limited
 * @link        https://github.com/haikulab
 * @license     http://www.haiku.co.nz
 * @ref         https://github.com/serbanghita/Mobile-Detect
 */

//require_once __DIR__ .'/vendor/autoload.php';

class MobileDetectTags extends Tags
{
    private $detector;

    public function init()
    {
        $this->detector = new \Mobile_Detect;
    }

    /**
     * The {{ mobile_detect }} tag
     *
     * @return string|array
     */
    public function index()
    {
        // return string value of device type, else return string "computer"
        return ($this->detector->isMobile() ? ($this->detector->isTablet() ? 'tablet' : 'phone') : 'computer');
    }

    /**
     * The {{ mobile_detect:version }} tag
     *
     * @return string|array
     */
    public function libraryVersion()
    {
        return $this->detector->getScriptVersion();
    }
}
