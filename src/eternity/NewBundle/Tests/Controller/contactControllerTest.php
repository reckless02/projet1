<?php

namespace eternity\NewBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class contactControllerTest extends WebTestCase
{
    public function testContact()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'yes');
    }

}
