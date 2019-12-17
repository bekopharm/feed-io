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

abstract class MediaContentMedium
{
    const Image = 0;
    const Audio = 1;
    const Video = 2;
    const Document = 3;
    const Executable = 4;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "image":
                return static::Image;
            case "audio":
                return static::Audio;
            case "video":
                return static::Video;
            case "document":
                return static::Document;
            case "executable":
                return static::Executable;
            default:
                return null;
        }
    }
}

abstract class MediaContentExpression
{
    const Sample = 0;
    const Full = 1;
    const NonStop = 2;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "sample":
                return static::Sample;
            case "full":
                return static::Full;
            case "nonstop":
                return static::NonStop;
            default:
                return null;
        }
    }
}

abstract class MediaDescriptionType
{
    const Plain = 0;
    const HTML = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "plain":
                return static::Plain;
            case "html":
                return static::HTML;
            default:
                return null;
        }
    }
}

abstract class MediaTitleType
{
    const Plain = 0;
    const HTML = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "plain":
                return static::Plain;
            case "html":
                return static::HTML;
            default:
                return null;
        }
    }
}

abstract class MediaHashAlgo
{
    const MD5 = 0;
    const SHA1 = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "md5":
                return static::MD5;
            case "sha1":
                return static::SHA1;
            default:
                return static::MD5;
        }
    }
}

abstract class MediaCreditScheme
{
    const URN_EBU = 0;
    const URN_YVS = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "urn:ebu":
                return static::URN_EBU;
            case "urn:yvs":
                return static::URN_YVS;
            default:
                return static::URN_EBU;
        }
    }
}

abstract class MediaTextType
{
    const Plain = 0;
    const HTML = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "plain":
                return static::Plain;
            case "html":
                return static::HTML;
            default:
                return static::Plain;
        }
    }
}

abstract class MediaRestrictionRelationship
{
    const Allow = 0;
    const Deny = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "allow":
                return static::Allow;
            case "deny":
                return static::Deny;
            default:
                return null;
        }
    }
}

abstract class MediaRestrictionType
{
    const Country = 0;
    const URI = 1;
    const Sharing = 2;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "country":
                return static::Country;
            case "uri":
                return static::URI;
            case "sharing":
                return static::Sharing;
            default:
                return null;
        }
    }
}

abstract class MediaStatus
{
    const Active = 0;
    const Blocked = 1;
    const Deleted = 2;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "active":
                return static::Active;
            case "blocked":
                return static::Blocked;
            case "deleted":
                return static::Deleted;
            default:
                return null;
        }
    }
}

abstract class MediaPriceType
{
    const Free = 0;
    const Rent = 1;
    const Purchase = 2;
    const Package = 3;
    const Subscription = 4;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "free":
                return static::Free;
            case "rent":
                return static::Rent;
            case "purchase":
                return static::Purchase;
            case "package":
                return static::Package;
            case "subscription":
                return static::Subscription;
            default:
                return null;
        }
    }
}

abstract class MediaRightsStatus
{
    const UserCreated = 0;
    const Official = 1;

    public static function fromXML(?string $value) : ?int
    {
        switch (strtolower($value ?: "")) {
            case "usercreated":
                return static::UserCreated;
            case "official":
                return static::Official;
            default:
                return null;
        }
    }
}

class MediaCredit
{
    /**
     * @var int
     */
    protected $scheme;

    /**
     * @var string
     */
    protected $role;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param  int $scheme
     * @return MediaCredit
     */
    public function setScheme(int $scheme) : MediaCredit
    {
        $this->scheme = $scheme;

        return $this;
    }

    /**
     * @return int
     */
    public function getScheme() : ? int
    {
        return $this->scheme;
    }

    /**
     * @param  string $role
     * @return MediaCredit
     */
    public function setRole(?string $role) : MediaCredit
    {
        $this->role = $role;

        return $this;
    }

    public function getRole() : ? string
    {
        return $this->role;
    }

    /**
     * @param  string $value
     * @return MediaCredit
     */
    public function setValue(string $value) : MediaCredit
    {
        $this->value = $value;

        return $this;
    }

    public function getValue() : string
    {
        return $this->value;
    }
}

class MediaText
{
    /**
     * @var string
     */
    protected $value;

    /**
     * @var int
     */
    protected $type;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var \DateTime
     */
    protected $start;

    /**
     * @var \DateTime
     */
    protected $end;

    /**
     * @param  string $value
     * @return MediaText
     */
    public function setValue(string $value) : MediaText
    {
        $this->value = $value;
        return $this;
    }

    public function getValue() : string
    {
        return $this->value;
    }

    /**
     * @param  int $type
     * @return MediaText
     */
    public function setType(int $type) : MediaText
    {
        $this->type = $type;
        return $this;
    }

    public function getType() : int
    {
        return $this->type;
    }

    /**
     * @param  string $lang
     * @return MediaText
     */
    public function setLang(? string $lang) : MediaText
    {
        $this->lang = $lang;
        return $this;
    }

    public function getLang() : ? string
    {
        return $this->lang;
    }

    /**
     * @param  \DateTime $start
     * @return MediaText
     */
    public function setStart(? \DateTime $start) : MediaText
    {
        $this->start = $start;
        return $this;
    }

    public function getStart() : ? \DateTime
    {
        return $this->start;
    }

    /**
     * @param  \DateTime $end
     * @return MediaText
     */
    public function setEnd(? \DateTime $end) : MediaText
    {
        $this->end = $end;
        return $this;
    }

    public function getEnd() : ? \DateTime
    {
        return $this->end;
    }
}

class MediaPrice
{
    /**
     * @var int
     */
    protected $type;

    /**
     * @var float
     */
    protected $value;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @param  int $type
     * @return MediaPrice
     */
    public function setType(? int $type) : MediaPrice
    {
        $this->type = $type;
        return $this;
    }

    public function getType() : ? int
    {
        return $this->type;
    }

    /**
     * @param  float $value
     * @return MediaPrice
     */
    public function setValue(? float $value) : MediaPrice
    {
        $this->value = $value;
        return $this;
    }

    public function getValue() : ? float
    {
        return $this->value;
    }

    /**
     * @param  string currency
     * @return MediaPrice
     */
    public function setCurrency(? string $currency) : MediaPrice
    {
        $this->currency = $currency;
        return $this;
    }

    public function getCurrency() : ? string
    {
        return $this->currency;
    }
}

class MediaSubtitle
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $url;

    /**
     * @param  string $type
     * @return MediaSubtitle
     */
    public function setType(? string $type) : MediaSubtitle
    {
        $this->type = $type;
        return $this;
    }

    public function getType() : ? string
    {
        return $this->type;
    }

    /**
     * @param  string $lang
     * @return MediaSubtitle
     */
    public function setLang(? string $lang) : MediaSubtitle
    {
        $this->lang = $lang;
        return $this;
    }

    public function getLang() : ? string
    {
        return $this->lang;
    }

    /**
     * @param  string url
     * @return MediaSubtitle
     */
    public function setUrl(? string $url) : MediaSubtitle
    {
        $this->url = $url;
        return $this;
    }

    public function getUrl() : ? string
    {
        return $this->url;
    }
}

class MediaScene
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \DateTime
     */
    protected $startTime;

    /**
     * @var \DateTime
     */
    protected $endTime;

    /**
     * @param  string $title
     * @return MediaScene
     */
    public function setTitle(string $title) : MediaScene
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param  string $description
     * @return MediaScene
     */
    public function setDescription(? string $description) : MediaScene
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription() : ? string
    {
        return $this->description;
    }

    /**
     * @param  \DateTime $startTime
     * @return MediaScene
     */
    public function setStartTime(? \DateTime $startTime) : MediaScene
    {
        $this->startTime = $startTime;
        return $this;
    }

    public function getStartTime() : ? \DateTime
    {
        return $this->startTime;
    }

    /**
     * @param  \DateTime $endTime
     * @return MediaScene
     */
    public function setEndTime(? \DateTime $endTime) : MediaScene
    {
        $this->endTime = $endTime;
        return $this;
    }

    public function getEndTime() : ? \DateTime
    {
        return $this->endTime;
    }
}


class Media implements MediaInterface
{
    /**
     * @var string
     */
    protected $nodeName;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $length;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $thumbnail;

    /**
     * @var int
     */
    protected $contentFileSize;

    /**
     * @var int
     */
    protected $contentBitrate;

    /**
     * @var int
     */
    protected $contentFramerate;

    /**
     * @var int
     */
    protected $contentSamplingrate;

    /**
     * @var int
     */
    protected $contentDuration;

    /**
     * @var int
     */
    protected $contentHeight;

    /**
     * @var int
     */
    protected $contentWidth;

    /**
     * @var string
     */
    protected $contentLang;

    /**
     * @var int
     */
    protected $contentExpression;

    /**
     * @var int
     */
    protected $contentMedium;

    /**
     * @var string
     */
    protected $rights;

    /**
     * @var string
     */
    protected $rating;


    /**
     * @var string
     */
    protected $ratingScheme;

    /**
     * @var int
     */
    protected $titleType;

    /**
     * @var int
     */
    protected $descriptionType;

    /**
     * @var array
     */
    protected $keywords = array();

    /**
     * @var int
     */
    protected $thumbnailWidth;

    /**
     * @var int
     */
    protected $thumbnailHeight;

    /**
     * @var DateTime
     */
    protected $thumbnailTime;

    /**
     * @var string
     */
    protected $category;

    /**
     * @var string
     */
    protected $categoryLabel;

    /**
     * @var string
     */
    protected $categoryScheme;

    /**
     * @var string
     */
    protected $hash;

    /**
     * @var string
     */
    protected $hashAlgo;

    /**
     * @var string
     */
    protected $playerUrl;

    /**
     * @var int
     */
    protected $playerWidth;

    /**
     * @var int
     */
    protected $playerHeight;

    /**
     * @var string
     */
    protected $copyright;

    /**
     * @var string
     */
    protected $copyrightUrl;

    /**
     * @var string
     */
    protected $restriction;

    /**
     * @var int
     */
    protected $restrictionType;

    /**
     * @var int
     */
    protected $restrictionRelationship;

    /**
     * @var float
     */
    protected $starRatingAverage;

    /**
     * @var int
     */
    protected $starRatingCount;

    /**
     * @var int
     */
    protected $starRatingMin;

    /**
     * @var int
     */
    protected $starRatingMax;

    /**
     * @var int
     */
    protected $nbViews;

    /**
     * @var int
     */
    protected $nbFavorites;

    /**
     * @var array
     */
    protected $tags = array();

    /**
     * @var array
     */
    protected $comments = array();

    /**
     * @var string
     */
    protected $embedUrl;

    /**
     * @var int
     */
    protected $embedWidth;

    /**
     * @var int
     */
    protected $embedHeight;

    /**
     * @var array
     */
    protected $embedParams = array();

    /**
     * @var array
     */
    protected $responses = array();

    /**
     * @var array
     */
    protected $backlinks = array();

    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $statusReason;

    /**
     * @var string
     */
    protected $license;

    /**
     * @var string
     */
    protected $licenseUrl;

    /**
     * @var string
     */
    protected $licenseType;

    /**
     * @var string
     */
    protected $peerLink;

    /**
     * @var string
     */
    protected $peerLinkType;

    /**
     * @var array
     */
    protected $credits = array();

    /**
     * @var array
     */
    protected $texts = array();

    /**
     * @var array
     */
    protected $prices = array();

    /**
     * @var array
     */
    protected $subTitles = array();

    /**
     * @var array
     */
    protected $scenes = array();

    /**
     * @var bool
     */
    protected $default = true;

    /**
     * @return string
     */
    public function getNodeName() : string
    {
        return $this->nodeName;
    }

    /**
     * @param string $nodeName
     * @return MediaInterface
     */
    public function setNodeName(string $nodeName) : MediaInterface
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * @return string
     */
    public function getType() : ? string
    {
        return $this->type;
    }

    /**
     * @param  string $type
     * @return MediaInterface
     */
    public function setType(?string $type) : MediaInterface
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() : ? string
    {
        return $this->url;
    }

    /**
     * @param  string $url
     * @return MediaInterface
     */
    public function setUrl(?string $url) : MediaInterface
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getLength() : ? string
    {
        return $this->length;
    }

    /**
     * @param  string $length
     * @return MediaInterface
     */
    public function setLength(?string $length) : MediaInterface
    {
        $this->length = $length;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() : ? string
    {
        return $this->title;
    }

    /**
     * @param  string $title
     * @return MediaInterface
     */
    public function setTitle(?string $title) : MediaInterface
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() : ? string
    {
        return $this->description;
    }

    /**
     * @param  string $description
     * @return MediaInterface
     */
    public function setDescription(?string $description) : MediaInterface
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getThumbnail() : ? string
    {
        return $this->thumbnail;
    }

    /**
     * @param  string $thumbnail
     * @return MediaInterface
     */
    public function setThumbnail(?string $thumbnail) : MediaInterface
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentFileSize() : ?int
    {
        return $this->contentFileSize;
    }

    /**
     * @param  int $contentFileSize
     * @return MediaInterface
     */
    public function setContentFileSize(?int $contentFileSize) : MediaInterface
    {
        $this->contentFileSize = $contentFileSize;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentBitrate() : ?int
    {
        return $this->contentBitrate;
    }

    /**
     * @param  int $contentBitrate
     * @return MediaInterface
     */
    public function setContentBitrate(?int $contentBitrate) : MediaInterface
    {
        $this->contentBitrate = $contentBitrate;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentFramerate() : ?int
    {
        return $this->contentFramerate;
    }

    /**
     * @param  int $contentFramerate
     * @return MediaInterface
     */
    public function setContentFramerate(?int $contentFramerate) : MediaInterface
    {
        $this->contentFramerate = $contentFramerate;

        return $this;
    }

    /**
     * @return float
     */
    public function getContentSamplingrate() : ?float
    {
        return $this->contentSamplingrate;
    }

    /**
     * @param  float $contentSamplingrate
     * @return MediaInterface
     */
    public function setContentSamplingrate(?float $contentSamplingrate) : MediaInterface
    {
        $this->contentSamplingrate = $contentSamplingrate;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentDuration() : ?int
    {
        return $this->contentDuration;
    }

    /**
     * @param  int $contentDuration
     * @return MediaInterface
     */
    public function setContentDuration(?int $contentDuration) : MediaInterface
    {
        $this->contentDuration = $contentDuration;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentHeight() : ?int
    {
        return $this->contentHeight;
    }

    /**
     * @param  int $contentHeight
     * @return MediaInterface
     */
    public function setContentHeight(?int $contentHeight) : MediaInterface
    {
        $this->contentHeight = $contentHeight;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentWidth() : ?int
    {
        return $this->contentWidth;
    }

    /**
     * @param  int $contentWidth
     * @return MediaInterface
     */
    public function setContentWidth(?int $contentWidth) : MediaInterface
    {
        $this->contentWidth = $contentWidth;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentLang() : ?string
    {
        return $this->contentLang;
    }

    /**
     * @param  string $contentLang
     * @return MediaInterface
     */
    public function setContentLang(?string $contentLang) : MediaInterface
    {
        $this->contentLang = $contentLang;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentExpression() : ?int
    {
        return $this->contentExpression;
    }

    /**
     * @param  int $contentExpression
     * @return MediaInterface
     */
    public function setContentExpression(?int $contentExpression) : MediaInterface
    {
        $this->contentExpression = $contentExpression;

        return $this;
    }

    /**
     * @return int
     */
    public function getContentMedium() : ?int
    {
        return $this->contentMedium;
    }

    /**
     * @param  int $contentMedium
     * @return MediaInterface
     */
    public function setContentMedium(?int $contentMedium) : MediaInterface
    {
        $this->contentMedium = $contentMedium;

        return $this;
    }

    /**
     * @return int
     */
    public function getRights() : ?int
    {
        return $this->rights;
    }

    /**
     * @param  int $rights
     * @return MediaInterface
     */
    public function setRights(int $rights) : MediaInterface
    {
        $this->rights = $rights;

        return $this;
    }


    /**
     * @return string
     */
    public function getRating() : ?string
    {
        return $this->rating;
    }

    /**
     * @param  string $rating
     * @return MediaInterface
     */
    public function setRating(?string $rating) : MediaInterface
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @return string
     */
    public function getRatingScheme() : ?string
    {
        return $this->ratingScheme;
    }

    /**
     * @param  string $ratingScheme
     * @return MediaInterface
     */
    public function setRatingScheme(?string $ratingScheme) : MediaInterface
    {
        $this->ratingScheme = $ratingScheme;

        return $this;
    }


    /**
     * @return int
     */
    public function getTitleType() : ?int
    {
        return $this->titleType;
    }

    /**
     * @param  int $titleType
     * @return MediaInterface
     */
    public function setTitleType(?int $titleType) : MediaInterface
    {
        $this->titleType = $titleType;

        return $this;
    }


    /**
     * @return int
     */
    public function getDescriptionType() : ?int
    {
        return $this->descriptionType;
    }

    /**
     * @param  int $descriptionType
     * @return MediaInterface
     */
    public function setDescriptionType(?int $descriptionType) : MediaInterface
    {
        $this->descriptionType = $descriptionType;

        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords() : array
    {
        return $this->keywords;
    }

    /**
     * @param  array $keywords
     * @return MediaInterface
     */
    public function setKeywords(array $keywords) : MediaInterface
    {
        $this->keywords = $keywords;

        return $this;
    }


    /**
     * @return int
     */
    public function getThumbnailWidth() : ?int
    {
        return $this->thumbnailWidth;
    }

    /**
     * @param  int $thumbnailWidth
     * @return MediaInterface
     */
    public function setThumbnailWidth(?int $thumbnailWidth) : MediaInterface
    {
        $this->thumbnailWidth = $thumbnailWidth;

        return $this;
    }

    /**
     * @return int
     */
    public function getThumbnailHeight() : ?int
    {
        return $this->thumbnailHeight;
    }

    /**
     * @param  int $thumbnailHeight
     * @return MediaInterface
     */
    public function setThumbnailHeight(?int $thumbnailHeight) : MediaInterface
    {
        $this->thumbnailHeight = $thumbnailHeight;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getThumbnailTime() : ? \DateTime
    {
        return $this->thumbnailTime;
    }

    /**
     * @param  DateTime $thumbnailTime
     * @return MediaInterface
     */
    public function setThumbnailTime(? \DateTime $thumbnailTime) : MediaInterface
    {
        $this->thumbnailTime = $thumbnailTime;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategory() : ?string
    {
        return $this->category;
    }

    /**
     * @param  string $category
     * @return MediaInterface
     */
    public function setCategory(?string $category) : MediaInterface
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryLabel() : ?string
    {
        return $this->categoryLabel;
    }

    /**
     * @param  string $categoryLabel
     * @return MediaInterface
     */
    public function setCategoryLabel(?string $categoryLabel) : MediaInterface
    {
        $this->categoryLabel = $categoryLabel;

        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryScheme() : ?string
    {
        return $this->categoryScheme;
    }

    /**
     * @param  string $categoryScheme
     * @return MediaInterface
     */
    public function setCategoryScheme(?string $categoryScheme) : MediaInterface
    {
        $this->categoryScheme = $categoryScheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getHash() : ?string
    {
        return $this->hash;
    }

    /**
     * @param  string $hash
     * @return MediaInterface
     */
    public function setHash(?string $hash) : MediaInterface
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return int
     */
    public function getHashAlgo() : ?int
    {
        return $this->hashAlgo;
    }

    /**
     * @param  int $hashAlgo
     * @return MediaInterface
     */
    public function setHashAlgo(?int $hashAlgo) : MediaInterface
    {
        $this->hashAlgo = $hashAlgo;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlayerUrl() : ?string
    {
        return $this->playerUrl;
    }

    /**
     * @param  string $playerUrl
     * @return MediaInterface
     */
    public function setPlayerUrl(?string $playerUrl) : MediaInterface
    {
        $this->playerUrl = $playerUrl;

        return $this;
    }

    /**
     * @return int
     */
    public function getPlayerWidth() : ?int
    {
        return $this->playerWidth;
    }

    /**
     * @param  int $playerWidth
     * @return MediaInterface
     */
    public function setPlayerWidth(?int $playerWidth) : MediaInterface
    {
        $this->playerWidth = $playerWidth;

        return $this;
    }

    /**
     * @return int
     */
    public function getPlayerHeight() : ?int
    {
        return $this->playerHeight;
    }

    /**
     * @param  int $playerHeight
     * @return MediaInterface
     */
    public function setPlayerHeight(?int $playerHeight) : MediaInterface
    {
        $this->playerHeight = $playerHeight;

        return $this;
    }

    /**
     * @return string
     */
    public function getCopyright() : ?string
    {
        return $this->copyright;
    }

    /**
     * @param  string $copyright
     * @return MediaInterface
     */
    public function setCopyright(?string $copyright) : MediaInterface
    {
        $this->copyright = $copyright;

        return $this;
    }

    /**
     * @return string
     */
    public function getCopyrightUrl() : ?string
    {
        return $this->copyrightUrl;
    }

    /**
     * @param  string $copyrightUrl
     * @return MediaInterface
     */
    public function setCopyrightUrl(?string $copyrightUrl) : MediaInterface
    {
        $this->copyrightUrl = $copyrightUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getRestriction() : ?string
    {
        return $this->restriction;
    }

    /**
     * @param  string $restriction
     * @return MediaInterface
     */
    public function setRestriction(?string $restriction) : MediaInterface
    {
        $this->restriction = $restriction;

        return $this;
    }


    /**
     * @return int
     */
    public function getRestrictionType() : ?int
    {
        return $this->restrictionType;
    }

    /**
     * @param  int $restrictionType
     * @return MediaInterface
     */
    public function setRestrictionType(?int $restrictionType) : MediaInterface
    {
        $this->restrictionType = $restrictionType;

        return $this;
    }

    /**
     * @return int
     */
    public function getRestrictionRelationship() : ?int
    {
        return $this->restrictionRelationship;
    }

    /**
     * @param  int $restrictionRelationship
     * @return MediaInterface
     */
    public function setRestrictionRelationship(?int $restrictionRelationship) : MediaInterface
    {
        $this->restrictionRelationship = $restrictionRelationship;

        return $this;
    }

    /**
     * @return float
     */
    public function getStarRatingAverage() : ?float
    {
        return $this->starRatingAverage;
    }

    /**
     * @param  float $starRatingAverage
     * @return MediaInterface
     */
    public function setStarRatingAverage(?float $starRatingAverage) : MediaInterface
    {
        $this->starRatingAverage = $starRatingAverage;

        return $this;
    }

    /**
     * @return int
     */
    public function getStarRatingCount() : ?int
    {
        return $this->starRatingCount;
    }

    /**
     * @param  int $starRatingCount
     * @return MediaInterface
     */
    public function setStarRatingCount(?int $starRatingCount) : MediaInterface
    {
        $this->starRatingCount = $starRatingCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getStarRatingMin() : ?int
    {
        return $this->starRatingMin;
    }

    /**
     * @param  int $starRatingMin
     * @return MediaInterface
     */
    public function setStarRatingMin(?int $starRatingMin) : MediaInterface
    {
        $this->starRatingMin = $starRatingMin;

        return $this;
    }

    /**
     * @return int
     */
    public function getStarRatingMax() : ?int
    {
        return $this->starRatingMax;
    }

    /**
     * @param  int $starRatingMax
     * @return MediaInterface
     */
    public function setStarRatingMax(?int $starRatingMax) : MediaInterface
    {
        $this->starRatingMax = $starRatingMax;

        return $this;
    }

    /**
     * @return int
     */
    public function getNbViews() : ?int
    {
        return $this->nbViews;
    }

    /**
     * @param  int $nbViews
     * @return MediaInterface
     */
    public function setNbViews(?int $nbViews) : MediaInterface
    {
        $this->nbViews = $nbViews;

        return $this;
    }

    /**
     * @return int
     */
    public function getNbFavorites() : ?int
    {
        return $this->nbFavorites;
    }

    /**
     * @param  int $nbFavorites
     * @return MediaInterface
     */
    public function setNbFavorites(?int $nbFavorites) : MediaInterface
    {
        $this->nbFavorites = $nbFavorites;

        return $this;
    }

    /**
     * @return array
     */
    public function getTags() : array
    {
        return $this->tags;
    }

    /**
     * @param  array $tags
     * @return MediaInterface
     */
    public function setTags(array $tags) : MediaInterface
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return array
     */
    public function getComments() : array
    {
        return $this->comments;
    }

    /**
     * @param  array $comments
     * @return MediaInterface
     */
    public function setComments(array $comments) : MediaInterface
    {
        $this->comments = $comments;

        return $this;
    }


    /**
     * @return string
     */
    public function getEmbedUrl() : ?string
    {
        return $this->embedUrl;
    }

    /**
     * @param  string $embedUrl
     * @return MediaInterface
     */
    public function setEmbedUrl(?string $embedUrl) : MediaInterface
    {
        $this->embedUrl = $embedUrl;

        return $this;
    }

    /**
     * @return int
     */
    public function getEmbedWidth() : ?int
    {
        return $this->embedWidth;
    }

    /**
     * @param  int $embedWidth
     * @return MediaInterface
     */
    public function setEmbedWidth(?int $embedWidth) : MediaInterface
    {
        $this->embedWidth = $embedWidth;

        return $this;
    }

    /**
     * @return int
     */
    public function getEmbedHeight() : ?int
    {
        return $this->embedHeight;
    }

    /**
     * @param  int $embedHeight
     * @return MediaInterface
     */
    public function setEmbedHeight(?int $embedHeight) : MediaInterface
    {
        $this->embedHeight = $embedHeight;

        return $this;
    }

    /**
     * @return array
     */
    public function getEmbedParams() : array
    {
        return $this->embedParams;
    }

    /**
     * @param  array $embedParams
     * @return MediaInterface
     */
    public function setEmbedParams(array $embedParams) : MediaInterface
    {
        $this->embedParams = $embedParams;

        return $this;
    }

    /**
     * @return array
     */
    public function getResponses() : array
    {
        return $this->responses;
    }

    /**
     * @param  array $responses
     * @return MediaInterface
     */
    public function setResponses(array $responses) : MediaInterface
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * @return array
     */
    public function getBacklinks() : array
    {
        return $this->backlinks;
    }

    /**
     * @param  array $backlinks
     * @return MediaInterface
     */
    public function setBacklinks(array $backlinks) : MediaInterface
    {
        $this->backlinks = $backlinks;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus() : ?int
    {
        return $this->status;
    }

    /**
     * @param  int $status
     * @return MediaInterface
     */
    public function setStatus(?int $status) : MediaInterface
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatusReason() : ?string
    {
        return $this->statusReason;
    }

    /**
     * @param  string $statusReason
     * @return MediaInterface
     */
    public function setStatusReason(?string $statusReason) : MediaInterface
    {
        $this->statusReason = $statusReason;

        return $this;
    }

    /**
     * @return string
     */
    public function getLicense() : ?string
    {
        return $this->license;
    }

    /**
     * @param  string $license
     * @return MediaInterface
     */
    public function setLicense(?string $license) : MediaInterface
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return string
     */
    public function getLicenseUrl() : ?string
    {
        return $this->licenseUrl;
    }

    /**
     * @param  string $licenseUrl
     * @return MediaInterface
     */
    public function setLicenseUrl(?string $licenseUrl) : MediaInterface
    {
        $this->licenseUrl = $licenseUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getLicenseType() : ?string
    {
        return $this->licenseType;
    }

    /**
     * @param  string $licenseType
     * @return MediaInterface
     */
    public function setLicenseType(?string $licenseType) : MediaInterface
    {
        $this->licenseType = $licenseType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeerLink() : ?string
    {
        return $this->peerLink;
    }

    /**
     * @param  string $peerLink
     * @return MediaInterface
     */
    public function setPeerLink(?string $peerLink) : MediaInterface
    {
        $this->peerLink = $peerLink;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeerLinkType() : ?string
    {
        return $this->peerLinkType;
    }

    /**
     * @param  string $peerLinkType
     * @return MediaInterface
     */
    public function setPeerLinkType(?string $peerLinkType) : MediaInterface
    {
        $this->peerLinkType = $peerLinkType;

        return $this;
    }

    /**
     * @return array
     */
    public function getCredits() : array
    {
        return $this->credits;
    }

    /**
     * @param  array $credits
     * @return MediaInterface
     */
    public function setCredits(array $credits) : MediaInterface
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * @return array
     */
    public function getTexts() : array
    {
        return $this->texts;
    }

    /**
     * @param  array $texts
     * @return MediaInterface
     */
    public function setTexts(array $texts) : MediaInterface
    {
        $this->texts = $texts;

        return $this;
    }

    /**
     * @return array
     */
    public function getPrices() : array
    {
        return $this->prices;
    }

    /**
     * @param  array $prices
     * @return MediaInterface
     */
    public function setPrices(array $prices) : MediaInterface
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * @return array
     */
    public function getSubTitles() : array
    {
        return $this->subTitles;
    }

    /**
     * @param  array $subTitles
     * @return MediaInterface
     */
    public function setSubTitles(array $subTitles) : MediaInterface
    {
        $this->subTitles = $subTitles;

        return $this;
    }

    /**
     * @return array
     */
    public function getScenes() : array
    {
        return $this->scenes;
    }

    /**
     * @param  array $scenes
     * @return MediaInterface
     */
    public function setScenes(array $scenes) : MediaInterface
    {
        $this->scenes = $scenes;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault() : bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return MediaInterface
     */
    public function setDefault(bool $default) : MediaInterface
    {
        $this->default = $default;

        return $this;
    }
}
