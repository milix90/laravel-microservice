<?php

namespace App\Repositories\User;

use App\Constants\AuthService;
use App\Entities\UserEntityAbstraction;
use App\Models\User;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class UserRepository extends BaseRepository implements UserRepositoryAbstraction
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param string $field
     * @param mixed $value
     * @return Model|null
     */
    public function retrieveUserByField(string $field, mixed $value): ?Model
    {
        return $this->model->query()->where($field, "=", $value)->first();
    }

    /**
     * @return Model|null
     */
    public function retrieveLoggedInUser(): ?Model
    {
        // the `auth(AuthService::SANCTUM)->user()` not used,
        // this is authentication instance

        $userId = auth(AuthService::SANCTUM)->id();
        return $this->model->query()->find($userId)->first();
    }

    /**
     * @param Model $model
     * @return void
     */
    public function modifyUserActiveStatus(Model $model): void
    {
        $model->active = !$model->active;
        $model->save();
    }

    /**
     * @return void
     */
    public function revokeLoggedInUserAuthTokens(): void
    {
        auth()->user()->tokens()->delete();
    }

    /**
     * @param Model $model
     * @param UserEntityAbstraction $ue
     * @return void
     */
    public function handleLoginAttemptCounter(Model $model, UserEntityAbstraction &$ue): void
    {
        if (!$model->active && Carbon::now()->diffInMinutes($model->updated_at) > AuthService::BLOCK_PERIOD) {
            $model->login_attempt = 0;
        } else {
            $model->login_attempt++;
        }

        $model->save();
        //increase the login attempt counter for user entity
        $ue->setLoginAttempt($model->login_attempt);
    }
}
