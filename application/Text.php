<?php
/**
 * Fables de Phèdre
 *
 * Processing of blog messages
 *
 * @author    Michel Corne <mcorne@yahoo.com>
 * @copyright 2011-2013 Michel Corne
 * @license   http://www.opensource.org/licenses/gpl-3.0.html GNU GPL v3
 * @link      http://fables-de-phedre.blogspot.fr/
 */

require_once 'Blog.php';

class Text
{
    /**
     * The codex page number
     *
     * @var int
     */
    public $codexPageNumber = 0;

    /**
     * The images
     *
     * @var array
     */
    public $images;

    /**
     * Links to La Fontaine fables at wikisource.org
     *
     * @var array
     */
    public $laFontaine;

    /**
     * The previous chapter number
     *
     * @var int
     */
    public $prevChapter;

    /**
     * The previous line number
     *
     * @var int
     */
    public $prevLine;

    /**
     * The URLs of the blog messages/fables
     *
     * @var array
     */
    public $urls = array(
        0 => '/2011/09/prologue-1.html',
        1 => '/2011/09/le-loup-et-lagneau.html',
        2 => '/2011/09/les-grenouilles-qui-cherchaient-un-roi.html',
        3 => '/2011/09/le-geai-orgueilleux-et-le-paon.html',
        4 => '/2011/09/le-chien-qui-emporte-de-la-viande-par.html',
        5 => '/2011/09/la-vache-et-la-chevre-la-brebis-et-le.html',
        6 => '/2011/09/les-grenouilles-et-le-soleil.html',
        7 => '/2011/09/le-renard-et-le-masque-tragique.html',
        8 => '/2011/09/le-loup-et-la-grue.html',
        9 => '/2011/09/le-conseil-du-passereau-au-lievre.html',
        10 => '/2011/09/le-loup-et-le-renard-juges-par-le-singe.html',
        11 => '/2011/09/le-lion-et-lane-la-chasse.html',
        12 => '/2011/09/le-cerf-et-la-fontaine.html',
        13 => '/2011/09/le-renard-et-le-corbeau.html',
        14 => '/2011/09/le-cordonnier-devenu-medecin.html',
        15 => '/2011/09/lane-et-le-vieux-patre.html',
        16 => '/2011/09/la-brebis-le-cerf-et-le-loup.html',
        17 => '/2011/09/la-brebis-le-chien-et-le-loup.html',
        18 => '/2011/09/la-femme-en-train-daccoucher.html',
        19 => '/2011/09/la-chienne-qui-met-bas.html',
        20 => '/2011/09/les-chiens-affames.html',
        21 => '/2011/09/le-vieux-lion-le-sanglier-le-taureau-et.html',
        22 => '/2011/09/lhomme-et-la-belette.html',
        23 => '/2011/09/le-chien-fidele.html',
        24 => '/2011/09/la-grenouille-eclatee-et-le-buf.html',
        25 => '/2011/09/le-chien-et-le-crocodile.html',
        26 => '/2011/09/le-renard-et-la-cigogne.html',
        27 => '/2011/09/le-chien-le-tresor-et-le-vautour.html',
        28 => '/2011/09/le-renard-et-laigle.html',
        29 => '/2011/09/lane-qui-se-moque-du-sanglier.html',
        30 => '/2011/09/les-grenouilles-redoutant-un-combat-de.html',
        31 => '/2011/09/le-milan-et-les-colombes.html',
        32 => '/2011/09/prologue-2.html',
        33 => '/2011/09/le-jeune-taureau-le-lion-et-le.html',
        34 => '/2011/09/la-vieille-femme-et-la-jeune-fille.html',
        35 => '/2011/09/lhomme-mordu-par-le-chien-ou-esope.html',
        36 => '/2011/09/laigle-la-chatte-et-la-laie.html',
        37 => '/2011/09/tibere-et-lintendant.html',
        38 => '/2011/09/laigle-et-la-corneille.html',
        39 => '/2011/09/les-deux-mulets-et-les-voleurs.html',
        40 => '/2011/09/le-cerf-et-les-boeufs.html',
        41 => '/2011/09/epilogue-2.html',
        42 => '/2011/09/prologue-eutyche.html',
        43 => '/2011/09/la-vieille-femme-et-lamphore.html',
        44 => '/2011/09/la-panthere-et-les-bergers.html',
        45 => '/2011/09/esope-et-le-paysan.html',
        46 => '/2011/09/le-boucher-et-le-singe.html',
        47 => '/2011/09/esope-et-limpudent.html',
        48 => '/2011/09/la-mouche-et-la-mule.html',
        49 => '/2011/09/le-loup-et-le-chien.html',
        50 => '/2011/09/la-soeur-et-le-frere.html',
        51 => '/2011/09/socrate-et-ses-amis.html',
        52 => '/2011/09/la-credulite-et-lincredulite.html',
        53 => '/2011/09/leunuque-et-le-mechant.html',
        54 => '/2011/09/le-poulet-et-la-perle.html',
        55 => '/2011/09/les-abeilles-et-les-bourdons-juges-par.html',
        56 => '/2011/09/le-jeu-et-la-severite.html',
        57 => '/2011/09/le-chien-et-lagneau.html',
        58 => '/2011/09/la-cigale-et-le-hibou.html',
        59 => '/2011/09/les-arbres-sous-la-tutelle-des-dieux.html',
        60 => '/2011/09/le-paon-se-plaint-de-sa-voix-junon.html',
        61 => '/2011/09/esope-repond-un-bavard.html',
        62 => '/2011/09/lane-et-les-pretres-de-cybele.html',
        63 => '/2011/09/la-belette-et-les-rats.html',
        64 => '/2011/09/le-renard-et-le-raisin.html',
        65 => '/2011/09/le-cheval-et-le-sanglier.html',
        66 => '/2011/09/le-testament-explique-par-esope.html',
        67 => '/2011/09/le-combat-des-rats-et-des-belettes.html',
        68 => '/2011/09/phedre-1.html',
        69 => '/2011/09/le-vipere-et-la-lime.html',
        70 => '/2011/09/le-renard-et-le-bouc.html',
        71 => '/2011/09/les-vices-des-hommes.html',
        72 => '/2011/09/le-voleur-qui-pille-un-autel.html',
        73 => '/2011/09/la-richesse-est-nefaste.html',
        74 => '/2011/09/le-lion-roi.html',
        75 => '/2011/09/promethee.html',
        76 => '/2011/09/encore-promethee.html',
        77 => '/2011/09/la-barbe-des-chevres.html',
        78 => '/2011/09/le-sort-des-hommes.html',
        79 => '/2011/09/les-ambassadeurs-des-chiens-et-jupiter.html',
        80 => '/2011/09/le-serpent-la-misericorde-dangereuse.html',
        81 => '/2011/09/le-renard-et-le-dragon.html',
        82 => '/2011/09/phedre-2.html',
        83 => '/2011/09/le-naufrage-de-simonide.html',
        84 => '/2011/09/la-montagne-qui-accouche.html',
        85 => '/2011/09/la-fourmi-et-la-mouche.html',
        86 => '/2011/09/simonide-sauve-par-les-dieux.html',
        87 => '/2011/09/epilogue-eutyche.html',
        88 => '/2011/09/prologue-particulon.html',
        89 => '/2011/09/lenvie.html',
        90 => '/2011/09/le-roi-demetrius-et-le-poete-menandre.html',
        91 => '/2011/09/les-deux-soldats-et-le-voleur.html',
        92 => '/2011/09/le-chauve-et-la-mouche.html',
        93 => '/2011/09/lane-et-le-verrat.html',
        94 => '/2011/09/le-bouffon-et-le-paysan.html',
        95 => '/2011/09/epilogue-particulon.html',
        96 => '/2011/09/lhomme-chauve-et-lhomme-degarni.html',
        97 => '/2011/09/le-joueur-de-flute-impudent.html',
        98 => '/2011/09/le-temps.html',
        99 => '/2011/09/le-taureau-et-le-veau.html',
        100 => '/2011/09/le-chien-et-le-chasseur.html',
    );

    /**
     * The roman numbers
     *
     * @var array
     */
    public $romanNumbers = array(
        '0', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX',
        'X', 'XI', 'XII', 'XIII', 'XIV', 'XV', 'XVI', 'XVII', 'XVIII', 'XIX',
        'XX', 'XXI', 'XXII', 'XXIII', 'XXIV', 'XXV', 'XXVI', 'XXVII', 'XXVIII', 'XXIX',
        'XXX', 'XXXI', 'XXXII', 'XXXIII', 'XXXIV', 'XXXV', 'XXXVI', 'XXXVII', 'XXXVIII', 'XXXIX',
    );

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->images     = require __DIR__ . '/../data/images.php';
        $this->laFontaine = require __DIR__ . '/../data/la-fontaine.php';
    }

    /**
     * Checks line number between the Latin and French texts
     *
     * @param array $latin
     * @param array $french
     */
    public function checkLineNumbers($latin, $french)
    {
        array_keys($latin) == array_keys($french) or die('first numbers do not match');

        foreach(array_keys($latin) as $paragraphNumber) {
            count($latin[$paragraphNumber]) == count($french[$paragraphNumber]) or
            die('number count do not match in paragraph: ' . $paragraphNumber);

            foreach(array_keys($latin[$paragraphNumber]) as $lineIndex) {
                $latin[$paragraphNumber][$lineIndex]['number'] == $french[$paragraphNumber][$lineIndex]['number'] or
                die('number do not match in line: ' . $lineIndex);
            }
        }
    }

    /**
     * Checks the links to the codex
     *
     * @param array $latinChapter
     */
    public function checkLinksToCodex($latinChapter)
    {
        $paragraphs = array_merge(array(array($latinChapter['title'])), $latinChapter['lines']);

        foreach($paragraphs as $lines) {
            foreach($lines as $line) {
                if (preg_match('~-p. (\d+)-~i', $line['text'], $match)) {
                    ++$this->codexPageNumber == $match[1] or die('invalid codex page link: ' . $line['text']);
                }
            }
        }
    }

    /**
     * Fixes the punctuation
     *
     * @param string $content
     * @return string
     */
    public function fixPunctuation($content) {
        $content = preg_replace('~(«|—) ~', '$1&nbsp;', $content);
        $content = preg_replace('~ (»|\?|!|:)~', '&nbsp;$1', $content);

        return $content;
    }

    /**
     * Creates a line of the French text
     *
     * @param string $line
     * @return string
     */
    public function makeFrenchLine($line) {
        $line = array_map('trim', $line);
        $line = sprintf(
            '<span class="fp-line"><span class="fp-number">%s&nbsp;</span><span class="fp-text">%s</span></span>',
            $line['number'],
            $line['text']);

        return $line;
    }

    /**
     * Creates the HTML of the message
     *
     * @param string $latinTitle
     * @param string $frenchTitle
     * @param string $paragraphs
     * @param int $number
     * @return string
     */
    public function makeHtml($latinTitle, $frenchTitle, $paragraphs, $number)
    {
        $pattern =
'<!--
  Fables de Phèdre
  %s %s

  Generated %s

  @copyright %d Michel Corne
  @license   http://www.opensource.org/licenses/gpl-3.0.html GNU GPL v3
-->
<table class="fp-content">
<tr class="fp-first">
<td class="fp-left"><div class="fp-chapter"><a href="%s">Fable précédente</a></div>
<div class="fp-title"><span class="fp-number">Livre %s%s</span><span class="fp-text">%s</span></div>
</td>
<td class="fp-right"><a href="%s"><img class="fp-image" src="%s" /></a><div class="fp-chapter"><a href="%s">Fable suivante</a></div>
<div class="fp-title"><span class="fp-number">Liber %s%s</span><span class="fp-text notranslate">%s</span></div>
</td>
</tr>
%s
<tr class="fp-last">
<td class="fp-left"><div class="fp-chapter"><a href="%s">Fable précédente</a></div></td>
<td class="fp-right"><div class="fp-chapter"><a href="%s">Fable suivante</a></div></td>
</tr>
</table>
<div class="fp-footer">
<div class="fp-translator">%s</div>
%s
</div>';

        $image = isset($this->images[$number])? $this->images[$number] : $this->images['default'];

        $fableCount = count($this->urls);
        $nextChapter = ($number + 1) % $fableCount;
        $previousChapter = ($number - 1 + $fableCount) % $fableCount;

        $frenchTitle['number'] and $frenchTitle['number'] = ', Fable ' . $frenchTitle['number'];
        $latinTitle['number'] and $latinTitle['number'] = ', Fabula ' . $latinTitle['number'];

        return sprintf($pattern,
            $frenchTitle['text'], $frenchTitle['number'],
            date('c'), // generation date
            date('Y'), // copyright year
            $this->urls[$previousChapter],
            $frenchTitle['book'], $frenchTitle['number'], $frenchTitle['text'],
            $image[0], $image[1], $this->urls[$nextChapter],
            $latinTitle['book'], $latinTitle['number'], $this->makeLatinCorrections($latinTitle['text']),
            $paragraphs,
            $this->urls[$previousChapter], $this->urls[$nextChapter],
            $this->makeTranslatedByFootnote($frenchTitle['translated']),
            $this->makeLinkToLaFontaine($number));
    }

    /**
     * Makes corrections to a line of the Latin text
     *
     * @param string $line
     * @return string
     */
    public function makeLatinCorrections($line)
    {
        // two words or more in original, none in correction, replaces for ex (*#hæc omnia)
        $line = preg_replace('/\(\*#([OGSVAPR])\.((?:[a-zA-Z., ]|æ|œ|Æ|Œ|«|»|:)+)\)/',
            '<span class="fp-correction" title="$2 _c$1_"><span class="fp-no-difference">[...]</span></span>' .
            '<span class="fp-original" title="... _o$1_"><span class="fp-difference">$2</span></span>',
            $line);
        // two words or more in correction, none in original, originalor ex (hæc omnia#*)
        $line = preg_replace('/\(((?:[a-zA-Z., ]|æ|œ|Æ|Œ|«|»|:)+)#([OGSVAPR])\.\*\)/',
            '<span class="fp-correction" title="... _c$2_"><span class="fp-difference">$1</span></span>' .
            '<span class="fp-original" title="$1 _o$2_"><span class="fp-no-difference">[...]</span></span>',
            $line);
        // two words or more in one manuscript, one or more in the other, replaces for ex "(nos#suos non)"
        $line = preg_replace('/\(((?:[a-zA-Z., ]|æ|œ|Æ|Œ|«|»|:)+)#([OGSVAPR])\.((?:[a-zA-Z., ]|æ|œ|Æ|Œ|«|»|:)+)\)/',
            '<span class="fp-correction" title="$3 _c$2_"><span class="fp-difference">$1</span></span>' .
            '<span class="fp-original" title="$1 _o$2_"><span class="fp-difference">$3</span></span>',
            $line);

        // one word in original, none in correction, replaces for ex "*#ab"
        $line = preg_replace('/\*#([OGSVAPR])\.((?:[a-zA-Z]|æ|œ|Æ|Œ)+)/',
            '<span class="fp-correction" title="$2 _c$1_"><span class="fp-no-difference">[...]</span></span>' .
            '<span class="fp-original" title="... _o$1_"><span class="fp-difference">$2</span></span>',
            $line);
        // one word in correction, none in original, replaces for ex "ut#*"
        $line = preg_replace('/((?:[a-zA-Z]|æ|œ|Æ|Œ)+)#([OGSVAPR])\.\*/',
            '<span class="fp-correction" title="... _c$2_"><span class="fp-difference">$1</span></span>' .
            '<span class="fp-original" title="$1 _o$2_"><span class="fp-no-difference">[...]</span></span>',
            $line);
        // one word in each manuscript, replaces for ex "imple#comple"
        $line = preg_replace('/((?:[a-zA-Z]|æ|œ|Æ|Œ)+)#([OGSVAPR])\.((?:[a-zA-Z]|æ|œ|Æ|Œ)+)/',
            '<span class="fp-correction" title="$3 _c$2_"><span class="fp-difference">$1</span></span>' .
            '<span class="fp-original" title="$1 _o$2_"><span class="fp-difference">$3</span></span>',
            $line);

        strpos('$line', '#') and die('leftover correction in line: ' . $line);

        $line = str_replace('_cO_', " (orig. avec f. d'orth.)", $line);
        $line = str_replace('_cG_', " (orig. avec f. de gram.)", $line);
        $line = str_replace('_cS_', " (orig. avec err. de synt.)", $line);
        $line = str_replace('_cV_', " (orig. avec f. de voca.)", $line);
        $line = str_replace('_cA_', " (orig. avec var. orth.)", $line);
        $line = str_replace('_cP_', " (orig. avec f. de ponc.)", $line);
        $line = str_replace('_cR_', " (orig.)", $line);

        $line = str_replace('_oO_', " (f. d'orth. corr.)", $line);
        $line = str_replace('_oG_', " (f. de gram. corr.)", $line);
        $line = str_replace('_oS_', " (err. de synt. corr.)", $line);
        $line = str_replace('_oV_', " (f. de voca. corr.)", $line);
        $line = str_replace('_oA_', " (var. orth. corr.)", $line);
        $line = str_replace('_oP_', " (f. de ponc. corr.)", $line);
        $line = str_replace('_oR_', " (texte subst.)", $line);

        return $line;
    }

    /**
     * Creates a line of the Latin text
     *
     * @param string $line
     * @return string
     */
    public function makeLatinLine($line) {
        $line = array_map('trim', $line);
        $line = sprintf(
            '<span class="fp-line"><span class="fp-number">%s&nbsp;</span><span class="fp-text notranslate">%s</span></span>',
            $line['number'],
            $this->makeLatinCorrections($line['text']));

        return $line;
    }

    /**
     * Creates the links to the codex
     *
     * @param string $content
     * @return string
     */
    public function makeLinksToCodex($content)
    {
        $content = preg_replace_callback('~(-p. )([^\-]+)(-)~i', array($this, 'replaceLinkToCodex'), $content);

        return $content;
    }

    /**
     * Creates link to the La Fontaine fable
     *
     * @param int $number
     * @return string
     */
    public function makeLinkToLaFontaine($number)
    {
        if (! empty($this->laFontaine[$number])) {
            list($title, $url) = $this->laFontaine[$number];
            $link = sprintf('<div class="fp-la-fontaine">Lire la fable de La Fontaine : <a href="%s">%s</a></div>', $url, $title);
        } else {
            $link = null;
        }

        return $link;
    }

    /**
     * Makes a blog message/fable
     *
     * @param array $frenchChapter
     * @param array $latinChapter
     * @param int $number
     * @return string
     */
    public function makeMessage($frenchChapter, $latinChapter, $number)
    {
        $paragraphs = $this->makeParagraphs($latinChapter['lines'], $frenchChapter['lines']);
        $html = $this->makeHtml($latinChapter['title'], $frenchChapter['title'], $paragraphs, $number);

        $html = $this->makeLinksToCodex($html);

        // removes { ... }
        $html = preg_replace('~{[^}]*}~', '', $html);

        $html = $this->fixPunctuation($html);

        return $html;
    }

    /**
     * Makes all the blog messages/fables
     *
     * @param array $latin
     * @param array $french
     * @param array $numbers
     * @return array
     */
    public function makeMessages($latin, $french, $numbers = null)
    {
        $htmls = array();

        foreach($latin as $number => $latinChapter) {
            $this->checkLineNumbers($latinChapter['lines'], $french[$number]['lines']);
            $this->checkLinksToCodex($latinChapter);

            if (is_null($numbers) or in_array($number, $numbers)) {
                $htmls[$number] = $this->makeMessage($french[$number], $latinChapter, $number);
            }
        }

        return $htmls;
    }

    /**
     * Makes a paragraph of text
     *
     * @param array $paragraph
     * @param string $callback
     * @param string $class
     * @return string
     */
    public function makeParagraph($paragraph, $callback, $class)
    {
        $paragraph = array_map(array($this, $callback), $paragraph);
        $paragraph = sprintf("<td class=\"%s\"><span class=\"fp-paragraph\">%s</span></td>", $class, implode(' ', $paragraph));

        return $paragraph;
    }

    /**
     * Makes all the paragraphs of a text
     *
     * @param array $latin
     * @param array $french
     * @return string
     */
    public function makeParagraphs($latin, $french)
    {
        foreach(array_keys($latin) as $number) {
            $paragraphs[] = sprintf("<tr class=\"fp-middle\">\n%s\n%s\n</tr>",
                $this->makeParagraph($french[$number], 'makeFrenchLine', 'fp-left'),
                $this->makeParagraph($latin[$number], 'makeLatinLine', 'fp-right'));
        }

        $paragraphs = implode("\n", $paragraphs);

        return $paragraphs;
    }

    /**
     * Creates the translated by footnote
     *
     * @param string $translated
     * @return string
     */
    public function makeTranslatedByFootnote($translated)
    {
        if (empty($translated)) {
            $footnote = 'Traduit par M. E. Panckoucke, 1864';
        } else {
            $footnote = "Traduit par M. Corne, $translated";
        }

        return $footnote;
    }

    /**
     * Parses the book title
     *
     * @param string $line
     * @param string|int $prevNumber
     * @return array
     */
    public function parseBookTitle($line, $prevNumber)
    {
        if (preg_match('~Liber ([IVX]+)~', $line, $match)) {
            // this is a latin book number
            list($title, $number) = $match;

            $number == 'I' and $prevNumber === null or
            $number == 'II' and $prevNumber == 'I' or
            $number == 'III' and $prevNumber == 'II' or
            $number == 'IV' and $prevNumber == 'III' or
            die('bad book title: ' . $line);


        } else if (preg_match('~Livre (\d)~', $line, $match)) {
            // this is a french book number
            list($title, $number) = $match;

            $number == '1' and $prevNumber === null or
            $number == '2' and $prevNumber == '1' or
            $number == '3' and $prevNumber == '2' or
            $number == '4' and $prevNumber == '3' or
            die('bad book title: ' . $line);

        } else {
            die('cannot parse book title: ' . $line);
        }

        return array($number, $title);
    }

    /**
     * Parses a source file
     *
     * @param string $file
     * @return array
     */
    public function parseFile($file)
    {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) or die('cannot read file');

        $this->prevChapter = -1;
        $this->prevLine = 0;
        $isFirstLine = false;
        $firstLineNb = 0;
        $bookNumber = null;
        $index = -1;

        foreach($lines as $line) {
            $type = $line[0];
            $line = substr($line, 1);

            switch($type) {
                case '#': // this is a book number
                    list($bookNumber, $bookTitle) = $this->parseBookTitle($line, $bookNumber);
                    break;

                case '+': // this is a chapter number and title
                    $bookNumber or die('expecting book title instead of: ' . $line);
                    list($number, $text, $translated) = $this->parseTitle($line, $bookNumber);
                    $index++;
                    $chapters[$index]['title'] = array('number' => $number, 'text' => $text, 'book' => $bookNumber, 'translated' => $translated);
                    break;

                case '*': // this is the first line of a paragraph
                    $isFirstLine = true;
                    // break;

                case '-': // this is a line within a paragraph
                    isset($index) or die('expecting chapter instead of: ' . $line);
                    list($number, $text) = $this->parseLine($line);

                    if ($isFirstLine) {
                        $isFirstLine = false;
                        $firstLineNb = $number;
                    }

                    $firstLineNb or die('expecting paragraph first line instead of: ' . $line);
                    $chapters[$index]['lines'][$firstLineNb][$number] = array('number' => $number, 'text' => $text);
                    break;
            }
        }

        return $chapters;
    }

    /**
     * Parses the Latin and French texts
     *
     * @return array
     */
    public function parseFiles()
    {
        $latin = $this->parseFile(__DIR__ . '/../data/latin.txt');
        $french = $this->parseFile(__DIR__ . '/../data/francais.txt');

        array_keys($latin) == array_keys($french) or die('chapters indexes do not match');

        return array($latin, $french);
    }

    /**
     * Parses a line of text
     *
     * @param string $line
     * @return array
     */
    public function parseLine($line)
    {
        if (preg_match('~^(\d+) (.+)~', $line, $match)) {
            list(, $number, $text) = $match;
            $number < 1 and die('line number lower than 1: ' . $line);
            $number == ++$this->prevLine or die('not expecting line: ' . $line);

        } else {
            die('cannot parse line: ' . $line);
        }

        return array($number, $text);
    }

    /**
     * Parses the title
     *
     * @param string $line
     * @param string|int $bookNumber
     * @return array
     */
    public function parseTitle($line, $bookNumber)
    {
        @list($line, $translated) = explode('|', $line);
        $line = trim($line);
        $translated = trim($translated);

        if (preg_match('~^\(?(Prologus|Prologue)~', $line) or
            strpos($line, 'Prologus#R.Fedri Augusti liberti liber fabularum'))
        {
            // $this->prevChapter == -1 or die('not expecting prologue: ' . $line);
            $number = '';
            $this->prevChapter = 0;
            $text = $line;

        } else if (preg_match('~^\(?(Epilogus|Épilogue)~', $line)) {
            $number = '';
            $this->prevChapter = 0;
            $text = $line;

        } else if (preg_match('~^(\d+)\. (.+)~', $line, $match)) {
            // this is a french chapter
            // $this->prevChapter == -1 and die('expecting prologue instead of: ' . $line);
            list(, $number, $text) = $match;
            $number < 1 and die('chapter number lower than 1: ' . $line);
            $number > count($this->urls) and die('chapter number too high: ' . $line);

            if ($bookNumber == 4 and $number == 1) {
                // special fix as no prologue in this book
                $this->prevChapter = 0;
            }

            $number == ++$this->prevChapter or die('not expecting chapter: ' . $line);

        } else if (preg_match('~^([IVX]+)\. (.+)~', $line, $match)) {
            // this is a latin chapter
            // $this->prevChapter == -1 and die('expecting prologus instead of: ' . $line);
            list(, $number, $text) = $match;
            in_array($number, $this->romanNumbers) or die('chapter number out of range: ' . $line);

            if ($bookNumber == 'IV' and $number == 'I') {
                // special fix as no prologue in this book
                $this->prevChapter = 0;
            }

            $number == $this->romanNumbers[++$this->prevChapter] or die('not expecting chapter: ' . $line);

        } else {
            die('cannot parse chapter: ' . $line);
        }

        // resets line number
        $this->prevLine = 0;

        $text = mb_strtoupper($text, 'utf-8');

        return array($number, $text, $translated);
    }

    /**
     * Reads a file
     *
     * @param string $file The file name
     * @throws Exception
     * @return string      The file content
     */
    public function readFile($file)
    {
        if (! $content = @file_get_contents($file)) {
            throw new Exception("cannot read file: $file");
        }

        return $content;
    }

    /**
     * Removes the generated date from a docblock for comparison purposes
     *
     * @param string $html The HTML content of an fable
     * @return string      The HTML content without the generated date
     */
    public function removeGeneratedDate($html)
    {
        // removes the date in the fable being translated
        $html = preg_replace('~^ +<input id="rdr-translation-in-progress-date" type="hidden" value=".+?"/>$~m', '', $html);
        $html = preg_replace('~^\s*Generated.+?$~m', '', $html);
        $html = preg_replace('~^\s*@copyright.+?$~m', '', $html);

        return $html;
    }

    /**
     * Replaces links to the codex
     *
     * @param array $match
     * @return string
     */
    public function replaceLinkToCodex($match)
    {
        $format =
'<span class="fp-manuscript" title="Afficher le manuscrit (édition paléographique)"
>[<a target="fppithoeanus" href="http://www.archive.org/stream/lesfablesdephdr00robegoog#page/n%s/mode/1up">p.%s</a>]</span>';

        $link = sprintf($format, $match[2] + 63, $match[2]);

        return $link;
    }

    /**
     * Saves a fable in a blog message (publishes a fable)
     *
     * The fable is also saved in a file.
     * The blog message is published only if the HTML content of the fable has changed.
     *
     * @param string $html    The HTML content of the fable
     * @param Blog   $blog    The Blog object
     * @param int    $number  The fable number
     * @return boolean        True if the fable has changed and was saved in the blog, false otherwise
     */
    public function saveMessage($html, Blog $blog, $number)
    {
        $url = $this->urls[$number];
        $file = __DIR__ . "/../messages/$number-" . basename($url);
        $prevHtml = file_exists($file)? $this->readFile($file) : null;

        if ($this->removeGeneratedDate($html) != $this->removeGeneratedDate($prevHtml)) {
            // the fable is different from the currently saved version
            echo "$number ";

            // removes line breaks because Blogger replaces them with <br> for some reason which screws up the display
            // although messages are set to use HTML as it is and to use <br> for line feeds
            $content = str_replace("\n", ' ', $html);
            $blog->savePost($url, $content);
            $this->writeFile($file, $html);
            $isPublished = true;

        } else {
            $isPublished = false;
        }

        return $isPublished;
    }

    /**
     * Saves the fables in the blog (publishes the fables)
     *
     * @param array $htmls  The HTML contents of the fables
     * @param Blog  $blog   The BLog object
     * @return string       The result of the action to be displayed to the output
     */
    public function saveMessages($htmls, Blog $blog)
    {
        $publishedCount = 0;

        foreach($htmls as $number => $html) {
            $publishedCount += $this->saveMessage($html, $blog, $number);
        }

        if ($publishedCount == 0) {
            $result = 'No fable has changed, no fable was published.';
        } else if ($publishedCount == 1) {
            $result = "\n" . 'The fable has changed, the fable was published successfully.';
        } else {
            $result = "\n" . "The $publishedCount fables were published successfully.";
        }

        return $result;
    }

    /**
     * Saves the HTML content of a fable into a temporary file
     *
     * The fable is saved in messages/temp.html that is used for checking changes before commiting them to the blog.
     *
     * @param string $html   The HTML content of the fable
     * @param int    $number The fable number
     * @return string        The result of the action to be displayed to the output
     */
    public function saveTempMessage($html, $number)
    {
        $temp = 'messages/temp.html';
        $file = __DIR__ . "/../$temp";
        $prevHtml = file_exists($file)? $this->readFile($file) : null;

        if ($this->removeGeneratedDate($html) == $this->removeGeneratedDate($prevHtml)) {
            $result = "The fable is already up to date in $temp.";

        } else {
            $this->writeFile(__DIR__ . "/../$temp", $html);
            $result = "The fable was saved successfully in $temp.";
        }

        return $result;
    }

    /**
     * Saves the HTML content of a widget
     *
     * @param  string $html     The HTML content of the widget
     * @param  string $basename The file base name
     * @param  string $widget   The widget name
     * @return string           The result of the action to be displayed to the output
     */
    public function saveWidget($html, $basename, $widget)
    {
        $file = "widgets/$basename";
        $path = __DIR__ . "/../$file";
        $prevHtml = file_exists($path)? $this->readFile($path) : null;

        if ($this->removeGeneratedDate($html) == $this->removeGeneratedDate($prevHtml)) {
            $result[] = "The $widget is already up to date.";
            $result[] = "No changes were made to $file.";

        } else {
            $this->writeFile($path, $html);
            $result[] = "The $widget was updated successfully.";
            $result[] = "Please, COPY & PASTE the content of $file";
            $result[] = 'into the corresponding blog widget.';
        }

        return implode("\n", $result);
    }

    /**
     * Updates the HTML of the copyright widget with the current year
     *
     * The HTML content of the copyright will have to be loaded manually in the corresponding blog widget.
     *
     * @return string The copyright
     */
    public function updateCopyright()
    {
        $html = $this->readFile(__DIR__ . '/../widgets/copyright.html');
        $year = date('Y');

        return preg_replace('~<span style="white-space:nowrap">2011-\d+</span>~', "<span style=\"white-space:nowrap\">2009-$year</span>", $html);
    }

    /**
     * Updates the HTML of the introduction widget with the number of the last translated verse
     *
     * The HTML content of the introduction will have to be loaded manually in the corresponding blog widget.
     *
     * @param string $french
     * @return string The introduction
     */
    public function updateIntroduction($french)
    {
        foreach($french as $chapter) {
            if ($chapter['title']['translated']) {
                $translated[] = $chapter['title']['translated'];
            }
        }

        $count = count($translated);
        $percent = round($count / count($this->urls) * 100);
        $date = end($translated);

        $html = $this->readFile(__DIR__ . '/../widgets/introduction.html');
        $html = preg_replace('~\d+ premières fables~', "$count premières fables", $html);
        $html = preg_replace('~soit \d+% du texte au \d+/\d+/\d+~', "soit $percent% du texte au $date", $html);

        return $html;
    }

    /**
     * Writes into a file
     *
     * @param string $file    The file name
     * @param string $content The file content
     * @throws Exception
     */
    public function writeFile($file, $content)
    {
        if (! @file_put_contents($file, $content)) {
            throw new Exception("cannot write file: $file");
        }
    }
}