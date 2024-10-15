<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentValidationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    // public function test_name_is_required()
    // {
    //     $response = $this->post('/customers', [ 
    //         'name' => '', // Trường hợp name trống
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(),
    //         'service' => 'vaccination'
    //     ]);

    //     $response->assertSessionHasErrors(['name' => 'Họ tên không được để trống.']);
    // }

    // /** @test */
    // public function test_name_cannot_exceed_70_characters()
    // {
    //     $response = $this->post('/customers', [ 
    //         'name' => str_repeat('A', 79), // Vượt quá 70 ký tự
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(),
    //         'service' => 'vaccination'
    //     ]);

    //     $response->assertSessionHasErrors(['name' => 'Họ tên nhập vượt quá 70 ký tự, vui lòng nhập lại.']);
    // }

    // /** @test */
    // public function test_name_must_not_contain_special_characters()
    // {
    //     $response = $this->post('/customers', [ 
    //         'name' => 'John@@@@Doe', // Chứa ký tự đặc biệt
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(),
    //         'service' => 'vaccination'
    //     ]);

    //     $response->assertSessionHasErrors(['name' => 'Họ tên không được chứa ký tự đặc biệt, vui lòng nhập lại.']);
    // }

    // /** @test */
    // public function test_name_is_valid()
    // {
    //     $response = $this->post('/customers', [ 
    //         'name' => 'JohnDoe', // Dữ liệu hợp lệ
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(),
    //         'service' => 'vaccination'
    //     ]);

    //     $response->assertSessionDoesntHaveErrors(['name']);
    // }


        // /** @test */
        // public function test_phone_is_required()
        // {
        //     $response = $this->post('/customers', [
        //         'name' => 'John Doe',
        //         'phone' => '', // Trường hợp phone trống
        //         'date' => now()->addDay()->toDateString(),
        //         'service' => 'Vaccination'
        //     ]);
    
        //     $response->assertSessionHasErrors(['phone' => 'Số điện thoại không được để trống.']);
        // }
    
        // /** @test */
        // public function test_phone_must_be_numeric()
        // {
        //     $response = $this->post('/customers', [
        //         'name' => 'John Doe',
        //         'phone' => 'abcdef', // Phone không phải số
        //         'date' => now()->addDay()->toDateString(),
        //         'service' => 'Vaccination'
        //     ]);
    
        //     $response->assertSessionHasErrors(['phone' => 'Số điện thoại phải là số nguyên dương và đúng định dạng.']);
        // }
    
        // /** @test */
        // public function test_phone_must_be_10_to_11_digits()
        // {
        //     $response = $this->post('/customers', [
        //         'name' => 'John Doe',
        //         'phone' => '12345', // Phone không đủ chữ số
        //         'date' => now()->addDay()->toDateString(),
        //         'service' => 'Vaccination'
        //     ]);
    
        //     $response->assertSessionHasErrors(['phone' => 'Số điện thoại phải trong khoảng từ 10 đến 11 chữ số.']);
        // }
    
        // /** @test */
        // public function test_phone_is_valid()
        // {
        //     $response = $this->post('/customers', [
        //         'name' => 'John Doe',
        //         'phone' => '0912345678', // Phone hợp lệ
        //         'date' => now()->addDay()->toDateString(),
        //         'service' => 'Vaccination'
        //     ]);
    
        //     $response->assertSessionDoesntHaveErrors(['phone']);
        // }
    //         /** @test */
    // public function test_date_is_required()
    // {
    //     $response = $this->post('/customers', [
    //         'name' => 'John Doe',
    //         'phone' => '0912345678',
    //         'date' => '', // Trường hợp date trống
    //         'service' => 'Vaccination'
    //     ]);

    //     $response->assertSessionHasErrors(['date' => 'Ngày đặt lịch không được để trống.']);
    // }

    // /** @test */
    // public function test_date_must_be_in_future()
    // {
    //     $response = $this->post('/customers', [
    //         'name' => 'John Doe',
    //         'phone' => '0912345678',
    //         'date' => now()->subDay()->toDateString(), // Date trong quá khứ
    //         'service' => 'Vaccination'
    //     ]);

    //     $response->assertSessionHasErrors(['date' => 'Ngày đặt lịch phải sau ngày hiện tại.']);
    // }

    // /** @test */
    // public function test_date_is_valid()
    // {
    //     $response = $this->post('/customers', [
    //         'name' => 'John Doe',
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(), // Date hợp lệ
    //         'service' => 'Vaccination'
    //     ]);

    //     $response->assertSessionDoesntHaveErrors(['date']);
    // }
    /** @test */
    // public function test_service_is_required()
    // {
    //     $response = $this->post('/customers', [
    //         'name' => 'John Doe',
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(),
    //         'service' => '', // Trường hợp service trống
    //     ]);

    //     $response->assertSessionHasErrors(['service' => 'Dịch vụ không được để trống.']);
    // }

    // /** @test */
    // public function test_service_is_valid()
    // {
    //     $response = $this->post('/customers', [
    //         'name' => 'John Doe',
    //         'phone' => '0912345678',
    //         'date' => now()->addDay()->toDateString(),
    //         'service' => 'Vaccination', // Service hợp lệ
    //     ]);

    //     $response->assertSessionDoesntHaveErrors(['service']);
    // }

    
}

