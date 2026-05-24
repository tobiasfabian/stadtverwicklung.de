<?php

use Kirby\Cms\Page;
use Kirby\Content\Field;

/**
 * @method \Kirby\Content\Field teaserText()
 * @method \Kirby\Content\Field teaserImage()
 * @method \Kirby\Content\Field category()
 */
class KnowledgeEntryPage extends Page {
	public function categoryId(): ?string
	{
		return $this->content()->get('category')->value();
	}

	public function category(): ?Field
	{
		$categoryUuid = $this->categoryId();
		/** @var \Kirby\Cms\Blocks */
		$categoriesBlocks = $this->parent()->categories()->toBlocks();
		$categoryBlock = $categoriesBlocks->findBy('id', $categoryUuid);
		if ($this->kirby()->languageCode() === 'en') {
			$value = $categoryBlock?->headlineEn()->or($categoryBlock->headline())->value();
		}
		$value = $categoryBlock?->headline();
		return $value === null ? null : new Field($this, 'category', $value);
	}
}
