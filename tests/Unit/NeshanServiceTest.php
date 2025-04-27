<?php

namespace Tests\Unit;

use App\Services\NeshanService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class NeshanServiceTest extends TestCase
{
    /** @test */
    public function it_can_get_location_info_from_neshan_api()
    {
        //Mock
        Http::fake([
            'https://api.neshan.org/v5/reverse' => Http::response([
                'status' => 'OK',
                'neighbourhood' => 'دانشجو',
                'municipality_zone' => '11',
                'state' => 'استان خراسان رضوی',
                'city' => 'مشهد',
                'formatted_address' => 'مشهد، بلوار دانشجو، بعد از بلوار فرهنگ',
            ], 200),
        ]);
        $neshanService = app(NeshanService::class);

        //get location details
        $result = $neshanService->getLocationInfo(36.33068504194033, 59.502822690225045);

        $this->assertEquals('دانشجو', $result['neighbourhood']);
        $this->assertEquals('مشهد', $result['city']);
        $this->assertEquals('استان خراسان رضوی', $result['state']);
        $this->assertEquals('مشهد، بلوار دانشجو، بعد از بلوار فرهنگ', $result['formatted_address']);
    }

    /** @test */
    public function it_can_save_location_info_to_file()
    {
        // Mock
        Http::fake([
            'https://api.neshan.org/v5/reverse' => Http::response([
                'status' => 'OK',
                'neighbourhood' => 'دانشجو',
                'municipality_zone' => '11',
                'state' => 'استان خراسان رضوی',
                'city' => 'مشهد',
                'formatted_address' => 'مشهد، بلوار دانشجو، بعد از بلوار فرهنگ',
            ], 200),
        ]);

        $neshanService = app(NeshanService::class);

        //get location
        $result = $neshanService->getLocationInfo(36.33068504194033, 59.502822690225045);

        //exist  output.json  ?
        $this->assertFileExists(storage_path('app/output.json'));

        //is content  correct ?
        $outputFile = file_get_contents(storage_path('app/output.json'));
        $this->assertStringContainsString('دانشجو', $outputFile);
        $this->assertStringContainsString('مشهد', $outputFile);
        $this->assertStringContainsString('استان خراسان رضوی', $outputFile);
    }
}
