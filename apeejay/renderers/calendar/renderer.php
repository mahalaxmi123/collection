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
 * This file contains the renderers for the calendar within Moodle
 *
 * @copyright 2010 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @package calendar
 */
if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');    ///  It must be included from a Moodle page
}

require_once($CFG->dirroot.'/calendar/renderer.php');
/**
 * The primary renderer for the calendar.
 */ 
class theme_apeejay_core_calendar_renderer extends core_calendar_renderer {
    
    protected $viewmode;
    
    protected function get_viewmode(){
        if($this->viewmode){
            return $this->viewmode;
        }
        
        $viewmode = optional_param('viewmode', '', PARAM_ALPHA);
        $this->viewmode = $viewmode;
        
    }
    
    
    /**
     * Displays a month in detail
     *
     * @param calendar_information $calendar
     * @param moodle_url $returnurl the url to return to
     * @return string
     * viewmode added to check the url params for viewmode = tt
     */
    public function show_month_detailed(calendar_information $calendar, moodle_url $returnurl = null) {
        global $CFG;
        
        $viewmode = $this->get_viewmode();
        
        if (empty($returnurl)) {
            $returnurl = $this->page->url;
        }

// Get the calendar type we are using.
        $calendartype = \core_calendar\type_factory::get_calendar_instance();

// Store the display settings.
        $display = new stdClass;
        $display->thismonth = false;

// Get the specified date in the calendar type being used.
        $date = $calendartype->timestamp_to_date_array($calendar->time);
        $thisdate = $calendartype->timestamp_to_date_array(time());
        if ($date['mon'] == $thisdate['mon'] && $date['year'] == $thisdate['year']) {
            $display->thismonth = true;
            $date = $thisdate;
            $calendar->time = time();
        }

// Get Gregorian date for the start of the month.
        $gregoriandate = $calendartype->convert_to_gregorian($date['year'], $date['mon'], 1);
// Store the gregorian date values to be used later.
        list($gy, $gm, $gd, $gh, $gmin) = array($gregoriandate['year'], $gregoriandate['month'], $gregoriandate['day'],
            $gregoriandate['hour'], $gregoriandate['minute']);

// Get the starting week day for this month.
        $startwday = dayofweek(1, $date['mon'], $date['year']);
// Get the days in a week.
        $daynames = calendar_get_days();
// Store the number of days in a week.
        $numberofdaysinweek = $calendartype->get_num_weekdays();

        $display->minwday = calendar_get_starting_weekday();
        $display->maxwday = $display->minwday + ($numberofdaysinweek - 1);
        $display->maxdays = calendar_days_in_month($date['mon'], $date['year']);

// These are used for DB queries, so we want unixtime, so we need to use Gregorian dates.
        $display->tstart = make_timestamp($gy, $gm, $gd, $gh, $gmin, 0);
        $display->tend = $display->tstart + ($display->maxdays * DAYSECS) - 1;

// Align the starting weekday to fall in our display range
// This is simple, not foolproof.
        if ($startwday < $display->minwday) {
            $startwday += $numberofdaysinweek;
        }

// Get events from database
        // checks the viewmode and if it is tt , it will show tt events
        if ($viewmode == 'tt') {
            $events = calendar_get_events_timetable($display->tstart, $display->tend, $calendar->users, $calendar->groups, $calendar->courses);
        } else {
            $events = calendar_get_events($display->tstart, $display->tend, $calendar->users, $calendar->groups, $calendar->courses);
        }
        if (!empty($events)) {
            foreach ($events as $eventid => $event) {
                $event = new calendar_event($event);
                if (!empty($event->modulename)) {
                    $cm = get_coursemodule_from_instance($event->modulename, $event->instance);
                    if (!\core_availability\info_module::is_user_visible($cm, 0, false)) {
                        unset($events[$eventid]);
                    }
                }
            }
        }

// Extract information: events vs. time
        calendar_events_by_day($events, $date['mon'], $date['year'], $eventsbyday, $durationbyday, $typesbyday, $calendar->courses);

        $output = html_writer::start_tag('div', array('class' => 'header'));
        if (calendar_user_can_add_event($calendar->course)) {
            $output .= $this->add_event_button($calendar->course->id, 0, 0, 0, $calendar->time);
        }
        $output .= $this->course_filter_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= $this->event_filter_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= $this->event_type_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= html_writer::end_tag('div', array('class' => 'header'));
// Controls
        $output .= html_writer::tag('div', calendar_top_controls('month', array('id' => $calendar->courseid, 'time' => $calendar->time)), array('class' => 'controls'));

        $table = new html_table();
        $table->attributes = array('class' => 'calendarmonth calendartable');
        $table->summary = get_string('calendarheading', 'calendar', userdate($calendar->time, get_string('strftimemonthyear')));
        $table->data = array();

// Get the day names as the header.
        $header = array();
        for ($i = $display->minwday; $i <= $display->maxwday; ++$i) {
            $header[] = $daynames[$i % $numberofdaysinweek]['shortname'];
        }
        $table->head = $header;

// For the table display. $week is the row; $dayweek is the column.
        $week = 1;
        $dayweek = $startwday;

        $row = new html_table_row(array());

// Paddding (the first week may have blank days in the beginning)
        for ($i = $display->minwday; $i < $startwday; ++$i) {
            $cell = new html_table_cell('&nbsp;');
            $cell->attributes = array('class' => 'nottoday dayblank');
            $row->cells[] = $cell;
        }

// Now display all the calendar
        $weekend = CALENDAR_DEFAULT_WEEKEND;
        if (isset($CFG->calendar_weekend)) {
            $weekend = intval($CFG->calendar_weekend);
        }

        $daytime = strtotime('-1 day', $display->tstart);
        for ($day = 1; $day <= $display->maxdays; ++$day, ++$dayweek) {
            $daytime = strtotime('+1 day', $daytime);
            if ($dayweek > $display->maxwday) {
// We need to change week (table row)
                $table->data[] = $row;
                $row = new html_table_row(array());
                $dayweek = $display->minwday;
                ++$week;
            }

// Reset vars
            $cell = new html_table_cell();
            if ($viewmode == 'tt') { // day event link will have viewmode = tt 
                $dayhref = calendar_get_link_href(new moodle_url(CALENDAR_URL . 'view.php', array('view' => 'day', 'course' => $calendar->courseid, 'viewmode' => 'tt')), 0, 0, 0, $daytime);
            } else {
                $dayhref = calendar_get_link_href(new moodle_url(CALENDAR_URL . 'view.php', array('view' => 'day', 'course' => $calendar->courseid)), 0, 0, 0, $daytime);
            }
            $cellclasses = array();

            if ($weekend & (1 << ($dayweek % $numberofdaysinweek))) {
// Weekend. This is true no matter what the exact range is.
                $cellclasses[] = 'weekend';
            }

// Special visual fx if an event is defined
            if (isset($eventsbyday[$day])) {
                if (count($eventsbyday[$day]) == 1) {
                    $title = get_string('oneevent', 'calendar');
                } else {
                    $title = get_string('manyevents', 'calendar', count($eventsbyday[$day]));
                }
                $cell->text = html_writer::tag('div', html_writer::link($dayhref, $day, array('title' => $title)), array('class' => 'day'));
            } else {
                $cell->text = html_writer::tag('div', $day, array('class' => 'day'));
            }

// Special visual fx if an event spans many days
            $durationclass = false;
            if (isset($typesbyday[$day]['durationglobal'])) {
                $durationclass = 'duration_global';
            } else if (isset($typesbyday[$day]['durationcourse'])) {
                $durationclass = 'duration_course';
            } else if (isset($typesbyday[$day]['durationgroup'])) {
                $durationclass = 'duration_group';
            } else if (isset($typesbyday[$day]['durationuser'])) {
                $durationclass = 'duration_user';
            }
            if ($durationclass) {
                $cellclasses[] = 'duration';
                $cellclasses[] = $durationclass;
            }

// Special visual fx for today
            if ($display->thismonth && $day == $date['mday']) {
                $cellclasses[] = 'day today';
            } else {
                $cellclasses[] = 'day nottoday';
            }
            $cell->attributes = array('class' => join(' ', $cellclasses));

            if (isset($eventsbyday[$day])) {
                foreach ($eventsbyday[$day] as $eventindex) {
                    $cell->text .= html_writer::start_tag('ul', array('class' => 'events-new', 'title' => strip_tags($events[$eventindex]->description)));
// If event has a class set then add it to the event <li> tag
                    $attributes = array();
                    if (!empty($events[$eventindex]->class)) {
                        $attributes['class'] = $events[$eventindex]->class;
                    }
                    $dayhref->set_anchor('event_' . $events[$eventindex]->id);
                    $link = html_writer::link($dayhref, format_string($events[$eventindex]->name, true));
                    $cell->text .= html_writer::tag('li', $link, $attributes);
                }
                $cell->text .= html_writer::end_tag('ul');
            }
            if (isset($durationbyday[$day])) {
                $cell->text .= html_writer::start_tag('ul', array('class' => 'events-underway'));
                foreach ($durationbyday[$day] as $eventindex) {
                    $cell->text .= html_writer::tag('li', '[' . format_string($events[$eventindex]->name, true) . ']', array('class' => 'events-underway'));
                }
                $cell->text .= html_writer::end_tag('ul');
            }
            $row->cells[] = $cell;
        }

// Paddding (the last week may have blank days at the end)
        for ($i = $dayweek; $i <= $display->maxwday; ++$i) {
            $cell = new html_table_cell('&nbsp;');
            $cell->attributes = array('class' => 'nottoday dayblank');
            $row->cells[] = $cell;
        }
        $table->data[] = $row;
        $output .= html_writer::table($table);

        return $output;
    }

    /**
     * Displays upcoming events
     *
     * @param calendar_information $calendar
     * @param int $futuredays
     * @param int $maxevents
     * @return string
     */
    public function show_upcoming_events(calendar_information $calendar, $futuredays, $maxevents, moodle_url $returnurl = null) {

        if ($returnurl === null) {
            $returnurl = $this->page->url;
        }

        $events = calendar_get_upcoming($calendar->courses, $calendar->groups, $calendar->users, $futuredays, $maxevents);

        $output = html_writer::start_tag('div', array('class' => 'header'));
        if (calendar_user_can_add_event($calendar->course)) {
            $output .= $this->add_event_button($calendar->course->id);
        }
        $output .= $this->course_filter_selector($returnurl, get_string('upcomingeventsfor', 'calendar'));
        $output .= html_writer::end_tag('div');

        if ($events) {
            $output .= html_writer::start_tag('div', array('class' => 'eventlist'));
            foreach ($events as $event) {
// Convert to calendar_event object so that we transform description
// accordingly
                $event = new calendar_event($event);
                $event->calendarcourseid = $calendar->courseid;
                $output .= $this->event($event);
            }
            $output .= html_writer::end_tag('div');
        } else {
            $output .= $this->output->heading(get_string('noupcomingevents', 'calendar'));
        }

        return $output;
    }

    /**
     * 
     * Displays a month in detail for tt events
     *
     * @param calendar_information $calendar
     * @param moodle_url $returnurl the url to return to
     * @return string
     */
    public function show_tt_events(calendar_information $calendar, moodle_url $returnurl = null) {
        global $CFG;

        if (empty($returnurl)) {
            $returnurl = $this->page->url;
        }

// Get the calendar type we are using.
        $calendartype = \core_calendar\type_factory::get_calendar_instance();

// Store the display settings.
        $display = new stdClass;
        $display->thismonth = false;

// Get the specified date in the calendar type being used.
        $date = $calendartype->timestamp_to_date_array($calendar->time);
        $thisdate = $calendartype->timestamp_to_date_array(time());
        if ($date['mon'] == $thisdate['mon'] && $date['year'] == $thisdate['year']) {
            $display->thismonth = true;
            $date = $thisdate;
            $calendar->time = time();
        }

// Get Gregorian date for the start of the month.
        $gregoriandate = $calendartype->convert_to_gregorian($date['year'], $date['mon'], 1);
// Store the gregorian date values to be used later.
        list($gy, $gm, $gd, $gh, $gmin) = array($gregoriandate['year'], $gregoriandate['month'], $gregoriandate['day'],
            $gregoriandate['hour'], $gregoriandate['minute']);

// Get the starting week day for this month.
        $startwday = dayofweek(1, $date['mon'], $date['year']);
// Get the days in a week.
        $daynames = calendar_get_days();
// Store the number of days in a week.
        $numberofdaysinweek = $calendartype->get_num_weekdays();

        $display->minwday = calendar_get_starting_weekday();
        $display->maxwday = $display->minwday + ($numberofdaysinweek - 1);
        $display->maxdays = calendar_days_in_month($date['mon'], $date['year']);

// These are used for DB queries, so we want unixtime, so we need to use Gregorian dates.
        $display->tstart = make_timestamp($gy, $gm, $gd, $gh, $gmin, 0);
        $display->tend = $display->tstart + ($display->maxdays * DAYSECS) - 1;

// Align the starting weekday to fall in our display range
// This is simple, not foolproof.
        if ($startwday < $display->minwday) {
            $startwday += $numberofdaysinweek;
        }

// Get events from database
        $events = calendar_get_events_timetable($display->tstart, $display->tend, $calendar->users, $calendar->groups, $calendar->courses);
        if (!empty($events)) {
            foreach ($events as $eventid => $event) {
                $event = new calendar_event($event);
                if (!empty($event->modulename)) {
                    $cm = get_coursemodule_from_instance($event->modulename, $event->instance);
                    if (!\core_availability\info_module::is_user_visible($cm, 0, false)) {
                        unset($events[$eventid]);
                    }
                }
            }
        }

// Extract information: events vs. time
        calendar_events_by_day($events, $date['mon'], $date['year'], $eventsbyday, $durationbyday, $typesbyday, $calendar->courses);

        $output = html_writer::start_tag('div', array('class' => 'header'));
        if (calendar_user_can_add_event($calendar->course)) {
            $output .= $this->add_event_button($calendar->course->id, 0, 0, 0, $calendar->time);
        }
        $output .= $this->course_filter_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= html_writer::end_tag('div', array('class' => 'header'));
// Controls
        $output .= html_writer::tag('div', calendar_top_controls('month', array('id' => $calendar->courseid, 'time' => $calendar->time)), array('class' => 'controls'));

        $table = new html_table();
        $table->attributes = array('class' => 'calendarmonth calendartable');
        $table->summary = get_string('calendarheading', 'calendar', userdate($calendar->time, get_string('strftimemonthyear')));
        $table->data = array();

// Get the day names as the header.
        $header = array();
        for ($i = $display->minwday; $i <= $display->maxwday; ++$i) {
            $header[] = $daynames[$i % $numberofdaysinweek]['shortname'];
        }
        $table->head = $header;

// For the table display. $week is the row; $dayweek is the column.
        $week = 1;
        $dayweek = $startwday;

        $row = new html_table_row(array());

// Paddding (the first week may have blank days in the beginning)
        for ($i = $display->minwday; $i < $startwday; ++$i) {
            $cell = new html_table_cell('&nbsp;');
            $cell->attributes = array('class' => 'nottoday dayblank');
            $row->cells[] = $cell;
        }

// Now display all the calendar
        $weekend = CALENDAR_DEFAULT_WEEKEND;
        if (isset($CFG->calendar_weekend)) {
            $weekend = intval($CFG->calendar_weekend);
        }

        $daytime = strtotime('-1 day', $display->tstart);
        for ($day = 1; $day <= $display->maxdays; ++$day, ++$dayweek) {
            $daytime = strtotime('+1 day', $daytime);
            if ($dayweek > $display->maxwday) {
// We need to change week (table row)
                $table->data[] = $row;
                $row = new html_table_row(array());
                $dayweek = $display->minwday;
                ++$week;
            }

// Reset vars
            $cell = new html_table_cell();
            $dayhref = calendar_get_link_href(new moodle_url(CALENDAR_URL . 'view.php', array('view' => 'day', 'course' => $calendar->courseid)), 0, 0, 0, $daytime);

            $cellclasses = array();

            if ($weekend & (1 << ($dayweek % $numberofdaysinweek))) {
// Weekend. This is true no matter what the exact range is.
                $cellclasses[] = 'weekend';
            }

// Special visual fx if an event is defined
            if (isset($eventsbyday[$day])) {
                if (count($eventsbyday[$day]) == 1) {
                    $title = get_string('oneevent', 'calendar');
                } else {
                    $title = get_string('manyevents', 'calendar', count($eventsbyday[$day]));
                }
                $cell->text = html_writer::tag('div', html_writer::link($dayhref, $day, array('title' => $title)), array('class' => 'day'));
            } else {
                $cell->text = html_writer::tag('div', $day, array('class' => 'day'));
            }

// Special visual fx if an event spans many days
            $durationclass = false;
            if (isset($typesbyday[$day]['durationglobal'])) {
                $durationclass = 'duration_global';
            } else if (isset($typesbyday[$day]['durationcourse'])) {
                $durationclass = 'duration_course';
            } else if (isset($typesbyday[$day]['durationgroup'])) {
                $durationclass = 'duration_group';
            } else if (isset($typesbyday[$day]['durationuser'])) {
                $durationclass = 'duration_user';
            }
            if ($durationclass) {
                $cellclasses[] = 'duration';
                $cellclasses[] = $durationclass;
            }

// Special visual fx for today
            if ($display->thismonth && $day == $date['mday']) {
                $cellclasses[] = 'day today';
            } else {
                $cellclasses[] = 'day nottoday';
            }
            $cell->attributes = array('class' => join(' ', $cellclasses));

            if (isset($eventsbyday[$day])) {
                $cell->text .= html_writer::start_tag('ul', array('class' => 'events-new'));
                foreach ($eventsbyday[$day] as $eventindex) {
// If event has a class set then add it to the event <li> tag
                    $attributes = array();
                    if (!empty($events[$eventindex]->class)) {
                        $attributes['class'] = $events[$eventindex]->class;
                    }
                    $dayhref->set_anchor('event_' . $events[$eventindex]->id);
                    $link = html_writer::link($dayhref, format_string($events[$eventindex]->name, true));
                    $cell->text .= html_writer::tag('li', $link, $attributes);
                }
                $cell->text .= html_writer::end_tag('ul');
            }
            if (isset($durationbyday[$day])) {
                $cell->text .= html_writer::start_tag('ul', array('class' => 'events-underway'));
                foreach ($durationbyday[$day] as $eventindex) {
                    $cell->text .= html_writer::tag('li', '[' . format_string($events[$eventindex]->name, true) . ']', array('class' => 'events-underway'));
                }
                $cell->text .= html_writer::end_tag('ul');
            }
            $row->cells[] = $cell;
        }

// Paddding (the last week may have blank days at the end)
        for ($i = $dayweek; $i <= $display->maxwday; ++$i) {
            $cell = new html_table_cell('&nbsp;');
            $cell->attributes = array('class' => 'nottoday dayblank');
            $row->cells[] = $cell;
        }
        $table->data[] = $row;
        $output .= html_writer::table($table);

        return $output;
    }

    /**
     * Displays the calendar for a single day
     *
     * @param calendar_information $calendar
     * @return string
     */
    public function show_day(calendar_information $calendar, moodle_url $returnurl = null) {
        
        
        if ($returnurl === null) {
            $returnurl = $this->page->url;
        }

        $events = calendar_get_upcoming($calendar->courses, $calendar->groups, $calendar->users, 1, 100, $calendar->timestamp_today());

        $output = html_writer::start_tag('div', array('class' => 'header'));
        if (calendar_user_can_add_event($calendar->course)) {
            $output .= $this->add_event_button($calendar->course->id, 0, 0, 0, $calendar->time);
        }
        $output .= $this->course_filter_selector($returnurl, get_string('dayviewfor', 'calendar'));
        $output .= $this->event_filter_selector($returnurl, get_string('dayviewfor', 'calendar'));
        $output .= $this->event_type_selector($returnurl, get_string('dayviewfor', 'calendar'));
        $output .= html_writer::end_tag('div');
        // Controls
        $output .= html_writer::tag('div', calendar_top_controls('day', array('id' => $calendar->courseid, 'time' => $calendar->time)), array('class' => 'controls'));

        if (empty($events)) {
        // There is nothing to display today.
            $output .= $this->output->heading(get_string('daywithnoevents', 'calendar'), 3);
        } else {
            $output .= html_writer::start_tag('div', array('class' => 'eventlist'));
            $underway = array();
        // First, print details about events that start today
            foreach ($events as $event) {
                $event = new calendar_event($event);
                $event->calendarcourseid = $calendar->courseid;
                if ($event->timestart >= $calendar->timestamp_today() && $event->timestart <= $calendar->timestamp_tomorrow() - 1) {  // Print it now
                    $event->time = calendar_format_event_time($event, time(), null, false, $calendar->timestamp_today());
                    $output .= $this->event($event);
                } else {                                                                 // Save this for later
                    $underway[] = $event;
                }
            }

        // Then, show a list of all events that just span this day
            if (!empty($underway)) {
                $output .= $this->output->heading(get_string('spanningevents', 'calendar'), 3);
                foreach ($underway as $event) {
                    $event->time = calendar_format_event_time($event, time(), null, false, $calendar->timestamp_today());
                    $output .= $this->event($event);                    
                }
            }

            $output .= html_writer::end_tag('div');
        }

        return $output;
    }

    /**
     * Displays a month in detail
     *
     * @param calendar_information $calendar
     * @param moodle_url $returnurl the url to return to
     * @return string
     * viewmode added to check the url params for viewmode = tt
     */
    public function show_datelist_detailed(calendar_information $calendar, moodle_url $returnurl = null) {
        global $CFG, $DB, $COURSE;
        
        $viewmode = $this->get_viewmode();

        if (empty($returnurl)) {
            $returnurl = $this->page->url;
        }

        // Get the calendar type we are using.
        $calendartype = \core_calendar\type_factory::get_calendar_instance();

        // Store the display settings.
        $display = new stdClass;
        $display->thismonth = false;


        // Get the specified date in the calendar type being used.
        $date = $calendartype->timestamp_to_date_array($calendar->time);
        $thisdate = $calendartype->timestamp_to_date_array(time());
        if ($date['mon'] == $thisdate['mon'] && $date['year'] == $thisdate['year']) {
            $display->thismonth = true;
            $date = $thisdate;
            $calendar->time = time();
        }

        // Get Gregorian date for the start of the month.
        $gregoriandate = $calendartype->convert_to_gregorian($date['year'], $date['mon'], 1);
        // Store the gregorian date values to be used later.
        list($gy, $gm, $gd, $gh, $gmin) = array($gregoriandate['year'], $gregoriandate['month'], $gregoriandate['day'],
            $gregoriandate['hour'], $gregoriandate['minute']);

        // Get the starting week day for this month.
        $startwday = dayofweek(1, $date['mon'], $date['year']);
        // Get the days in a week.
        $daynames = calendar_get_days();
        // Store the number of days in a week.
        $numberofdaysinweek = $calendartype->get_num_weekdays();
        $display->maxwday = 1;
        $display->minwday = 1;
        $display->maxdays = calendar_days_in_month($date['mon'], $date['year']);

        // These are used for DB queries, so we want unixtime, so we need to use Gregorian dates.
        $display->tstart = make_timestamp($gy, $gm, $gd, $gh, $gmin, 0);
        $display->tend = $display->tstart + ($display->maxdays * DAYSECS) - 1;

        // Align the starting weekday to fall in our display range
        // This is simple, not foolproof.
        if ($startwday < $display->minwday) {
            $startwday += $numberofdaysinweek;
        }

        // Get events from database
        // checks the viewmode and if it is tt , it will show tt events
        if ($viewmode == 'tt') {
            $events = calendar_get_events_timetable($display->tstart, $display->tend, $calendar->users, $calendar->groups, $calendar->courses);
        } else {
            $events = calendar_get_events($display->tstart, $display->tend, $calendar->users, $calendar->groups, $calendar->courses);
        }
        $sessions = array();
        $display->minsession = $display->maxsession = 0;
        if (!empty($events)) {
            foreach ($events as $eventid => $event) {
                $date_time = getdate($event->timestart);
                $date = mktime(0, 0, 0, $date_time['mon'], $date_time['mday'], $date_time['year']);
                $sessions[$date][$eventid] = $event;
                if (count($sessions[$date]) > $display->maxsession) {
                    $display->maxsession = count($sessions[$date]);
                }

                $event = new calendar_event($event);
                if (!empty($event->modulename)) {
                    $cm = get_coursemodule_from_instance($event->modulename, $event->instance);
                    if (!\core_availability\info_module::is_user_visible($cm, 0, false)) {
                        unset($events[$eventid]);
                    }
                }
            }
        }

        if ($display->maxsession) {
            $display->minsession = 1;
        }
        // Extract information: events vs. time
        calendar_events_by_day($events, $date['mon'], $date['year'], $eventsbyday, $durationbyday, $typesbyday, $calendar->courses);

        $output = html_writer::start_tag('div', array('class' => 'header'));
        if (calendar_user_can_add_event($calendar->course)) {
            $output .= $this->add_event_button($calendar->course->id, 0, 0, 0, $calendar->time);
        }
        $output .= $this->course_filter_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= $this->event_filter_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= $this->event_type_selector($returnurl, get_string('detailedmonthviewfor', 'calendar'));
        $output .= html_writer::end_tag('div', array('class' => 'header'));
        // Controls
        $output .= html_writer::tag('div', calendar_top_controls('datelist', array('id' => $calendar->courseid, 'time' => $calendar->time)), array('class' => 'controls'));

        $table = new html_table();
        $table->attributes = array('class' => 'calendarmonth calendartable');
        $table->summary = get_string('calendarheading', 'calendar', userdate($calendar->time, get_string('strftimemonthyear')));
        $table->data = array();

        // Get the day names as the header.
        $header = $header_span = array();
        $header['dw'] = 'Sessions<br/>Date/week';
        $header_span['dw'] = 2;
        for ($i = $display->minsession; $i <= $display->maxsession; ++$i) {
            $header['s' . $i] = 'Session-' . $i;
            $header_span['s' . $i] = 1;
        }
        $table->head = $header;
        $table->headspan = $header_span;
        // For the table display. $week is the row; $dayweek is the column.
        $week = 1;
        $dayweek = $startwday;

        $row = new html_table_row(array());
        // Now display all the calendar
        $weekend = CALENDAR_DEFAULT_WEEKEND;
        if (isset($CFG->calendar_weekend)) {
            $weekend = intval($CFG->calendar_weekend);
        }
        $daytime = strtotime('-1 day', $display->tstart);
        for ($day = 1; $day <= $display->maxdays; ++$day, ++$dayweek) {
            $daytime = strtotime('+1 day', $daytime);
            if ($dayweek > $display->maxwday) {
                // We need to change week (table row)
                $table->data[] = $row;
                $row = new html_table_row(array());
                $dayweek = $display->minwday;
                ++$week;
            }

            // Reset vars
            $cell = new html_table_cell();
            if ($viewmode == 'tt') {
                $dayhref = calendar_get_link_href(new moodle_url(CALENDAR_URL . 'view.php', array('view' => 'day', 'course' => $calendar->courseid, 'viewmode' => 'tt')), 0, 0, 0, $daytime);
            } else {
                $dayhref = calendar_get_link_href(new moodle_url(CALENDAR_URL . 'view.php', array('view' => 'day', 'course' => $calendar->courseid)), 0, 0, 0, $daytime);
            }
            $cellclasses = array();

            if ($weekend & (1 << ($dayweek % $numberofdaysinweek))) {
                // Weekend. This is true no matter what the exact range is.
                $cellclasses[] = 'weekend';
            }
            $cell->text = html_writer::tag('div', $day, array('class' => 'day'));

            $row->cells[] = $cell;

            $cell = new html_table_cell();
            $cell->attributes = array('class' => 'wday');
            $cell->text = html_writer::tag('div', date('D', $daytime), array('class' => 'wdays'));
            $row->cells[] = $cell;
            for ($i = $display->minsession; $i <= $display->maxsession; $i++) {
                if (isset($sessions[$daytime])) {
                    foreach ($sessions[$daytime] as $eventid => $event) {
                        $courses = $DB->get_records('course', array('id' => $event->courseid));
                        foreach ($courses as $value) {
                            $coursename = $value->fullname;
                        }
                        $cell = new html_table_cell();
                        $cell->text = html_writer::tag('div', $event->description . $coursename, array('class' => 'session-event'));
                        $row->cells[] = $cell;
                        $i++;
                    }
                    for (; $i <= $display->maxsession; $i++) {
                        $cell = new html_table_cell();
                        $cell->text = '&nbsp;';
                        $row->cells[] = $cell;
                    }
                } else {
                    $cell = new html_table_cell();
                    $cell->text = '&nbsp;';
                    $row->cells[] = $cell;
                }
            }
        }

        // Paddding (the last week may have blank days at the end)
        for ($i = $dayweek; $i <= $display->maxwday; ++$i) {
            $cell = new html_table_cell('&nbsp;');
            $cell->attributes = array('class' => 'nottoday dayblank');
            $row->cells[] = $cell;
        }
        $table->data[] = $row;
        $output .= html_writer::start_tag('div', array('class' => 'event-calender'));
        $output .= html_writer::table($table);
        $output .= html_writer::end_tag('div');


        return $output;
    }

    
    /**
     * @param moodle_url $returnurl The URL that the user should be taken too upon selecting an event mode.
     * @param string $label The label to use for the event view select.
     * @return string
     */
    protected function event_filter_selector(moodle_url $returnurl, $label = null) {
        global $DB, $CFG;
        $view = optional_param('view', '', PARAM_ALPHA);
        if (!isloggedin() or isguestuser()) { // checks if user is logged in or isguestuser
            return '';
        }
        $viewmodeoptions = array('month' => 'Month', 'day' => 'Day', 'upcoming' => 'Upcoming', 'datelist' => 'Datelist');
        $returnurl = new moodle_url($returnurl);
        $select = new single_select($returnurl, 'view', $viewmodeoptions, $view, null);
        $select->class = 'cal_courses_flt';
        $select->set_label('View:');
        return $this->output->render($select);
    }
    
    /*
     * 
     */
    protected function event_type_selector(moodle_url $returnurl, $label = null) {
        global $DB, $CFG;
        
        $viewmode = $this->get_viewmode();

        if (!isloggedin() or isguestuser()) { // checks if user is logged in or isguestuser
            return '';
        }
        $viewtype = array('all' => 'All', 'tt' => 'Time table');
        $returnurl = new moodle_url($returnurl);
        $select = new single_select($returnurl, 'viewmode', $viewtype, $viewmode, null);
        $select->class = 'cal_courses_flt';
        $select->set_label('View Type:');
        return $this->output->render($select);
    }
    
}
