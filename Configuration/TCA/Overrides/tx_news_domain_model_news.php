<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$ll = 'LLL:EXT:news/Resources/Private/Language/locallang_db.xlf:';

$columns = array(
	'gallery_type' => array(
		'exclude' => 0,
		'label' => 'Darstellungstyp',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('keine Dateien anzeigen', 0),
				array('als Galerie anzeigen', 1),
				array('als Downloadliste anzeigen', 2),
			),
			'size' => 1,
			'maxitems' => 1,
		)
	),
	'gallery' => array(
		'displayCond' => 'FIELD:gallery_type:>:0',
		'exclude' => TRUE,
		'l10n_mode' => 'mergeIfNotBlank',
		'label' => 'LLL:EXT:cms/locallang_ttc.xlf:file_collections',
		'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			'gallery',
			[
				'appearance' => [
					'createNewRelationLinkTitle' => $ll . 'tx_news_domain_model_news.fal_media.add',
					'showPossibleLocalizationRecords' => 1,
					'showRemovedLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1,
					'showSynchronizationLink' => 1
				],
				'foreign_match_fields' => [
					'fieldname' => 'gallery',
					'tablenames' => 'tx_news_domain_model_news',
					'table_local' => 'sys_file',
				],
				// custom configuration for displaying fields in the overlay/reference table
				// to use the newsPalette and imageoverlayPalette instead of the basicoverlayPalette
				'foreign_types' => [
					'0' => [
						'showitem' => '
						--palette--;;imageoverlayPalette,'
					]
				]
			]
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $columns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'gallery_type, gallery', '', 'after:related_from');
// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'gallery', '', 'after:galleryType');