<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenantNames = ['badaris'];
        $domain = parse_url(env('APP_URL'), PHP_URL_HOST);
        foreach ($tenantNames as $tenantName) {

            $tenant = Tenant::factory()->create([
                'id' => $tenantName,
            ]);

            $tenant->domains()->create(['domain' => $tenantName.'.'.$domain]);
        }


        // Now we'll create a user inside each tenant's database:

        Tenant::all()->runForEach(function () {
            User::factory()->create();
        });
    }
}
