<?php

namespace App\Filament\Resources\Courses\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Schemas\Schema;  

class CourseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('name'),
                ImageEntry::make('thumbnail')
                    ->disk('public')
                    ->imageHeight(100),
                TextEntry::make('video')
                    ->label('Video')
                    ->formatStateUsing(function ($state) {
                        if (!$state) return 'No video';
                        $videoUrl = asset('storage/' . $state);
                        return new \Illuminate\Support\HtmlString(
                            '<video width="320" height="240" controls preload="metadata">
                                <source src="' . $videoUrl . '" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>'
                        );
                    })
                    ->html(),
                TextEntry::make('type_id')
                    ->numeric(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('lesson_num')
                    ->numeric(),
                TextEntry::make('video_length')
                    ->numeric(),
                TextEntry::make('follow')
                    ->numeric(),
                TextEntry::make('score')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
