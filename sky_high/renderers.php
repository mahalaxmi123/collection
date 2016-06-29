<?php

class theme_sky_high_core_renderer extends core_renderer {
}

include_once($CFG->dirroot . "/course/renderer.php");

class theme_sky_high_core_course_renderer extends core_course_renderer {

    /**
     * Returns HTML to display a course category as a part of a tree
     *
     * This is an internal function, to display a particular category and all its contents
     * use {@link core_course_renderer::course_category()}
     *
     * @param coursecat_helper $chelper various display options
     * @param coursecat $coursecat
     * @param int $depth depth of this category in the current tree
     * @return string
     */
    protected function coursecat_category(coursecat_helper $chelper, $coursecat, $depth) {
        // open category tag
        $classes = array('category');
        if (empty($coursecat->visible)) {
            $classes[] = 'dimmed_category';
        }
        if ($chelper->get_subcat_depth() > 0 && $depth >= $chelper->get_subcat_depth()) {
            // do not load content
            $categorycontent = '';
            $classes[] = 'notloaded';
            if ($coursecat->get_children_count() ||
                    ($chelper->get_show_courses() >= self::COURSECAT_SHOW_COURSES_COLLAPSED && $coursecat->get_courses_count())) {
                $classes[] = 'with_children';
                $classes[] = 'collapsed';
            }
        } else {
            // load category content
            $categorycontent = $this->coursecat_category_content($chelper, $coursecat, $depth);
            $classes[] = 'loaded';
            if (!empty($categorycontent)) {
                $classes[] = 'with_children';
            }
        }
        $content = html_writer::start_tag('div', array('class' => join(' ', $classes),
            'data-categoryid' => $coursecat->id,
            'data-depth' => $depth));

        // category name
        $categoryname = $coursecat->get_formatted_name();
		$buttondiv = '';
		if ($depth==1 && !empty($coursecat->visible))
		{
			$catimg = 'catimg/'.$coursecat->id;
			$catico = $this->output->pix_url($catimg, 'theme');
			$categoryimg = html_writer::empty_tag('img', array('src' => $catico, 'class' => 'catbutton'));
			$handle = fopen($catico, 'r');
			if( $handle !== false ) {
				$categoryname = $categoryimg.$categoryname;
				$buttondiv = 'button';
			}
			else {
				$buttondiv = 'info';
			}
		}
		else {
			$buttondiv = 'info';
		}
        $categoryname = html_writer::link(new moodle_url('/course/index.php',
                array('categoryid' => $coursecat->id)),
                $categoryname);
        /*if ($chelper->get_show_courses() == self::COURSECAT_SHOW_COURSES_COUNT
                && ($coursescount = $coursecat->get_courses_count())) {
            $categoryname .= html_writer::tag('span', ' ('. $coursescount.')',
                    array('title' => get_string('numberofcourses'), 'class' => 'numberofcourse'));
        }*/
        $content .= html_writer::start_tag('div', array('class' => $buttondiv));
        $content .= html_writer::tag(($depth > 1) ? 'h4' : 'h3', $categoryname, array('class' => 'name'));
        $content .= html_writer::end_tag('div'); // .info

        // add category content to the output
        $content .= html_writer::tag('div', $categorycontent, array('class' => 'content'));

        $content .= html_writer::end_tag('div'); // .category

        // Return the course category tree HTML
        return $content;
    }


}


