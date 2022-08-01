<?php

namespace Tests\Unit;

use App\ZealPay\Repositories\Eloquent\BabyEloquentRepository;
use App\ZealPay\Repositories\Eloquent\UserEloquentRepository;
use App\ZealPay\Services\Baby\CreateBaby;
use App\ZealPay\Services\Baby\DeleteBaby;
use App\ZealPay\Services\Baby\IndexBaby;
use App\ZealPay\Services\Baby\ShowBaby;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BabyTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_baby()
    {
        $user = (new UserEloquentRepository())->factory()->create();
        $baby = (new CreateBaby())->store(new BabyEloquentRepository(), ['name' => 'faris', 'user_id' => $user->id]);
        self::assertInstanceOf(Model::class, $baby);
        self::assertEquals('faris', $baby->name);
    }

    public function test_show_baby()
    {
        $user = (new UserEloquentRepository())->factory()->create();
        $baby = (new CreateBaby())->store(new BabyEloquentRepository(), ['name' => 'faris', 'user_id' => $user->id]);
        self::assertInstanceOf(Model::class, $baby);
        self::assertEquals('faris', $baby->name);
        $showBaby = (new ShowBaby())->show($baby->id, new BabyEloquentRepository());
        self::assertInstanceOf(Model::class, $showBaby);
        self::assertEquals('faris', $showBaby->name);
    }

    public function test_index_baby()
    {
        $user = (new UserEloquentRepository())->factory()->create();
        $baby = (new CreateBaby())->store(new BabyEloquentRepository(), ['name' => 'faris', 'user_id' => $user->id]);
        self::assertInstanceOf(Model::class, $baby);
        self::assertEquals('faris', $baby->name);
        $user = (new IndexBaby())->index($user->id, new UserEloquentRepository());
        self::assertInstanceOf(Collection::class, $user->babies);
        self::assertEquals('faris', $user->babies->first()->name);
    }

    public function test_delete_baby()
    {
        $user = (new UserEloquentRepository())->factory()->create();
        $baby = (new CreateBaby())->store(new BabyEloquentRepository(), ['name' => 'faris', 'user_id' => $user->id]);
        self::assertInstanceOf(Model::class, $baby);
        self::assertEquals('faris', $baby->name);
        $deletedBaby = (new DeleteBaby())->delete($baby->id, new BabyEloquentRepository());
        self::assertIsBool($deletedBaby);
        self::assertEquals(true, $deletedBaby);

    }
}
