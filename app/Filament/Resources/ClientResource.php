<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers\FidelityPointRelationManager;
use App\Filament\Resources\ClientResource\RelationManagers\PointsHistoriesRelationManager;
use App\Models\Client;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use function Livewire\on;

class ClientResource extends Resource
{
    protected static ?string $model = Client::class;

    protected static ?string $slug = 'clients';

    protected static ?string $navigationGroup = "Client Management";

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('avatar')
                    ->columnSpanFull()
                    ->avatar()
                    ->alignCenter(),

                Placeholder::make('created_at')
                    ->label('Created Date')
                    ->content(fn(?Client $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Last Modified Date')
                    ->content(fn(?Client $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                Section::make('Personal information')
                    ->columns(2)
                    ->description('Client personal details')
                    ->schema([
                        TextInput::make('first_name')
                            ->required()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('first_name_slug', Str::slug($state))),

                        TextInput::make('first_name_slug')
                            ->required()
                            ->readOnly()
                            ->unique(ignoreRecord: true),

                        TextInput::make('last_name')
                            ->required()
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('last_name_slug', Str::slug($state))),

                        TextInput::make('last_name_slug')
                            ->required()
                            ->readOnly()
                            ->unique(ignoreRecord: true),
                    ])->collapsible(),

                Section::make('Contact information')
                    ->columns(2)
                    ->description('Client contact details')
                    ->schema([
                        TextInput::make('email')
                            ->required(),

                        TextInput::make('phone')
                            ->required(),

                    ])->collapsible(),

                Section::make('Date')
                    ->schema([
                        DatePicker::make('registration_date')
                            ->required(),

                    ])->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar'),

                TextColumn::make('first_name')
                    ->sortable()
                    ->limit(10)
                    ->copyable()
                    ->searchable(),

                TextColumn::make('last_name')
                    ->copyable()
                    ->sortable()
                    ->limit(10)
                    ->searchable(),


                TextColumn::make('email')
                    ->copyable()
                    ->limit(20)
                    ->searchable(),

                TextColumn::make('phone')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('registration_date')
                    ->copyable()
                    ->date(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ImageEntry::make('avatar')
                    ->label('')
                    ->columnSpanFull(),
                \Filament\Infolists\Components\Section::make('Personal information')
                    ->columns(2)
                    ->description('Client personal details')
                    ->schema([
                        TextEntry::make('first_name')
                            ->color('primary'),
                        TextEntry::make('last_name')
                            ->color('primary'),
                        ])->collapsed(),

                \Filament\Infolists\Components\Section::make('Contact information')
                    ->columns(2)
                    ->description('Client contact details')
                    ->schema([
                        TextEntry::make('email')
                            ->color('primary'),
                        TextEntry::make('phone')
                            ->color('primary'),
                    ])->collapsed(),
                TextEntry::make('registration_date')
                    ->color('primary'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['email'];
    }

    public static function getRelations(): array
    {
        return [
            PointsHistoriesRelationManager::class
        ];
    }
}
