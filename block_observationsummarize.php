<?php

/**
 * @package   block_observationsummarize
 * @copyright 2019, alterego developer {@link https://alteregodeveloper.github.io}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(__FILE__).'/lib.php');

class block_observationsummarize extends block_base {
    public function init() {
        $this->title = get_string('observationsummarize', 'block_observationsummarize');
    }

    function get_content() {
        global $CFG, $OUTPUT;

        if($this->content !== NULL) {
            return $this->content;
        }

        $this->content = new stdClass;
        $this->content->footer = '';

        if (empty($this->instance)) {
            $this->content->text   = '';
            return $this->content;
        }

        $this->content->text  = '<a href="'.$CFG->wwwroot.'/blocks/observationsummarize/index.php?id='.$this->page->course->id.'"><img src="' . $CFG->wwwroot . '/blocks/observationsummarize/pix/icon.png" /> ' . get_string('observationsummarize', 'block_observationsummarize') . '</a>';

        return $this->content;
    }
}