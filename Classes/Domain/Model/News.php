<?php

namespace Cyberhouse\NewsGallery\Domain\Model;

/*
 * This file is part of the TYPO3 project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Lesser General Public License, either version 3
 * of the License, or (at your option) any later version.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */


class News extends \GeorgRinger\News\Domain\Model\News {

	/**
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\GeorgRinger\News\Domain\Model\FileReference>
	 */
	protected $gallery;

	/**
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
	 */
	public function getGallery() {
		return $this->gallery;
	}

	/**
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $gallery
	 */
	public function setGallery($gallery) {
		$this->gallery = $gallery;
	}

	/**
	 * @var int
	 */
	protected $galleryType;

	/**
	 * @return int
	 */
	public function getGalleryType() {
		return $this->galleryType;
	}

	/**
	 *
	 * @param int $galleryType
	 * @return void
	 */
	public function setGalleryType($galleryType) {
		$this->galleryType = $galleryType;
	}

}