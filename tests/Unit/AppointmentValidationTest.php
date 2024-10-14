<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentValidationTest extends TestCase
{
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    /** @test */
    public function test_name_is_required()
    {
        $response = $this->post('/appointments', [
            'name' => '', // Trường hợp name trống
            'phone' => '0912345678',
            'date' => now()->addDay()->toDateString(),
            'service' => 'Vaccination'
        ]);

        $response->assertSessionHasErrors(['name' => 'Vui lòng nhập họ tên.']);
    }

    /** @test */
    public function test_name_cannot_exceed_70_characters()
    {
        $response = $this->post('/appointments', [
            'name' => str_repeat('A', 71), // Vượt quá 70 ký tự
            'phone' => '0912345678',
            'date' => now()->addDay()->toDateString(),
            'service' => 'Vaccination'
        ]);

        $response->assertSessionHasErrors(['name' => 'Họ tên không được vượt quá 70 ký tự.']);
    }

    /** @test */
    public function test_name_must_not_contain_special_characters()
    {
        $response = $this->post('/appointments', [
            'name' => 'John @ Doe', // Chứa ký tự đặc biệt
            'phone' => '0912345678',
            'date' => now()->addDay()->toDateString(),
            'service' => 'Vaccination'
        ]);

        $response->assertSessionHasErrors(['name' => 'Họ tên chỉ được chứa các ký tự chữ cái và khoảng trắng.']);
    }

    /** @test */
    public function test_name_is_valid()
    {
        $response = $this->post('/appointments', [
            'name' => 'John Doe', // Dữ liệu hợp lệ
            'phone' => '0912345678',
            'date' => now()->addDay()->toDateString(),
            'service' => 'Vaccination'
        ]);

        $response->assertSessionDoesntHaveErrors(['name']);
    }
}


