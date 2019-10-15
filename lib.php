<?php

/**
 * @package   block_observationsummarize
 * @copyright 2019, alterego developer {@link https://alteregodeveloper.github.io}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function get_activities($courseid) {
    global $DB;

    $tests = $DB->get_records_menu('observationtest',array('course' => $courseid),null,'id,name');
    $labels = array();
    foreach($tests as $test) {
        array_push($labels,$test);
    }
    return $labels;
}

function get_results_avg($userid,$courseid) {
    global $DB;

    $query = 'SELECT mdl_observation_result.testid AS testid, ROUND(AVG(mdl_observation_result.result),2) AS average FROM mdl_observation_result JOIN mdl_observationtest ON mdl_observationtest.id = mdl_observation_result.testid WHERE mdl_observation_result.userid = ' . $userid . ' AND mdl_observationtest.course = ' . $courseid . ' GROUP BY mdl_observation_result.testid ORDER BY mdl_observation_result.testid';
    $results = $DB->get_records_sql($query);
    $values = array();
    foreach($results as $result) {
        array_push($values,$result->average);
    }
    return $values;
}