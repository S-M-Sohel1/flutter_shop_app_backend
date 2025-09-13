<?php

namespace App\Filament\Resources\Students\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('open_id'),
                TextInput::make('token')
                ->string(),
                TextInput::make('age')
                    ->required()
                    ->numeric(),
                TextInput::make('score')
                    ->required()
                    ->numeric(),
                TextInput::make('type')
                    ->required()
                    ->numeric(),
            ]);
    }
}
