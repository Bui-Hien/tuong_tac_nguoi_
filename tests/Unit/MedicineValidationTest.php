<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MedicineValidationTest extends TestCase
{
    use RefreshDatabase;

    // ===========================
    // Kiểm thử cho trường 'name'
    // ===========================

    // /** @test */
    // public function test_name_is_required()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => '',  // Tên trống
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['name' => 'Tên thuốc không được để trống.']);
    // }

    // /** @test */
    // public function test_name_cannot_exceed_255_characters()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => str_repeat('A', 256),  // Tên vượt quá 255 ký tự
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['name' => 'Tên thuốc không được vượt quá 255 ký tự.']);
    // }

    // /** @test */
    // public function test_name_must_not_contain_special_characters()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracet@mol!',  // Tên chứa ký tự đặc biệt
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['name' => 'Tên thuốc không được chứa ký tự đặc biệt, vui lòng nhập lại.']);
    // }

    // /** @test */
    // public function test_name_is_valid()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',  // Tên hợp lệ
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasNoErrors();
    // }

   
    // Kiểm thử cho trường 'cost'
    // ===========================

    // /** @test */
    // public function test_cost_is_required()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => '',  
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['cost' => 'Giá tiền không được để trống.']);
    // }

    // /** @test */
    // public function test_cost_must_be_numeric()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 'abc',  
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['cost' => 'Giá phải là số.']);
    // }

    // /** @test */
    // public function test_cost_must_be_at_least_1000()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 500,  
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['cost' => 'Giá phải lớn hơn hoặc bằng 1000.']);
    // }

    // /** @test */
    // public function test_cost_must_be_less_than_maximum()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 100000000,  
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['cost' => 'Giá không được vượt quá giới hạn.']);
    // }

    // /** @test */
    // public function test_cost_is_valid()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,  
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasNoErrors();
    // }

    // // ===========================
    // // Kiểm thử cho trường 'type'
    // // ===========================

    // /** @test */
    // public function test_type_is_required()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => '',  ~
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['type' => 'Loại thuốc không được để trống.']);
    // }

    // /** @test */
    // public function test_type_cannot_exceed_255_characters()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => str_repeat('thuoc', 266),  
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['type' => 'Loại thuốc không được vượt quá 255 ký tự.']);
    // }

    // /** @test */
    // public function test_type_must_not_contain_special_characters()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'thuo&&*^**@', 
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['type' => 'loại thuốc không được chứa ký tự đặc biệt, vui lòng nhập lại.']);
    // }

    // /** @test */
    // public function test_type_is_valid()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'thuocbo',  
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasNoErrors();
    // }

    // ===========================
    // Kiểm thử cho trường 'status'
    // ===========================

    // /** @test */
    // public function test_status_is_required()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => '',  // Trạng thái trống
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['status' => 'Trạng thái không được để trống.']);
    // }

    // /** @test */
    // public function test_status_is_valid()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1, 
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasNoErrors();
    // }

    // // ===========================
    // // Kiểm thử cho trường 'manufacture_date'
    // // ===========================

    // /** @test */
    // public function test_manufacture_date_is_required()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => '',  // Ngày sản xuất trống
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['manufacture_date' => 'Ngày sản xuất không được để trống.']);
    // }

    // /** @test */
    // public function test_manufacture_date_must_be_a_valid_date()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => 'not-a-date',  
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasErrors(['manufacture_date' => 'Ngày sản xuất không đúng định dạng.']);
    // }

    // /** @test */
    // public function test_manufacture_date_is_valid()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),  
    //         'expiry_date' => now()->addMonth()->toDateString(),
    //     ]);

    //     $response->assertSessionHasNoErrors();
    // }

    // // ===========================
    // // Kiểm thử cho trường 'expiry_date'
    // // ===========================

    /** @test */
    // public function test_expiry_date_is_required()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => '',  
    //     ]);

    //     $response->assertSessionHasErrors(['expiry_date' => 'Hạn sử dụng không được để trống.']);
    // }

    // /** @test */
    // public function test_expiry_date_must_be_a_valid_date()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => 'not-a-date', 
    //     ]);

    //     $response->assertSessionHasErrors(['expiry_date' => 'Hạn sử dụng không đúng định dạng.']);
    // }

    // /** @test */
    // public function test_expiry_date_must_be_after_manufacture_date()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->toDateString(),
    //         'expiry_date' => now()->subDay()->toDateString(), 
    //     ]);

    //     $response->assertSessionHasErrors(['expiry_date' => 'Hạn sử dụng thuốc phải nhập sau ngày sản xuất.']);
    // }

    // /** @test */
    // public function test_expiry_date_is_valid()
    // {
    //     $response = $this->post('/medicines/store', [
    //         'name' => 'Paracetamol',
    //         'cost' => 2000,
    //         'type' => 'Thuốc bổ',
    //         'status' => 1,
    //         'manufacture_date' => now()->subMonth()->toDateString(),
    //         'expiry_date' => now()->addMonth()->toDateString(), 
    //     ]);

    //     $response->assertSessionHasNoErrors();
    // }

    //  so luong 
    /** @test */
public function test_quantity_is_required()
{
    $response = $this->post('/medicines/store', [
        'name' => 'Paracetamol',
        'cost' => 2000,
        'type' => ' thuocbo',
        'status' => 1,
        'manufacture_date' => now()->subMonth()->toDateString(),
        'expiry_date' => now()->addMonth()->toDateString(),
        'so_luong' => '', 
    ]);

    $response->assertSessionHasErrors(['so_luong' => 'Số lượng không được để trống.']);
}

/** @test */
public function test_quantity_must_be_positive()
{
    $response = $this->post('/medicines/store', [
        'name' => 'Paracetamol',
        'cost' => 2000,
        'type' => 'thuoc',
        'status' => 1,
        'manufacture_date' => now()->subMonth()->toDateString(),
        'expiry_date' => now()->addMonth()->toDateString(),
        'so_luong' => -5,  
    ]);

    $response->assertSessionHasErrors(['so_luong' => 'Số lượng phải là số dương, vui lòng nhập lại.']);
}

/** @test */
public function test_quantity_must_not_have_special_characters()
{
    $response = $this->post('/medicines/store', [
        'name' => 'Paracetamol',
        'cost' => 2000,
        'type' => 'Thuoc',
        'status' => 1,
        'manufacture_date' => now()->subMonth()->toDateString(),
        'expiry_date' => now()->addMonth()->toDateString(),
        'so_luong' => '100$%%',  
    ]);

    $response->assertSessionHasErrors(['so_luong' => 'Số lượng không được chứa ký tự đặc biệt, vui lòng nhập lại.']);
}

/** @test */
public function test_quantity_must_not_exceed_eight_digits()
{
    $response = $this->post('/medicines/store', [
        'name' => 'Paracetamol',
        'cost' => 2000,
        'type' => 'Thuoc',
        'status' => 1,
        'manufacture_date' => now()->subMonth()->toDateString(),
        'expiry_date' => now()->addMonth()->toDateString(),
        'so_luong' => 10000000000000,  
    ]);

    $response->assertSessionHasErrors(['so_luong' => 'Số lượng đã nhập quá giới hạn, vui lòng nhập lại.']);
}

/** @test */
public function test_valid_quantity_is_accepted()
{
    $response = $this->post('/medicines/store', [
        'name' => 'Paracetamol',
        'cost' => 2000,
        'type' => 'Thuuoc',
        'status' => 1,
        'manufacture_date' => now()->subMonth()->toDateString(),
        'expiry_date' => now()->addMonth()->toDateString(),
        'so_luong' => 500,  
    ]);

    $response->assertSessionHasNoErrors();
}

}
