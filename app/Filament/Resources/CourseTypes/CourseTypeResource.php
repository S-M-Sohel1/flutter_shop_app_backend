<?php

namespace App\Filament\Resources\CourseTypes;

use App\Filament\Clusters\Settings\SettingsCluster;
use App\Filament\Resources\CourseTypes\Pages\CreateCourseType;
use App\Filament\Resources\CourseTypes\Pages\EditCourseType;
use App\Filament\Resources\CourseTypes\Pages\ListCourseTypes;
use App\Filament\Resources\CourseTypes\Schemas\CourseTypeForm;
use App\Filament\Resources\CourseTypes\Tables\CourseTypesTable;
use App\Models\CourseType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CourseTypeResource extends Resource
{
    protected static ?string $model = CourseType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?int $navigationSort = 2;
    // protected static string | UnitEnum | null $navigationGroup = 'Course';


    // protected static ?string $navigationParentItem = 'Students';

    // protected static string | UnitEnum | null $navigationGroup = 'Settings';
     protected static string | UnitEnum | null $navigationGroup = 'Course';
    protected static ?string $recordTitleAttribute = 'Course Type';
    // protected static ?string $cluster = SettingsCluster::class;

    public static function form(Schema $schema): Schema
    {
        return CourseTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CourseTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCourseTypes::route('/'),
            'create' => CreateCourseType::route('/create'),
            'edit' => EditCourseType::route('/{record}/edit'),
        ];
    }
}
