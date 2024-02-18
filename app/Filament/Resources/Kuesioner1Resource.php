<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Kuesioner1Resource\Pages;
use App\Filament\Resources\Kuesioner1Resource\RelationManagers;
use App\Models\Kuesioner1;
use Filament\Forms;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class Kuesioner1Resource extends Resource
{
    protected static ?string $model = Kuesioner1::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $pluralModelLabel = 'Kusioner 1';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Identitas')
                    ->description('')
                    ->collapsible()
                    ->schema([
                        TextInput::make('nama')
                            ->required()
                            ->placeholder('Masukkan Nama Responden !'),
                        Radio::make('role')
                            ->options([
                                'Petugas' => 'Petugas',
                                'Masyarakat' => 'Masyarakat',
                            ])
                            ->required()
                            ->inline()
                            ->inlineLabel(false),
                    ])
                    ->columns(1),
                Section::make('Form A')
                    ->description('')
                    ->collapsed()
                    ->schema([
                        Radio::make('q1')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui adanya lembaga konservasi penyu? '),
                        TextInput::make('ket1')
                            ->required()
                            ->label('Keterangan')
                            ->placeholder('Keterangan'),
                        Radio::make('q2')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui kapan lembaga konservasi didirikan? '),

                        Radio::make('q3')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui cakupan wilayah konservasi? '),

                        Radio::make('q4')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Pernahkah melihat/menyaksikan langsung kegiatan konservasi? '),

                        Radio::make('q5')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui alasan didirikannya lembaga konservasi? '),

                        Radio::make('q6')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui cara kerja lembaga konservasi? '),

                        Radio::make('q7')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui lembaga konservasi lain? '),
                    ])
                    ->columns(1),


                Section::make('Form B')
                    ->description('')
                    ->collapsed()
                    ->schema([

                        Radio::make('q8')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah memiliki teman/keluarga yang terlibat kegiatan konservasi? '),

                        Radio::make('q9')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah pernah mendapat undangan kegiatan konservasi? '),

                        Radio::make('q10')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah pernah terlibat kegiatan konservasi? '),

                        Radio::make('q11')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah punya minat bergabung dalam kegiatan konservasi? '),

                        Radio::make('q12')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui adanya kegiatan rutin konservasi? '),

                        Radio::make('q13')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah mengetahui waktu & lokasi diselenggarakan? '),

                        Radio::make('q14')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah kegiatan konservasi berkesan? '),

                        Radio::make('q15')
                            ->options([
                                'Ya' => 'Ya',
                                'Tidak' => 'Tidak',
                            ])
                            ->required()
                            ->label('Apakah menyetujui keberadaan lembaga konservasi? '),
                    ])
                    ->columns(1),
                Section::make('Form C')
                    ->description('')
                    ->collapsed()
                    ->schema([

                        Radio::make('q16')
                            ->options([
                                '1' => '1. Sangat Negatif',
                                '2' => '2. Negatif',
                                '3' => '3. Netral',
                                '4' => '4. Positif',
                                '5' => '5. Sangat Positif',
                            ])
                            ->required()

                            ->label('Apa tanggapan mengenai kegiatan konservasi yang telah diadakan? '),

                        Radio::make('q17')
                            ->options([
                                '1' => '1. Sangat Negatif',
                                '2' => '2. Negatif',
                                '3' => '3. Netral',
                                '4' => '4. Positif',
                                '5' => '5. Sangat Positif',
                            ])
                            ->required()
                            ->label('Seberapa efektif keterlibatan masyarakat sekitar? '),

                        Radio::make('q18')
                            ->options([
                                '1' => '1. Sangat Negatif',
                                '2' => '2. Negatif',
                                '3' => '3. Netral',
                                '4' => '4. Positif',
                                '5' => '5. Sangat Positif',
                            ])
                            ->required()
                            ->label('Adakah gangguan yang dialami selama ini terkait keberadaan lembaga konservasi? '),

                        Radio::make('q19')
                            ->options([
                                '1' => '1. Sangat Negatif',
                                '2' => '2. Negatif',
                                '3' => '3. Netral',
                                '4' => '4. Positif',
                                '5' => '5. Sangat Positif',
                            ])
                            ->required()
                            ->label('Apakah memiliki usulan atau harapan terhadap kegiatan konservasi? '),

                        Radio::make('q20')
                            ->options([
                                '1' => '1. Sangat Negatif',
                                '2' => '2. Negatif',
                                '3' => '3. Netral',
                                '4' => '4. Positif',
                                '5' => '5. Sangat Positif',
                            ])
                            ->required()
                            ->label('Adakah keuntungan yang didapat selama ini terkait keberadaan lembaga konservasi? '),
                    ])
                    ->columns(1),

                Textarea::make('ket1')
                    ->autosize()
                    ->label('Ketarangan')
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // ->defaultGroup('role')
            ->groups([
                Group::make('role')
                    ->titlePrefixedWithLabel(false)
                    ->label('Responden')
            ])
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                TextColumn::make('nama')
                    ->label('Nama Responden')
                    ->searchable(),
                TextColumn::make('role')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Petugas' => 'success',
                        'Masyarakat' => 'primary',
                    })
                    ->searchable()
                    ->alignCenter(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListKuesioner1s::route('/'),
            'create' => Pages\CreateKuesioner1::route('/create'),
            'edit' => Pages\EditKuesioner1::route('/{record}/edit'),
        ];
    }
}
