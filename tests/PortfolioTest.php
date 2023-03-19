<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class PortfolioTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/portfolio');

        $this->assertSelectorTextContains('h1', 'Portfolio index');
    }


    public function testButtonClick()
    {
        $client = static::createPantherClient();
        $client->request('GET', '/portfolio');
        $button = $client->getCrawler()->filter('.btn')->first();
        $button->click();
        $newUrl = $client->getCurrentURL();
        $this->assertNotEquals('/portfolio/new', $newUrl);
    }
}
