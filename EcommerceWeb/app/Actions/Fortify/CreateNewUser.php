<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Generate a unique user_id
        do {
            $user_id = random_int(1, PHP_INT_MAX);
        } while (User::find($user_id) !== null);

        $user = new User;
        $user->id = $user_id;
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->address = $input['address'] ?? null;
        $user->phone = $input['phone'] ?? null;
        $user->password = Hash::make($input['password']);

        $user->save();

        return $user;
    }
}