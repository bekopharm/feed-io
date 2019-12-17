<?php declare(strict_types=1);
/*
 * This file is part of the feed-io package.
 *
 * (c) Alexandre Debril <alex.debril@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FeedIo\Feed\Item;

/**
 * Describe a Media instance
 *
 * most of the time medias are defined as enclosure in the XML document
 *
 * Atom :
 *     <link rel="enclosure" href="http://example.org/video.mpeg" type="video/mpeg" />
 *
 * RSS :
 *     <enclosure url="http://example.org/video.mpeg" length="12216320" type="video/mpeg" />
 *
 * <code>
 *     // will display http://example.org/video.mpeg
 *     echo $media->getUrl();
 * </code>
 */
interface MediaInterface
{
    /**
     * @return string
     */
    public function getNodeName() : string;

    /**
     * @param  string $nodeName
     * @return MediaInterface
     */
    public function setNodeName(string $nodeName) : MediaInterface;

    /**
     * @return string
     */
    public function getType() : ? string;

    /**
     * @param  string $type
     * @return MediaInterface
     */
    public function setType(?string $type) : MediaInterface;

    /**
     * @return string
     */
    public function getUrl() : ? string;

    /**
     * @param  string $url
     * @return MediaInterface
     */
    public function setUrl(?string $url) : MediaInterface;

    /**
     * @return string
     */
    public function getLength() : ? string;

    /**
     * @param  string $length
     * @return MediaInterface
     */
    public function setLength(?string $length) : MediaInterface;

    /**
     * @return string
     */
    public function getTitle() : ? string;

    /**
     * @param  string $title
     * @return MediaInterface
     */
    public function setTitle(?string $title) : MediaInterface;

    /**
     * @return string
     */
    public function getDescription() : ? string;

    /**
     * @param  string $description
     * @return MediaInterface
     */
    public function setDescription(?string $description) : MediaInterface;

    /**
     * @return string
     */
    public function getThumbnail() : ? string;

    /**
     * @param  string $thumbnail
     * @return MediaInterface
     */
    public function setThumbnail(?string $thumbnail) : MediaInterface;

    /**
     * @return int
     */
    public function getContentFileSize() : ?int;

    /**
     * @param  string $contentFileSize
     * @return MediaInterface
     */
    public function setContentFileSize(?int $contentFileSize) : MediaInterface;


    /**
     * @return int
     */
    public function getContentBitrate() : ?int;

    /**
     * @param  string $contentBitrate
     * @return MediaInterface
     */
    public function setContentBitrate(?int $contentBitrate) : MediaInterface;


    /**
     * @return int
     */
    public function getContentFramerate() : ?int;

    /**
     * @param  string $contentFramerate
     * @return MediaInterface
     */
    public function setContentFramerate(?int $contentFramerate) : MediaInterface;


    /**
     * @return int
     */
    public function getContentSamplingrate() : ?float;

    /**
     * @param  string $contentSamplingrate
     * @return MediaInterface
     */
    public function setContentSamplingrate(?float $contentSamplingrate) : MediaInterface;


    /**
     * @return int
     */
    public function getContentDuration() : ?int;

    /**
     * @param  string $contentDuration
     * @return MediaInterface
     */
    public function setContentDuration(?int $contentDuration) : MediaInterface;


    /**
     * @return int
     */
    public function getContentHeight() : ?int;

    /**
     * @param  string $contentHeight
     * @return MediaInterface
     */
    public function setContentHeight(?int $contentHeight) : MediaInterface;


    /**
     * @return int
     */
    public function getContentWidth() : ?int;

    /**
     * @param  string $contentWidth
     * @return MediaInterface
     */
    public function setContentWidth(?int $contentWidth) : MediaInterface;


    /**
     * @return string
     */
    public function getContentLang() : ?string;

    /**
     * @param  string $contentLang
     * @return MediaInterface
     */
    public function setContentLang(?string $contentLang) : MediaInterface;


    /**
     * @return int
     */
    public function getContentExpression() : ?int;

    /**
     * @param  string $contentExpression
     * @return MediaInterface
     */
    public function setContentExpression(?int $contentExpression) : MediaInterface;


    /**
     * @return int
     */
    public function getContentMedium() : ?int;

    /**
     * @param  string $contentMedium
     * @return MediaInterface
     */
    public function setContentMedium(?int $contentMedium) : MediaInterface;


    /**
     * @return int
     */
    public function getRights() : ?int;

    /**
     * @param  int $rights
     * @return MediaInterface
     */
    public function setRights(int $rating) : MediaInterface;


    /**
     * @return string
     */
    public function getRating() : ?string;

    /**
     * @param  string $rating
     * @return MediaInterface
     */
    public function setRating(?string $rating) : MediaInterface;


    /**
     * @return string
     */
    public function getRatingScheme() : ?string;

    /**
     * @param  string $ratingScheme
     * @return MediaInterface
     */
    public function setRatingScheme(?string $ratingScheme) : MediaInterface;


    /**
     * @return int
     */
    public function getTitleType() : ?int;

    /**
     * @param  string $titleType
     * @return MediaInterface
     */
    public function setTitleType(?int $titleType) : MediaInterface;


    /**
     * @return int
     */
    public function getDescriptionType() : ?int;

    /**
     * @param  string $descriptionType
     * @return MediaInterface
     */
    public function setDescriptionType(?int $descriptionType) : MediaInterface;


    /**
     * @return array
     */
    public function getKeywords() : array;

    /**
     * @param  string $keywords
     * @return MediaInterface
     */
    public function setKeywords(array $keywords) : MediaInterface;


    /**
     * @return int
     */
    public function getThumbnailWidth() : ?int;

    /**
     * @param  string $thumbnailWidth
     * @return MediaInterface
     */
    public function setThumbnailWidth(?int $thumbnailWidth) : MediaInterface;


    /**
     * @return int
     */
    public function getThumbnailHeight() : ?int;

    /**
     * @param  string $thumbnailHeight
     * @return MediaInterface
     */
    public function setThumbnailHeight(?int $thumbnailHeight) : MediaInterface;


    /**
     * @return DateTime
     */
    public function getThumbnailTime() : ? \DateTime;

    /**
     * @param  string $thumbnailTime
     * @return MediaInterface
     */
    public function setThumbnailTime(? \DateTime $thumbnailTime) : MediaInterface;


    /**
     * @return string
     */
    public function getCategory() : ?string;

    /**
     * @param  string $category
     * @return MediaInterface
     */
    public function setCategory(?string $category) : MediaInterface;


    /**
     * @return string
     */
    public function getCategoryLabel() : ?string;

    /**
     * @param  string $categoryLabel
     * @return MediaInterface
     */
    public function setCategoryLabel(?string $categoryLabel) : MediaInterface;


    /**
     * @return string
     */
    public function getCategoryScheme() : ?string;

    /**
     * @param  string $categoryScheme
     * @return MediaInterface
     */
    public function setCategoryScheme(?string $categoryScheme) : MediaInterface;


    /**
     * @return string
     */
    public function getHash() : ?string;

    /**
     * @param  string $hash
     * @return MediaInterface
     */
    public function setHash(?string $hash) : MediaInterface;


    /**
     * @return int
     */
    public function getHashAlgo() : ?int;

    /**
     * @param  int $hashAlgo
     * @return MediaInterface
     */
    public function setHashAlgo(?int $hashAlgo) : MediaInterface;


    /**
     * @return string
     */
    public function getPlayerUrl() : ?string;

    /**
     * @param  string $playerUrl
     * @return MediaInterface
     */
    public function setPlayerUrl(?string $playerUrl) : MediaInterface;


    /**
     * @return int
     */
    public function getPlayerWidth() : ?int;

    /**
     * @param  string $playerWidth
     * @return MediaInterface
     */
    public function setPlayerWidth(?int $playerWidth) : MediaInterface;


    /**
     * @return int
     */
    public function getPlayerHeight() : ?int;

    /**
     * @param  string $playerHeight
     * @return MediaInterface
     */
    public function setPlayerHeight(?int $playerHeight) : MediaInterface;


    /**
     * @return string
     */
    public function getCopyright() : ?string;

    /**
     * @param  string $copyright
     * @return MediaInterface
     */
    public function setCopyright(?string $copyright) : MediaInterface;


    /**
     * @return string
     */
    public function getCopyrightUrl() : ?string;

    /**
     * @param  string $copyrightUrl
     * @return MediaInterface
     */
    public function setCopyrightUrl(?string $copyrightUrl) : MediaInterface;


    /**
     * @return string
     */
    public function getRestriction() : ?string;

    /**
     * @param  string $restriction
     * @return MediaInterface
     */
    public function setRestriction(?string $restriction) : MediaInterface;


    /**
     * @return int
     */
    public function getRestrictionType() : ?int;

    /**
     * @param  string $restrictionType
     * @return MediaInterface
     */
    public function setRestrictionType(?int $restrictionType) : MediaInterface;


    /**
     * @return int
     */
    public function getRestrictionRelationship() : ?int;

    /**
     * @param  string $restrictionRelationship
     * @return MediaInterface
     */
    public function setRestrictionRelationship(?int $restrictionRelationship) : MediaInterface;


    /**
     * @return float
     */
    public function getStarRatingAverage() : ?float;

    /**
     * @param  float $starRatingAverage
     * @return MediaInterface
     */
    public function setStarRatingAverage(?float $starRatingAverage) : MediaInterface;


    /**
     * @return int
     */
    public function getStarRatingCount() : ?int;

    /**
     * @param  string $starRatingCount
     * @return MediaInterface
     */
    public function setStarRatingCount(?int $starRatingCount) : MediaInterface;


    /**
     * @return int
     */
    public function getStarRatingMin() : ?int;

    /**
     * @param  string $starRatingMin
     * @return MediaInterface
     */
    public function setStarRatingMin(?int $starRatingMin) : MediaInterface;


    /**
     * @return int
     */
    public function getStarRatingMax() : ?int;

    /**
     * @param  string $starRatingMax
     * @return MediaInterface
     */
    public function setStarRatingMax(?int $starRatingMax) : MediaInterface;


    /**
     * @return int
     */
    public function getNbViews() : ?int;

    /**
     * @param  string $nbViews
     * @return MediaInterface
     */
    public function setNbViews(?int $nbViews) : MediaInterface;


    /**
     * @return int
     */
    public function getNbFavorites() : ?int;

    /**
     * @param  string $nbFavorites
     * @return MediaInterface
     */
    public function setNbFavorites(?int $nbFavorites) : MediaInterface;


    /**
     * @return array
     */
    public function getTags() : array;

    /**
     * @param  string $tags
     * @return MediaInterface
     */
    public function setTags(array $tags) : MediaInterface;


    /**
     * @return array
     */
    public function getComments() : array;

    /**
     * @param  array $comments
     * @return MediaInterface
     */
    public function setComments(array $comments) : MediaInterface;

    /**
     * @return string
     */
    public function getEmbedUrl() : ?string;

    /**
     * @param  string $embedUrl
     * @return MediaInterface
     */
    public function setEmbedUrl(?string $embedUrl) : MediaInterface;


    /**
     * @return int
     */
    public function getEmbedWidth() : ?int;

    /**
     * @param  string $embedWidth
     * @return MediaInterface
     */
    public function setEmbedWidth(?int $embedWidth) : MediaInterface;


    /**
     * @return int
     */
    public function getEmbedHeight() : ?int;

    /**
     * @param  string $embedHeight
     * @return MediaInterface
     */
    public function setEmbedHeight(?int $embedHeight) : MediaInterface;


    /**
     * @return array
     */
    public function getEmbedParams() : array;

    /**
     * @param  string $embedParams
     * @return MediaInterface
     */
    public function setEmbedParams(array $embedParams) : MediaInterface;


    /**
     * @return array
     */
    public function getResponses() : array;

    /**
     * @param  string $responses
     * @return MediaInterface
     */
    public function setResponses(array $responses) : MediaInterface;


    /**
     * @return array
     */
    public function getBacklinks() : array;

    /**
     * @param  string $backlinks
     * @return MediaInterface
     */
    public function setBacklinks(array $backlinks) : MediaInterface;


    /**
     * @return int
     */
    public function getStatus() : ?int;

    /**
     * @param  string $status
     * @return MediaInterface
     */
    public function setStatus(?int $status) : MediaInterface;


    /**
     * @return string
     */
    public function getStatusReason() : ?string;

    /**
     * @param  string $statusReason
     * @return MediaInterface
     */
    public function setStatusReason(?string $statusReason) : MediaInterface;


    /**
     * @return string
     */
    public function getLicense() : ?string;

    /**
     * @param  string $license
     * @return MediaInterface
     */
    public function setLicense(?string $license) : MediaInterface;


    /**
     * @return string
     */
    public function getLicenseUrl() : ?string;

    /**
     * @param  string $licenseUrl
     * @return MediaInterface
     */
    public function setLicenseUrl(?string $licenseUrl) : MediaInterface;


    /**
     * @return string
     */
    public function getLicenseType() : ?string;

    /**
     * @param  string $licenseType
     * @return MediaInterface
     */
    public function setLicenseType(?string $licenseType) : MediaInterface;


    /**
     * @return string
     */
    public function getPeerLink() : ?string;

    /**
     * @param  string $peerLink
     * @return MediaInterface
     */
    public function setPeerLink(?string $peerLink) : MediaInterface;


    /**
     * @return string
     */
    public function getPeerLinkType() : ?string;

    /**
     * @param  string $peerLinkType
     * @return MediaInterface
     */
    public function setPeerLinkType(?string $peerLinkType) : MediaInterface;


    /**
     * @return array
     */
    public function getCredits() : array;

    /**
     * @param  string $credits
     * @return MediaInterface
     */
    public function setCredits(array $credits) : MediaInterface;


    /**
     * @return array
     */
    public function getTexts() : array;

    /**
     * @param  string $texts
     * @return MediaInterface
     */
    public function setTexts(array $texts) : MediaInterface;


    /**
     * @return array
     */
    public function getPrices() : array;

    /**
     * @param  string $prices
     * @return MediaInterface
     */
    public function setPrices(array $prices) : MediaInterface;


    /**
     * @return array
     */
    public function getSubTitles() : array;

    /**
     * @param  string $subTitles
     * @return MediaInterface
     */
    public function setSubTitles(array $subTitles) : MediaInterface;


    /**
     * @return array
     */
    public function getScenes() : array;

    /**
     * @param  string $scenes
     * @return MediaInterface
     */
    public function setScenes(array $scenes) : MediaInterface;

    /**
     * @return bool
     */
    public function isDefault() : bool;

    /**
     * @param bool $default
     * @return MediaInterface
     */
    public function setDefault(bool $default) : MediaInterface;
}
