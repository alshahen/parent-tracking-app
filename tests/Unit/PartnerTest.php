<?php

namespace Tests\Unit;

use App\ZealPay\Repositories\Eloquent\UserEloquentRepository;
use App\ZealPay\Services\Partner\CreatePartner;
use App\ZealPay\Services\Partner\IndexPartner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PartnerTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_and_show_partner()
    {
        $user = (new UserEloquentRepository())->factory()->create();
        $partner = (new UserEloquentRepository())->factory()->create();
        (new CreatePartner())->store(new UserEloquentRepository(), ['user_id' => $user->id, 'partner_id' => $partner->id]);
        $partners = (new IndexPartner())->index($user->id, new UserEloquentRepository());
        self::assertInstanceOf(Model::class, $partners);
        self::assertEquals($partner->id, $partners->partners->first()->id);

    }
}
