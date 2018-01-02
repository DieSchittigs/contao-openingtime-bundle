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
		'default'                     => '{opening_legend},Mo,Di,Mi,Do,Fr,Sa,So;{special_legend},specials;{holiday_legend},holidays;'
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
        'specials' => array(
            'label'                   => &$GLOBALS['TL_LANG']['tl_openingtime']['specials'],
            'inputType'               => 'multiColumnWizard',
            'eval'                    => array(
                'dragAndDrop' => true,
                'columnFields' => array
                (
                    'specialStart' => array
                    (
                        'label'         => &$GLOBALS['TL_LANG']['tl_openingtime']['specialStart'],
                        'inputType'     => 'text',
                        'eval'          => array('rgxp'=>'datim', 'datepicker'=>true, 'style' => 'width:160px'),
                    ),
                    'specialEnd' => array
                    (
                        'label'         => &$GLOBALS['TL_LANG']['tl_openingtime']['specialEnd'],
                        'inputType'     => 'text',
                        'eval'          => array('rgxp'=>'datim', 'datepicker'=>true, 'style' => 'width:160px')
                    ),
                    'specialText' => array
                    (
                        'label'         => &$GLOBALS['TL_LANG']['tl_openingtime']['specialText'],
                        'inputType'     => 'text',
                        'eval'          => array('style' => 'width:200px')
                    ),
                    'specialDesc' => array
                    (
                        'label'         => &$GLOBALS['TL_LANG']['tl_openingtime']['specialDesc'],
                        'inputType'     => 'text',
                        'eval'          => array('style' => 'width:300px')
                    )
                )
            )
        )
    )
);
