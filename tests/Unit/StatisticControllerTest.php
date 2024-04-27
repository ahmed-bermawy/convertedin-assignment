<?php

namespace Tests\Unit;

use App\Http\Controllers\StatisticController;
use App\Repositories\StatisticRepository;
use Illuminate\View\View;
use Tests\TestCase;

class StatisticControllerTest extends TestCase
{

    private $statisticRepository;
    private $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->statisticRepository = $this->createMock(StatisticRepository::class);
        $this->controller = new StatisticController($this->statisticRepository);
    }
    /**
     * A basic feature test example.
     */
    public function testIndex(): void
    {
        $response = $this->get('/statistics');

        $response->assertStatus(200);
    }

    public function testIndexReturnsCorrectViewWithStatistics()
    {
        $statistics = ['user1' => 10, 'user2' => 9, 'user3' => 8];
        $this->statisticRepository->method('getTopTenUsersWithHighestTaskCount')->willReturn($statistics);

        $response = $this->controller->index();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('statistics.index', $response->name());
        $this->assertEquals($statistics, $response->getData()['statistics']);
    }

    public function testIndexReturnsEmptyArrayWhenNoStatistics()
    {
        $this->statisticRepository->method('getTopTenUsersWithHighestTaskCount')->willReturn([]);

        $response = $this->controller->index();

        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('statistics.index', $response->name());
        $this->assertEquals([], $response->getData()['statistics']);
    }
}
