<?php

namespace App\Containers\AppSection\Auth\UI\API\Tests\Functional;

use App\Containers\AppSection\Auth\Models\UserResetPasswordCode;
use App\Containers\AppSection\Auth\Tests\TestCase;
use App\Ship\Classes\PasswordGenerator;
use App\Ship\Parents\Support\Facades\Hash;
use App\Ship\Parents\Support\Str;
use Illuminate\Testing\TestResponse;

class ChangeTempPasswordTest extends TestCase
{
    private function visitRoute(array $data = []): TestResponse
    {
        return $this->postJson('api/v1/changeTempPassword', $data);
    }

    public function testCannotChangeTempPasswordWithoutUsername(): void
    {
        $password = PasswordGenerator::generateStrongPassword();
        $data = [
            'tmpPassword' => Str::random(8),
            'password' => $password,
            'confirmPassword' => $password
        ];

        $response = $this->visitRoute($data);

        $response->assertServerError();
    }

    public function testCannotChangeTempPasswordWithInvalidUsername(): void
    {
        $password = PasswordGenerator::generateStrongPassword();
        $data = [
            'username' => Str::random(8),
            'tmpPassword' => Str::random(8),
            'password' => $password,
            'confirmPassword' => $password
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['username' => 'The username must be a valid email address.']);
    }

    public function testCannotChangeTempPasswordWithInvalidStringTmpPassword(): void
    {
        $password = PasswordGenerator::generateStrongPassword();
        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => 555,
            'password' => $password,
            'confirmPassword' => $password
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['tmpPassword' => 'The tmp password must be a string.']);
    }

    public function testCannotChangeTempPasswordWithoutTmpPassword(): void
    {
        $password = PasswordGenerator::generateStrongPassword();
        $data = [
            'username' => $this->faker->email,
            'password' => $password,
            'confirmPassword' => $password
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['tmpPassword' => 'The tmp password field is required.']);
    }

    public function testCannotChangeTempPasswordWithInvalidValueTmpPassword(): void
    {
        $password = PasswordGenerator::generateStrongPassword();
        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => Str::random(8),
            'password' => $password,
            'confirmPassword' => $password
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['tmpPassword' => 'Invalid code.']);
    }

    public function testCannotChangeTempPasswordWithoutPassword(): void
    {
        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => Str::random(8),
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['password' => 'The password field is required.']);
    }

    public function testCannotChangeTempPasswordWithInvalidSizePassword(): void
    {
        $password = Str::random(7);

        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => Str::random(8),
            'password' => $password,
            'confirmPassword' => $password
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['password' => 'The password must be at least 8 characters.']);
    }

    public function testCannotChangeTempPasswordWithInvalidStringConfirmPassword(): void
    {
        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => Str::random(8),
            'password' => Str::random(8),
            'confirmPassword' => 1
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['confirmPassword' => 'The confirm password must be a string.']);
    }

    public function testCannotChangeTempPasswordWithoutConfirmPassword(): void
    {
        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => Str::random(8),
            'password' => Str::random(8),
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['confirmPassword' => 'The confirm password field is required.']);
    }

    public function testCannotChangeTempPasswordWithDifferentValueConfirmPassword(): void
    {
        $data = [
            'username' => $this->faker->email,
            'tmpPassword' => Str::random(8),
            'password' => Str::random(8),
            'confirmPassword' => Str::random(8),
        ];

        $response = $this->visitRoute($data);

        $response->assertJsonFragment(['confirmPassword' => 'The confirm password and password must match.']);
    }

    public function testCanChangeTempPasswordWithValidData(): void
    {
        $user = $this->createUser();
        $password = PasswordGenerator::generateStrongPassword();

        $userTmpCode = UserResetPasswordCode::factory()
            ->state(['username' => $user->username])
            ->create();

        $data = [
            'username' => $user->username,
            'tmpPassword' => $userTmpCode->code,
            'password' => $password,
            'confirmPassword' => $password,
        ];

        $response = $this->visitRoute($data);

        $response->assertOk();

        $user = $this->getUserByUsername($user->username);

        if (!Hash::check($password, $user->password)) {
            abort(500);
        }

        $this->assertDatabaseMissing(
            'user_reset_password_codes',
            [
                'username' => $user->username,
                'code' => $userTmpCode,
            ]
        );
    }
}
