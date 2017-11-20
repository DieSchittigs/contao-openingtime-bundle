<?php
/**
 * Openingtime configuration
 */
$GLOBALS['TL_DCA']['tl_openingtime'] = array
(
	// Config
	'config' => array
	(
		'dataContainer'               => 'File',
		'closed'                      => true
	),
	// Palettes
	'palettes' => array
	(
		'default'                     => '{opening_legend},Mo,Di,Mi,Do,Fr,Sa,So;{special_legend},specialStart,specialEnd,specialText;{holiday_legend},holidays;'
	),
	// Fields
	'fields' => array
	(
        'Mo' => array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['Mo'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'Di' => array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['Di'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'Mi' => array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['Mi'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'Do'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['Do'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'Fr'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['Fr'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'Sa'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['Sa'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'So'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['So'] ,
            'inputType'               => 'text',
            'eval'                    => array('nospace'=>true, 'tl_class'=>'w50')
        ),
        'holidays' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['holidays'],
            'inputType'               => 'listWizard',
            'eval'                    => array( 'tl_class'=>'w50 clr')
        ),
        'specialStart'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['specialStart'] ,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50')
        ),
        'specialEnd'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['specialEnd'] ,
            'inputType'               => 'text',
            'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50')
        ),
        'specialText'=> array (
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['specialText'] ,
            'inputType'               => 'text',
            'eval'                    => array('tl_class'=>'w50')
        ),
    )
);
