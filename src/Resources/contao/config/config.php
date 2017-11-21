 <?php

$GLOBALS['BE_MOD']['sttgs']['openingtime'] = array
(
     'tables'      => array('tl_openingtime')
);

/**
 * TL_HOOKS
 */

$GLOBALS['TL_HOOKS']['replaceInsertTags'][] = array('DieSchittigs\\SttgsOpeningtimeBundle\\Classes\\openingtimeClass', 'openingtimeInsertTags');
