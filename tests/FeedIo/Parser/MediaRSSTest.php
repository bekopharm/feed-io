<?php
/*
 * This file is part of the feed-io package.
 *
 * (c) Alexandre Debril <alex.debril@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FeedIo\Parser;

use FeedIo\Feed;
use FeedIo\Parser\XmlParser as Parser;
use FeedIo\Reader\Document;
use FeedIo\Rule\DateTimeBuilder;
use FeedIo\Standard\Atom;
use FeedIo\Standard\Rss;
use Psr\Log\NullLogger;

use \PHPUnit\Framework\TestCase;

class MediaRssTest extends TestCase
{
    const SAMPLE_FILE = 'rss/sample-youtube.xml';

    /**
     * @param $filename
     * @return Document
     */
    protected function buildDomDocumentFromFile($filename)
    {
        $file = dirname(__FILE__)."/../../samples/{$filename}";
        $domDocument = new \DOMDocument();
        $domDocument->load($file, LIBXML_NOBLANKS | LIBXML_COMPACT);

        return new Document($domDocument->saveXML());
    }

    public function testYoutubeFeed()
    {
        $document = $this->buildDomDocumentFromFile(static::SAMPLE_FILE);
        $standard = new Atom(new DateTimeBuilder());
        $parser = new Parser($standard, new NullLogger());
        $feed = $parser->parse($document, new Feed());

        $this->assertEquals(1, count($feed));
        foreach ($feed as $item) {
            $this->assertTrue($item->hasMedia());
            $media = $item->getMedias()->current();
            $this->assertInstanceOf('\FeedIo\Feed\Item\MediaInterface', $media);

            $this->assertEquals('YT_VIDEO_TITLE', $media->getTitle());
            $this->assertEquals('https://i2.ytimg.com/vi/YT_VIDEO_ID/hqdefault.jpg', $media->getThumbnail());
            $this->assertEquals("This is a\nmultiline\ndescription", $media->getDescription());
            $this->assertEquals('https://www.youtube.com/v/YT_VIDEO_ID?version=3', $media->getUrl());
        }
    }

    protected function buildDomDocumentFromXML($xml)
    {
        $document = new Document($xml);
        $standard = new Rss(new DateTimeBuilder());
        $parser = new Parser($standard, new NullLogger());
        $feed = $parser->parse($document, new Feed());
        return $feed;
    }
    /**
     * From http://www.rssboard.org/media-rss#optional-elements
     *
     * Duplicated elements appearing at deeper levels of the document tree
     * have higher priority over other levels. For example, <media:content>
     * level elements are favored over <item> level elements. The priority
     * level is listed from strongest to weakest:
     * <media:content>, <media:group>, <item>, <channel>.
     */
    public function testTagsPriority()
    {
        $xml_media_content_description = '
            <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
                <channel>
                    <title>Title of page</title>
                    <link>http://www.foo.com</link>
                    <description>Description of page</description>
                    <item>
                        <title>Story about something</title>
                        <link>http://www.foo.com/item1.htm</link>
                        <media:group>
                            <media:content url="http://www.foo.com/trailer.ogg">
                                <media:description>Description from media:content</media:description>
                            </media:content>
                            <media:description>Description from media:group</media:description>
                        </media:group>
                        <media:description>Description from item</media:description>
                    </item>
                    <media:description>Description from channel</media:description>
                </channel>
            </rss>';

        $feed_media_content_description = $this->buildDomDocumentFromXML($xml_media_content_description);
        foreach ($feed_media_content_description as $item) {
            $media = $item->getMedias()->current();
            $this->assertEquals('Description from media:content', $media->getDescription());
        }

        $xml_media_group_description = '
            <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
                <channel>
                    <title>Title of page</title>
                    <link>http://www.foo.com</link>
                    <description>Description of page</description>
                    <item>
                        <title>Story about something</title>
                        <link>http://www.foo.com/item1.htm</link>
                        <media:group>
                            <media:content url="http://www.foo.com/trailer.ogg" />
                            <media:description>Description from media:group</media:description>
                        </media:group>
                        <media:description>Description from item</media:description>
                    </item>
                    <media:description>Description from channel</media:description>
                </channel>
            </rss>';

        $feed_media_group_description = $this->buildDomDocumentFromXML($xml_media_group_description);
        foreach ($feed_media_group_description as $item) {
            $media = $item->getMedias()->current();
            $this->assertEquals('Description from media:group', $media->getDescription());
        }

        $xml_item_description = '
            <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
                <channel>
                    <title>Title of page</title>
                    <link>http://www.foo.com</link>
                    <description>Description of page</description>
                    <item>
                        <title>Story about something</title>
                        <link>http://www.foo.com/item1.htm</link>
                        <media:group>
                            <media:content url="http://www.foo.com/trailer.ogg" />
                        </media:group>
                        <media:description>Description from item</media:description>
                    </item>
                    <media:description>Description from channel</media:description>
                </channel>
            </rss>';

        $feed_item_description = $this->buildDomDocumentFromXML($xml_item_description);
        foreach ($feed_item_description as $item) {
            $media = $item->getMedias()->current();
            $this->assertEquals('Description from item', $media->getDescription());
        }

        $xml_channel_description = '
            <rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/">
                <channel>
                    <title>Title of page</title>
                    <link>http://www.foo.com</link>
                    <description>Description of page</description>
                    <item>
                        <title>Story about something</title>
                        <link>http://www.foo.com/item1.htm</link>
                        <media:group>
                            <media:content url="http://www.foo.com/trailer.ogg" />
                        </media:group>
                    </item>
                    <media:description>Description from channel</media:description>
                </channel>
            </rss>';

        $feed_channel_description = $this->buildDomDocumentFromXML($xml_channel_description);
        foreach ($feed_channel_description as $item) {
            $media = $item->getMedias()->current();
            $this->assertEquals('Description from channel', $media->getDescription());
        }
    }
}
