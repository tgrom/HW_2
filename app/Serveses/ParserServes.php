<?php
declare(strict_types=1);

namespace App\Serveses;

use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Contracts\Parser;

class ParserServes implements Parser
{
    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }

    //public function getNews(): array

    // тут тоже переименовыем getNews в saveNews

    public function saveNews():void
    {
        $xml = XmlParser::load($this->url);

        //вместо  return $xml->parse возвращаем массив

        $data =  $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);
        $json = json_encode($data);
        $e = explode("/", $this->url);
        $fileName = end($e);

        Storage::append('news/' . $fileName, $json);
    }
}
