<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BasePage;
use Filament\Facades\Filament;

class Login extends BasePage
{
    public function loginAsSuperior1()
    {
        $this->loginAs('superior@temanapotek.id', 'password');
    }

    public function loginAsMinimalis1()
    {
        $this->loginAs('minimalis@temanapotek.id', 'password');
    }

    public function loginAsModern1()
    {
        $this->loginAs('modern@temanapotek.id', 'password');
    }

    private function loginAs($email, $password)
    {
        if (Filament::auth()->attempt(['email' => $email, 'password' => $password])) {
            session()->regenerate();
            return redirect()->intended(Filament::getUrl());
        } else {
            $this->addError('email', 'Login gagal, kredensial tidak valid.');
        }
    }
}
