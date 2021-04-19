<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Local plugin for test task.
 *
 * @package local_testtask
 */

defined('MOODLE_INTERNAL') || exit(0);

require_once($CFG->libdir . "/externallib.php");

class local_testtask_external extends external_api 
{
    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_users_parameters () 
    {
        return new external_function_parameters([]);
    }

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_courses_parameters () 
    {
        return new external_function_parameters([]);
    }   

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_grades_parameters () 
    {
        return new external_function_parameters([]);
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_users_returns () 
    {
        return new external_multiple_structure(
            new external_single_structure(
                [
                    'id' => new external_value(PARAM_INT),
                    'username' => new external_value(PARAM_RAW),
                    'firstname' => new external_value(PARAM_RAW),
                    'lastname' => new external_value(PARAM_RAW),
                    'email' => new external_value(PARAM_RAW),
                ]
            )
        );
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_courses_returns () 
    {
        return new external_multiple_structure(
            new external_single_structure(
                [
                    'id' => new external_value(PARAM_INT),
                    'fullname' => new external_value(PARAM_RAW),
                    'shortname' => new external_value(PARAM_RAW),
                ]
            )
        );
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_grades_returns () 
    {
        return new external_multiple_structure(
            new external_single_structure(
                [
                    'uid' => new external_value(PARAM_INT),
                    'courseid' => new external_value(PARAM_INT),
                    'grade' => new external_value(PARAM_RAW),
                ]
            )
        );
    }
    
    public static function get_users ()
    {
        global $DB;

        return $DB->get_records('user');
    }

    public static function get_courses ()
    {
        global $DB;

        return $DB->get_records('course');
    }

    public static function get_grades ()
    {
        global $DB;

        return $DB->get_records_sql(
            "SELECT gg.id, gi.courseid, gg.userid as uid, gg.finalgrade as grade
            FROM {grade_grades} gg
            JOIN {grade_items} gi ON gi.id = gg.itemid 
            WHERE gi.itemtype = :type
            ORDER BY gg.userid
            ",
            ['type' => 'course']
        );
    }
}
