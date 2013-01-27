<?php
/**
 * Fables de Phèdre
 *
 * Command line to publish fables
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2011-2013 Michel Corne
 * @license   http://www.opensource.org/licenses/gpl-3.0.html GNU GPL v3
 * @link      http://fables-de-phedre.blogspot.fr/
 */

require_once 'Blog.php';
require_once 'Text.php';

define('OPTION_A', '-c -i');

/**
 * The command help
 */
$help =
'Usage:
-a              Options: %1$s.
-c              Update the copyright widget with the current year.
-i              Update the introduction widget with the number of
                the last translated fable.
-n number       Optional comma separated list of numbers of fables.
                By default, all fables are processed.
                Mandatory in logged off mode, only one number allowed.
-p password     Blogger account Password.
-u name         Blogger user/email/login name.

Notes:
In logged on mode, the fable HTML is created/updated in the data directory.
In logged off mode, the fable HTML is stored in data/temp.html.

Examples:
# publish fable(s) in Blogger
publish -u abc -p xyz

# publish fables 10 and 11 in Blogger
publish -u abc -p xyz -n 10,11

# create/update fable 10 in data/temp.html
publish -n 10
';

try {
    if (! $options = getopt("hacin:p:u:")) {
        throw new Exception('invalid or missing option(s)');
    }

    if (isset($options['h'])) {
        // displays the command usage (help)
        exit(sprintf($help, OPTION_A));
    }

    if (isset($options['a'])) {
        // this is the (combined) option A, adds the options
        preg_match_all('~\w~', (string)OPTION_A, $matches);
        $options += array_fill_keys($matches[0], false);
        unset($options['a']);
    }

    $text = new Text();
    list($latin, $french) = $text->parseFiles();

    if (isset($options['u']) and isset($options['p'])) {
        // this is the logged on mode, publishes one more fables in Blogger and saves them in local files
        $numbers = isset($options['n']) ? explode(',', $options['n']) : null;
        $htmls = $text->makeMessages($latin, $french, $numbers);
        $blog = new Blog($options['u'], $options['p'], 'Les fables de Phèdre');
        echo "\n" . $text->saveMessages($htmls, $blog) . "\n";

    } else if (isset($options['u']) or isset($options['p'])) {
        throw new Exception('missing user name or password');

    } else if (isset($options['n'])) {
        // this is the logged off mode, makes the fable HTML and saves the content in data/temp.html
        $number = $options['n'];

        if ($number < 0 or $number > 100) {
            throw new Exception('invalid fable number');
        }

        $html = $text->makeMessage($french[$number], $latin[$number], $number);
        echo "\n" . $text->saveTempMessage($html, $number) . "\n";
    }

    if (isset($options['c'])) {
        // updates the copyright
        $html = $text->updateCopyright();
        echo "\n" . $text->saveWidget($html, 'copyright.html', 'copyright') . "\n";
    }

    if (isset($options['i'])) {
        // updates the introduction with the number of the last translated verse
        $html = $text->updateIntroduction($french);
        echo "\n" . $text->saveWidget($html, 'introduction.html', 'introduction') . "\n";
    }

} catch(Exception $e) {
    echo($e->getMessage());
}
