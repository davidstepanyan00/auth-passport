<?php

namespace App\Containers\AppSection\Auth\Models;

use App\Containers\AppSection\Auth\Data\Factories\UserFactory;
use App\Containers\AppSection\Auth\Dto\CreateUserDto;
use App\Containers\AppSection\Auth\Dto\UpdateUserDto;
use App\Containers\AppSection\Team\Models\Team;
use App\Containers\AppSection\Team\Models\UserTeam;
use App\Ship\Parents\Models\UserModel as ParentUserModel;
use App\Ship\Parents\Support\Facades\Hash;
use App\Ship\Parents\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * AppSection\Models\User
 *
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $displayName
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property string|null $email_verified_at
 */
class User extends ParentUserModel
{
    use HasRoles;
    use SoftDeletes;
    use Notifiable;

    protected $fillable = [
        'id',
        'username',
        'display_name',
        'password',
        'email_verified_at',
        'test',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $keyType = 'string';

    public static function createModel(CreateUserDto $dto): array
    {
        return [
            'id' => Str::uuid(),
            'username' => $dto->username,
            'password' => $dto->password ? Hash::make($dto->password) : null,
            'display_name' => $dto->displayName,
            'email_verified_at' => $dto->confirmationEmail ? Carbon::now() : NULL,
            'test' => $dto->test,
        ];
    }

    public static function updateUser(UpdateUserDto $dto): array
    {
        $data = [];

        if ($dto->password) {
            $data['password'] = Hash::make($dto->password);
        }

        $data['display_name'] = $dto->displayName;

        return $data;
    }

    public static function updatePassword(string $password): array
    {
        return [
          'password' => Hash::make($password),
        ];
    }

    public static function updateUserName(string $userName): array
    {
        return [
            'username' => $userName
        ];
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public static function newFactory(): UserFactory
    {
        return new UserFactory();
    }

    public function findForPassport($username): ?self
    {
        return User::where('username', $username)->first();
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(
            Team::class,
            'user_teams',
            'user_id',
            'team_id',
        );
    }

    public function teamId(): ?string
    {
        return $this->team()->first()->team_id;
    }

    public function team(): HasOne
    {
        return $this->hasOne(UserTeam::class, 'user_id', 'id');
    }

    public static function getTableName(): string
    {
        return 'users';
    }

    public function routeNotificationForMail(): string
    {
        return $this->username;
    }
}
