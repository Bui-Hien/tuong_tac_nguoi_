<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedicineValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_name_is_required()
    {
        $response = $this->post('/employees/medicines', [
            'name' => '',  
            'cost' => 2000,
            'type' => 'Thuốc bổ',
            'status' => 1,
            'manufacture_date' => now()->subMonth()->toDateString(),
            'expiry_date' => now()->addMonth()->toDateString(),
        ]);

        $response->assertSessionHasErrors(['name' => 'Tên thuốc không được để trống.']);
    }

    /** @test */
    public function test_name_cannot_exceed_255_characters()
    {
        $response = $this->post('/employees/medicines', [
            'name' => str_repeat('A', 266), 
            'cost' => 2000,
            'type' => 'Thuốc bổ',
            'status' => 1,
            'manufacture_date' => now()->subMonth()->toDateString(),
            'expiry_date' => now()->addMonth()->toDateString(),
        ]);

        $response->assertSessionHasErrors(['name' => 'Tên thuốc không được vượt quá 255 ký tự.']);
    }

    /** @test */
    public function test_name_must_not_contain_special_characters()
    {
        $response = $this->post('/employees/medicines', [
            'name' => 'bichmo@!@@', 
            'cost' => 2000,
            'type' => 'Thuốc bổ',
            'status' => 1,
            'manufacture_date' => now()->subMonth()->toDateString(),
            'expiry_date' => now()->addMonth()->toDateString(),
        ]);

        $response->assertSessionHasErrors(['name' => 'Tên thuốc không được chứa ký tự đặc biệt, vui lòng nhập lại.']);
    }

    /** @test */
    public function test_valid_data_is_accepted()
    {
        $response = $this->post('/employees/medicines', [
            'name' => 'Paracetamol',
            'cost' => 2000,  
            'type' => 'Thuốc bổ',  
            'status' => 1,  
            'manufacture_date' => now()->subMonth()->toDateString(),  
            'expiry_date' => now()->addMonth()->toDateString(), 
        ]);

        $response->assertSessionHasNoErrors();

        $response->assertStatus(200); // hoặc có thể là assertStatus(302) nếu có redirect

        $this->assertDatabaseHas('medicines', [
            'name' => 'Paracetamol',
            'cost' => 2000,
            'type' => 'Thuốc bổ',
            'status' => 1,
        ]);
    }
}
