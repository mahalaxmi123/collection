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
 * Strings for component 'theme_healthcert', language 'en', branch 'MOODLE_23_STABLE'
 *
 * @package   Healthcert theme
 * @copyright 2012 Bas Brands, www.basbrands.nl
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['pluginname'] = 'Healthcert';
$string['region-side-post'] = 'Right';
$string['region-side-pre'] = 'Left';
$string['fullscreen'] = 'Full screen';
$string['closefullscreen'] = 'Close full screen';

$string['choosereadme'] = '
	<div class="clearfix">
	<div class="theme_screenshot"><h2>Healthcert</h2>
	<img class=img-polaroid src="healthcert/pix/screenshot.jpg" />
';

$string['generalsettings'] = 'General Settings';
$string['logo'] = 'Logo';
$string['logodesc'] = 'Please upload your custom logo here if you want to add it to the header.';

$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'Whatever CSS rules you add to this textarea will be reflected in every page, making for easier customization of this theme.';

$string['footnote'] = 'Footnote';
$string['footnotedesc'] = 'Whatever you add to this textarea will be displayed in the footer throughout your Moodle site.';
$string['footerheading'] = 'Footer';
$string['footerlogo'] = 'Footer Logo';
$string['footerlogodesc'] = 'Please upload your custom footer logo here if you want to add it to the footer.
                       <br>The image should be 80px high and any reasonable width (minimum:205px) that suits.';
$string['readmore'] = 'Learn More';
//Slideshow
$string['numberofslides'] = 'Number of slides';
$string['numberofslides_desc'] = 'Number of slides on the slider.';
$string['slidecapbgcolor'] = 'Slide Caption Background colour';
$string['slidecapbgcolordesc'] = 'What colour the slide caption background should be.';
$string['slidecapcolor'] = 'Slide Caption text colour';
$string['slidecapcolordesc'] = 'What colour the slide caption text should be.';
$string['slidecaption'] = 'Slide caption';
$string['slidecaptiondefault'] = 'Bootstrap Based Slider - {$a->slideno}';
$string['slidecaptiondesc'] = 'Enter the caption text to use for the slide';

$string['slidedescription'] = 'Slide Description';
$string['slidedescriptiondefault'] = 'Bootstrap Based Slider - {$a->slideno}';
$string['slidedescriptiondesc'] = 'Enter the description text to use for the slide';

$string['slideimage'] = 'Slide image';
$string['slideimagedesc'] = 'The image should be 1366px X 385px.';
$string['slidedescbgcolor'] = 'Slide Description Background colour';
$string['slidedescbgcolordesc'] = 'What colour the slide description background should be.';
$string['slidedesccolor'] = 'Slide Description text colour';
$string['slidedesccolordesc'] = 'What colour the slide description text should be.';
$string['slideno'] = 'Slide {$a->slide}';
$string['slidenodesc'] = 'Enter the settings for slide {$a->slide}.';
$string['slideshowdesc'] = 'This creates a slide show of up to twelve slides for you to promote important elements of your site.  The show is responsive where image height is set according to screen size.If no image is selected for a slide, then the default_slide images in the pix folder is used.';
$string['slideshowheading'] = 'Slide show';
$string['slideshowheadingsub'] = 'Slide show for the front page';
$string['slideurl'] = 'Slide link';
$string['slideurldesc'] = 'Enter the target destination of the slide\'s image link';
$string['toggleslideshow'] = 'Slide show display';
$string['toggleslideshowdesc'] = 'Choose if you wish to hide or show the slide show.';


$string['fburl'] = 'Facebook';
$string['fburl_default'] = 'https://www.facebook.com/yourid';
$string['fburldesc'] = 'The Facebook url of your organisation.';

$string['twurl'] = 'Twitter';
$string['twurl_default'] = 'https://twitter.com/yourid';
$string['twurldesc'] = 'The Twiiter url of your organisation.';


$string['liurl'] = 'Linked In';
$string['liurl_default'] = 'https://www.linkedin.com/yourid';
$string['liurldesc'] = 'The Facebook url of your organisation.';


$string['gpurl'] = 'Google+';
$string['gpurl_default'] = 'https://www.google.com/+yourgoogleplusid';
$string['gpurldesc'] = 'The Google+ url of your organisation.';


$string['phoneno'] = 'Phone No';
$string['faxno'] = 'Fax No';
$string['address'] = 'Address';
$string['address2'] = 'Secondry Address';


$string['infolink'] = 'Info Links';
$string['infolinkdefault'] = 'Moodle community|https://moodle.org
Moodle free support|https://moodle.org/support
Moodle development|https://moodle.org/development
Moodle Docs|http://docs.moodle.org|Moodle Docs
Moodle.com|http://moodle.com/';
$string['infolink_desc'] = 'You can configure a custom Info Links here to be shown by themes. Each line consists of some menu text, a link URL (optional), a tooltip title (optional) and a language code or comma-separated list of codes (optional, for displaying the line to users of the specified language only), separated by pipe characters.For example:
<pre>
Moodle community|https://moodle.org
Moodle free support|https://moodle.org/support
Moodle development|https://moodle.org/development
Moodle Docs|http://docs.moodle.org|Moodle Docs
German Moodle Docs|http://docs.moodle.org/de|Documentation in German|de
Moodle.com|http://moodle.com/
</pre>';



$string['quicklink'] = 'Quick Links';
$string['quicklinkdefault'] = 'Moodle community|https://moodle.org
Moodle free support|https://moodle.org/support
Moodle development|https://moodle.org/development
Moodle Docs|http://docs.moodle.org|Moodle Docs
Moodle.com|http://moodle.com/';
$string['quicklink_desc'] = 'You can configure a custom Quick Links here to be shown by themes. Each line consists of some menu text, a link URL (optional), a tooltip title (optional) and a language code or comma-separated list of codes (optional, for displaying the line to users of the specified language only), separated by pipe characters.For example:
<pre>
Moodle community|https://moodle.org
Moodle free support|https://moodle.org/support
Moodle development|https://moodle.org/development
Moodle Docs|http://docs.moodle.org|Moodle Docs
German Moodle Docs|http://docs.moodle.org/de|Documentation in German|de
Moodle.com|http://moodle.com/
</pre>';
