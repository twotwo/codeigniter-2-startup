<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * https://stackoverflow.com/questions/19724577/remove-codeigniter-label-wrapping-lang
 */
class MY_Lang extends CI_Lang {

    // You want to extend the line function
    function line($line = '', $value = '') {
        $line = ($line == '' OR ! isset($this->language[$line])) ? FALSE : $this->language[$line];

        // We can assume that if a value is passed it is intended to be inserted into the language string
        if($value) {
            $line = sprintf($line, $value);
        }

        // Because killer robots like unicorns!
        if ($line === FALSE) {
                log_message('error', 'Could not find the language line "'.$line.'"');
        }

        return $line;
    }
}