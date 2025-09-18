<?php

namespace App\Filament\Resources\Courses\Schemas;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\Student;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

use function PHPUnit\Framework\isEmpty;

class CourseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_token')
                    ->label('Teacher')
                    ->searchable()
                    ->options(function () {
                        return Student::query()
                            
                            ->orderBy('name')
                            ->limit(10)
                            ->pluck('name', 'token')
                            ->toArray();
                    })
                    ->preload(),
                FileUpload::make('thumbnail')
                    ->required()
                    ->disk('public')
                    ->directory('course-thumbnails')
                    ->visibility('public'),
                FileUpload::make('video')
                    ->required()
                    ->disk('public')
                    ->maxSize(1024 * 50) // 50MB explicitly
                    ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mov', 'video/mkv'])
                    ->directory('course-videos')
                    ->visibility('public'),
                Textarea::make('description')
                    ->columnSpanFull(),
                Select::make('type_id')
                    ->label('Course Type')
                    ->options(CourseType::pluck('title', 'id'))  // Simple static options
                    ->searchable()
                    ->preload(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('lesson_num')
                    ->numeric(),
                TextInput::make('video_length')
                    ->numeric(),
                TextInput::make('follow')
                    ->numeric(),
                TextInput::make('score')
                    ->numeric(),
            ]);
    }
}
