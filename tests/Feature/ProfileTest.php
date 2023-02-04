<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $student = Student::factory()->create();

        $response = $this
            ->actingAs($student)
            ->get('/profile');

        $response->assertOk();
    }

    // TODO - to fix
//    public function test_profile_information_can_be_updated(): void
//    {
//        $student = Student::factory()->create();
//
//        $response = $this
//            ->actingAs($student)
//            ->patch('/profile', [
//                'nickname' => 'Test User',
//                'email' => 'test@example.com',
//            ]);
//
//        $response
//            ->assertSessionHasNoErrors()
//            ->assertRedirect('/profile');
//
//        $student->refresh();
//
//        $this->assertSame('Test User', $student->nickname);
//        $this->assertSame('test@example.com', $student->email);
//        $this->assertNull($student->email_verified_at);
//    }
//
    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $student = Student::factory()->create();

        $response = $this
            ->actingAs($student)
            ->patch('/profile', [
                'nickname' => 'Test User',
                'email' => $student->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertNotNull($student->refresh()->email_verified_at);
    }

    // TODO - to fix
//    public function test_student_can_delete_their_account(): void
//    {
//        $student = Student::factory()->create();
//
//        $response = $this
//            ->actingAs($student)
//            ->delete('/profile', [
//                'password' => 'password',
//            ]);
//
//        $response
//            ->assertSessionHasNoErrors()
//            ->assertRedirect('/');
//
//        $this->assertGuest();
//        $this->assertNull($student->fresh());
//    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $student = Student::factory()->create();

        $response = $this
            ->actingAs($student)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($student->fresh());
    }
}
