<?php

// Convert a color into a html color code
function GetColor($str) {
$ColArray = array(
'aliceblue','#F0F8FF',
'antiquewhite','#FAEBD7',
'aqua','#00FFFF',
'aquamarine','#7FFFD4',
'azure','#F0FFFF',
'beige','#F5F5DC',
'bisque','#FFE4C4',
'black','#000000',
'blanchedalmond','#FFEBCD',
'blue','#0000FF',
'blueviolet','#8A2BE2',
'brown','#A52A2A',
'burlywood','#DEB887',
'cadetblue','#5F9EA0',
'chartreuse','#7FFF00',
'chocolate','#D2691E',
'coral','#FF7F50',
'cornflowerblue','#6495ED',
'cornsilk','#FFF8DC',
'crimson','#DC143C',
'cyan','#00FFFF',
'darkblue','#00008B',
'darkcyan','#008B8B',
'darkgoldenrod','#B8860B',
'darkgray','#A9A9A9',
'darkgreen','#006400',
'darkkhaki','#BDB76B',
'darkmagenta','#8B008B',
'darkolivegreen','#556B2F',
'darkorange','#FF8C00',
'darkorchid','#9932CC',
'darkred','#8B0000',
'darksalmon','#E9967A',
'darkseagreen','#8FBC8F',
'darkslateblue','#483D8B',
'darkslategray','#2F4F4F',
'darkturquoise','#00CED1',
'darkviolet','#9400D3',
'deeppink','#FF1493',
'deepskyblue','#00BFFF',
'dimgray','#696969',
'dodgerblue','#1E90FF',
'feldspar','#D19275',
'firebrick','#B22222',
'floralwhite','#FFFAF0',
'forestgreen','#228B22',
'fuchsia','#FF00FF',
'gainsboro','#DCDCDC',
'ghostwhite','#F8F8FF',
'gold','#FFD700',
'goldenrod','#DAA520',
'gray','#808080',
'green','#008000',
'greenyellow','#ADFF2F',
'honeydew','#F0FFF0',
'hotpink','#FF69B4',
'indianred',' #CD5C5C',
'indigo',' #4B0082',
'ivory','#FFFFF0',
'khaki','#F0E68C',
'lavender','#E6E6FA',
'lavenderblush','#FFF0F5',
'lawngreen','#7CFC00',
'lemonchiffon','#FFFACD',
'lightblue','#ADD8E6',
'lightcoral','#F08080',
'lightcyan','#E0FFFF',
'lightgoldenrodyellow','#FAFAD2',
'lightgrey','#D3D3D3',
'lightgreen','#90EE90',
'lightpink','#FFB6C1',
'lightsalmon','#FFA07A',
'lightseagreen','#20B2AA',
'lightskyblue','#87CEFA',
'lightslateblue','#8470FF',
'lightslategray','#778899',
'lightsteelblue','#B0C4DE',
'lightyellow','#FFFFE0',
'lime','#00FF00',
'limegreen','#32CD32',
'linen','#FAF0E6',
'magenta','#FF00FF',
'maroon','#800000',
'mediumaquamarine','#66CDAA',
'mediumblue','#0000CD',
'mediumorchid','#BA55D3',
'mediumpurple','#9370D8',
'mediumseagreen','#3CB371',
'mediumslateblue','#7B68EE',
'mediumspringgreen','#00FA9A',
'mediumturquoise','#48D1CC',
'mediumvioletred','#C71585',
'midnightblue','#191970',
'mintcream','#F5FFFA',
'mistyrose','#FFE4E1',
'moccasin','#FFE4B5',
'navajowhite','#FFDEAD',
'navy','#000080',
'oldlace','#FDF5E6',
'olive','#808000',
'olivedrab','#6B8E23',
'orange','#FFA500',
'orangered','#FF4500',
'orchid','#DA70D6',
'palegoldenrod','#EEE8AA',
'palegreen','#98FB98',
'paleturquoise','#AFEEEE',
'palevioletred','#D87093',
'papayawhip','#FFEFD5',
'peachpuff','#FFDAB9',
'peru','#CD853F',
'pink','#FFC0CB',
'plum','#DDA0DD',
'powderblue','#B0E0E6',
'purple','#800080',
'red','#FF0000',
'rosybrown','#BC8F8F',
'royalblue','#4169E1',
'saddlebrown','#8B4513',
'salmon','#FA8072',
'sandybrown','#F4A460',
'seagreen','#2E8B57',
'seashell','#FFF5EE',
'sienna','#A0522D',
'silver','#C0C0C0',
'skyblue','#87CEEB',
'slateblue','#6A5ACD',
'slategray','#708090',
'snow','#FFFAFA',
'springgreen','#00FF7F',
'steelblue','#4682B4',
'tan','#D2B48C',
'teal','#008080',
'thistle','#D8BFD8',
'tomato','#FF6347',
'turquoise','#40E0D0',
'violet','#EE82EE',
'violetred','#D02090',
'wheat','#F5DEB3',
'white','#FFFFFF',
'whitesmoke','#F5F5F5',
'yellow','#FFFF00',
'yellowgreen','#9ACD32');

    $s = strtolower($str);
    $r = array(" ", "\t");
    $s = str_replace($r, "", $s);
    $n = 0;
    $m = -1;
    $l = 0;
    while(1)
    {
        $pos = strpos($s, $ColArray[$n]);
        $len = strlen($ColArray[$n]);
        if($len == 0) break;

        if ($pos === false) {}
        else // matched
        {
            if($len > $l)
            {
                $l = $len;
                $m = $n;
            }
        }
        $n += 2;
    }
    if($m >= 0) return $ColArray[$m+1];
    return "- Can't find color: $str";
}

// return a random background
function RandomBackground()
{
$b = array(
'xat_balls.jpg',
'xat_bliss_like.jpg',
'xat_causeway.jpg',
'xat_drops_of_rain.jpg',
'xat_fallen_leaves.jpg',
'xat_flames.jpg',
'xat_green.jpg',
'xat_on_the_beach.jpg',
'xat_paper.jpg',
'xat_pebbles.jpg',
'xat_pool.jpg',
'xat_sand.jpg',
'xat_south_pacific.jpg',
'xat_stars.jpg',
'xat_tree_line.jpg',
'xat_winter_holiday.jpg',
'xat_wood.jpg',
'xat_metalglass.jpg',
'xat_cash.jpg',
'xat_jeans.jpg',
'xat_skin.jpg',
'xat_hearts.jpg',
'');

return 'background/' . $b[rand(0, count($b)-2)] ;
	
}

function SampleBackgrounds()
{
 $arr = array(
'xat_drops',
'xat_rock1',
'xat_splash',
'xat_light',
'xat_globe',
'xat_circuit',
'xat_lime_splash',
'xat_rock2',
'xat_disco',
'xat_car',
'xat_jigsaw',
'xat_gears',
'xat_fireworks',
'xat_bauble',
'xat_snowman',
'xat_velvet',
'xat_bliss_like',
'xat_causeway',
'xat_drops_of_rain',
'xat_fallen_leaves',
'xat_flames',
'xat_green',
'xat_on_the_beach',
'xat_paper',
'xat_pebbles',
'xat_pool',
'xat_sand',
'xat_south_pacific',
'xat_stars',
'xat_winter_holiday',
'xat_tree_line',
'xat_metalglass',
'xat_cash',
'xat_jeans',
'xat_skin',
'xat_hearts',
'xat_balls',
'xat_beams'
);

$rand_keys = array_rand($arr, 8);
foreach ($rand_keys as $v) {
$value = $arr[$v];
echo "<input type=image name=newimage_$value src=http://www.ixat.io/web_gear/background/jdothumb/$value.jpg alt=\"Click to use this image ($value)\" WIDTH=75 HEIGHT=61 />\n";
  }
echo '
<input type=image name="ChangeBackground" src=http://www.ixat.io/web_gear/background/more.gif 
alt="Click here for more images, To use your own image or To get an image from a web page."  WIDTH=75 HEIGHT=61 >' ."\n";

}

?>