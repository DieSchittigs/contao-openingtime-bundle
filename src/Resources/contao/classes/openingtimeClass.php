<?php

/**
 * Openingtime Class
 *
 * Copyright (c) 2017 Die Schittigs
 *
 * @license LGPL-3.0+
 */

namespace DieSchittigs\SttgsOpeningtimeBundle\Classes;

class openingtimeClass extends \Contao\Frontend {


    public function openingtimeInsertTags($strTag)
    {
        $arrTag = explode('::',$strTag);
        switch($arrTag[0]) {
            case 'opened':

                $ts = \Date::parse('U'); // Today Timestamp, for buxfixing
                #$ts = '1513768072';

                if ($arrTag[1] == 'now') {
                    $strDateFormat = 'omd';

                    $i = \Date::parse($strDateFormat,$ts);
                    $k = 0;
                    while($i <= (\Date::parse($strDateFormat,$ts+(3600*24*14))))
                    {
                        $strDay = \Date::parse('D', mktime(0,0,0,substr($i,4,2)/*Monat*/,substr($i,6,2)/*Tag*/,substr($i,0,4)/*Jahr*/));
                        if (!$GLOBALS['TL_CONFIG'][$strDay]) {
                            $arrOpen[$i] = false;
                        }
                        else {
                            $arrTime = explode("-",$GLOBALS['TL_CONFIG'][$strDay]);

                            $arrOpen[$i]['start'] = mktime(substr($arrTime[0],0,2)/*Stunde*/,substr($arrTime[0],3,2)/*Minute*/,0,substr($i,4,2)/*Monat*/,substr($i,6,2)/*Tag*/,substr($i,0,4)/*Jahr*/);
                            $arrOpen[$i]['end'] = mktime(substr($arrTime[1],0,2)/*Stunde*/,substr($arrTime[1],3,2)/*Minute*/,0,substr($i,4,2)/*Monat*/,substr($i,6,2)/*Tag*/,substr($i,0,4)/*Jahr*/);
                        }
                        $i = \Date::parse($strDateFormat,$ts+(3600*24*$k));
                        $k++;
                    }

                    // Feiertage
                    $arrHolidays = unserialize($GLOBALS['TL_CONFIG']['holidays']);
                    if(is_Array($arrHolidays)) {
                        foreach($arrHolidays as $date){

                            $arrDate = explode('.', $date);
                            if (count($arrDate) != 3) continue;
                            $arrOpen[$arrDate[2].$arrDate[1].$arrDate[0]] = false;
                        }
                    }

                    // Sondertag
                    if(\Date::parse($strDateFormat,$GLOBALS['TL_CONFIG']['specialStart']) >= \Date::parse($strDateFormat,$ts)) { // Vergangene Tage brauchen wir nicht, aber
                        $arrOpen[\Date::parse($strDateFormat,$GLOBALS['TL_CONFIG']['specialStart'])] = array(
                            'start'=>$GLOBALS['TL_CONFIG']['specialStart'],
                            'end'=>$GLOBALS['TL_CONFIG']['specialEnd'],
                            'text'=>$GLOBALS['TL_CONFIG']['specialText']
                        );
                    }

                    ksort($arrOpen);

                    $i = 0;
                    foreach($arrOpen as $day => $time) {

                        if(is_array($time) && $ts <= $time['end']) {
                            $a = ($time['text']) ? '<span class="special">' . $time['text'] . '</span>' : '';
                            if($time['start'] > $ts) {
                                if($i<2) return $a . sprintf($GLOBALS['TL_LANG']['MSC']['opened'][$i]['start'], \Date::parse(\Config::get('timeFormat'), $time['start']));
                                else return $a . sprintf($GLOBALS['TL_LANG']['MSC']['opened'][2]['start'], \Date::parse('l', $time['start']), \Date::parse('H:i', $time['start']));
                            }
                            else {
                                if($i<2) return $a . sprintf($GLOBALS['TL_LANG']['MSC']['opened'][$i]['end'], \Date::parse(\Config::get('timeFormat'), $time['end']));
                                else return $a . sprintf($GLOBALS['TL_LANG']['MSC']['opened'][2]['end'], \Date::parse('l', $time['end']), \Date::parse('H:i', $time['end']));
                            }
                        }
                        $i++;
                    }
                }

                elseif($arrTag[1] == 'special') {
                    if($ts < $GLOBALS['TL_CONFIG']['specialEnd']) {
                        return sprintf($GLOBALS['TL_LANG']['MSC']['openSpecial'],
                            $GLOBALS['TL_CONFIG']['specialText'],
                            \Date::parse(\Config::get('dateFormat'), $GLOBALS['TL_CONFIG']['specialStart']),
                            \Date::parse(\Config::get('timeFormat'), $GLOBALS['TL_CONFIG']['specialStart']),
                            \Date::parse(\Config::get('timeFormat'), $GLOBALS['TL_CONFIG']['specialEnd'])
                        );
                    }
                    else return sprintf($GLOBALS['TL_LANG']['MSC']['openNoSpecial'], $GLOBALS['TL_CONFIG']['specialText']);
                }

                else {
                    if ($GLOBALS['TL_CONFIG'][$arrTag[1]]) {
                        $arrTime = explode ("-", $GLOBALS['TL_CONFIG'][$arrTag[1]]);

                        return sprintf($GLOBALS['TL_LANG']['MSC']['openTime'], $arrTime[0], $arrTime[1]);
                    }
                    return $GLOBALS['TL_LANG']['MSC']['openClosed'];
                }
            break;

        }
    }
}