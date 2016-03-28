<?php
namespace App\Test\TestCase\Controller;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\IntegrationTestCase;

class TeamsControllerTest extends IntegrationTestCase
{
    public $fixtures = ['app.team'];

    public function testIndex()
    {
        $this->get('/teams');

        $this->assertResponseOk();
        // More asserts.
    }

    public function testIndexQueryData()
    {
        $this->get('/teams?page=1');

        $this->assertResponseOk();
        // More asserts.
    }

    public function testIndexShort()
    {
        $this->get('/teams/index/short');

        $this->assertResponseOk();
        $this->assertResponseContains('Teams');
        // More asserts.
    }

    public function testIndexPostData()
    {
        $data = [
            'user_id' => 1,
            'published' => 1,
            'slug' => 'new-article',
            'title' => 'New Article',
            'body' => 'New Body'
        ];
        $this->post('/teams', $data);

        $this->assertResponseSuccess();
        $teams = TableRegistry::get('Teams');
        $query = $teams->find()->where(['title' => $data['title']]);
        $this->assertEquals(1, $query->count());
    }
}
