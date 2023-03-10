<?php 
namespace LeviZwannah\PhpMarkup\Facades;

use LeviZwannah\PhpMarkup\Html;

/**
 * @method static string html5() adds the `<!DOCTYPE html>`
 * @method static \LeviZwannah\PhpMarkup\Html component(string $name, \Closure $render) makes a
 * component with a given name and a given logic.
 * @method static string|void handle(string $name, array $arguments, bool $return = true) makes an html element with the given name and arguments.
 * @method static \LeviZwannah\PhpMarkup\Html removeComponent(string $name) removes a current component
 * @method static string a(...$params) makes a `a` element
 * @method static string abbr(...$params) makes a `abbr` element
 * @method static string address(...$params) makes a `address` element
 * @method static string area(...$params) makes a `area` element
 * @method static string article(...$params) makes a `article` element
 * @method static string aside(...$params) makes a `aside` element
 * @method static string audio(...$params) makes a `audio` element
 * @method static string b(...$params) makes a `b` element
 * @method static string bdi(...$params) makes a `bdi` element
 * @method static string bdo(...$params) makes a `bdo` element
 * @method static string blockquote(...$params) makes a `blockquote` element
 * @method static string body(...$params) makes a `body` element
 * @method static string br(...$params) makes a `br` element
 * @method static string button(...$params) makes a `button` element
 * @method static string canvas(...$params) makes a `canvas` element
 * @method static string caption(...$params) makes a `caption` element
 * @method static string cite(...$params) makes a `cite` element
 * @method static string code(...$params) makes a `code` element
 * @method static string col(...$params) makes a `col` element
 * @method static string colgroup(...$params) makes a `colgroup` element
 * @method static string command(...$params) makes a `command` element
 * @method static string datalist(...$params) makes a `datalist` element
 * @method static string dd(...$params) makes a `dd` element
 * @method static string del(...$params) makes a `del` element
 * @method static string details(...$params) makes a `details` element
 * @method static string dfn(...$params) makes a `dfn` element
 * @method static string div(...$params) makes a `div` element
 * @method static string dl(...$params) makes a `dl` element
 * @method static string dt(...$params) makes a `dt` element
 * @method static string em(...$params) makes a `em` element
 * @method static string embed(...$params) makes a `embed` element
 * @method static string fieldset(...$params) makes a `fieldset` element
 * @method static string figcaption(...$params) makes a `figcaption` element
 * @method static string figure(...$params) makes a `figure` element
 * @method static string footer(...$params) makes a `footer` element
 * @method static string form(...$params) makes a `form` element
 * @method static string h1(...$params) makes a `h1` element
 * @method static string h2(...$params) makes a `h2` element
 * @method static string h3(...$params) makes a `h3` element
 * @method static string h4(...$params) makes a `h4` element
 * @method static string h5(...$params) makes a `h5` element
 * @method static string h6(...$params) makes a `h6` element
 * @method static string header(...$params) makes a `header` element
 * @method static string hr(...$params) makes a `hr` element
 * @method static string html(...$params) makes a `html` element
 * @method static string i(...$params) makes a `i` element
 * @method static string iframe(...$params) makes a `iframe` element
 * @method static string img(...$params) makes a `img` element
 * @method static string input(...$params) makes a `input` element
 * @method static string ins(...$params) makes a `ins` element
 * @method static string kbd(...$params) makes a `kbd` element
 * @method static string keygen(...$params) makes a `keygen` element
 * @method static string label(...$params) makes a `label` element
 * @method static string legend(...$params) makes a `legend` element
 * @method static string li(...$params) makes a `li` element
 * @method static string main(...$params) makes a `main` element
 * @method static string map(...$params) makes a `map` element
 * @method static string mark(...$params) makes a `mark` element
 * @method static string menu(...$params) makes a `menu` element
 * @method static string meter(...$params) makes a `meter` element
 * @method static string nav(...$params) makes a `nav` element
 * @method static string object(...$params) makes a `object` element
 * @method static string ol(...$params) makes a `ol` element
 * @method static string optgroup(...$params) makes a `optgroup` element
 * @method static string option(...$params) makes a `option` element
 * @method static string output(...$params) makes a `output` element
 * @method static string p(...$params) makes a `p` element
 * @method static string param(...$params) makes a `param` element
 * @method static string pre(...$params) makes a `pre` element
 * @method static string progress(...$params) makes a `progress` element
 * @method static string q(...$params) makes a `q` element
 * @method static string rp(...$params) makes a `rp` element
 * @method static string rt(...$params) makes a `rt` element
 * @method static string ruby(...$params) makes a `ruby` element
 * @method static string s(...$params) makes a `s` element
 * @method static string samp(...$params) makes a `samp` element
 * @method static string section(...$params) makes a `section` element
 * @method static string select(...$params) makes a `select` element
 * @method static string small(...$params) makes a `small` element
 * @method static string source(...$params) makes a `source` element
 * @method static string span(...$params) makes a `span` element
 * @method static string strong(...$params) makes a `strong` element
 * @method static string sub(...$params) makes a `sub` element
 * @method static string summary(...$params) makes a `summary` element
 * @method static string sup(...$params) makes a `sup` element
 * @method static string table(...$params) makes a `table` element
 * @method static string tbody(...$params) makes a `tbody` element
 * @method static string td(...$params) makes a `td` element
 * @method static string textarea(...$params) makes a `textarea` element
 * @method static string tfoot(...$params) makes a `tfoot` element
 * @method static string th(...$params) makes a `th` element
 * @method static string thead(...$params) makes a `thead` element
 * @method static string time(...$params) makes a `time` element
 * @method static string tr(...$params) makes a `tr` element
 * @method static string track(...$params) makes a `track` element
 * @method static string u(...$params) makes a `u` element
 * @method static string ul(...$params) makes a `ul` element
 * @method static string var(...$params) makes a `var` element
 * @method static string video(...$params) makes a `video` element
 * @method static string wbr(...$params) makes a `wbr` element
 */
class Markup extends AbstractFacade{
    
   
    public static function accessor()
    {
        return Html::class;
    }
}
?>