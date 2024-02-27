<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Kuesioner1Resource\Pages;
use App\Filament\Resources\Kuesioner1Resource\RelationManagers;
use App\Models\Daerah;
use App\Models\Kuesioner1;
use Doctrine\DBAL\Schema\Schema;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Filament\Tables\Actions\HeaderActionsPosition;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;

use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Set;

use App\Filament\Resources\Closure;

class Kuesioner1Resource extends Resource
{
    protected static ?string $model = Kuesioner1::class;

    protected static ?string $navigationIcon = 'mdi-form-select';

    protected static ?string $navigationGroup = 'Form';

    protected static ?int $navigationSort = 0;

    protected static ?string $pluralModelLabel = 'Kuesioner Observasi';

    public static function getTotalCount(): int
{
    return Kuesioner1::count();
}

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
                        Select::make('daerah_id')
                            ->required()
                            ->label('Asal Daerah')
                            ->placeholder('-- Pilih Daerah --')  
                            ->relationship('daerah','nama')
                            ->native(false)
                            ->createOptionForm([
                                TextInput::make('nama')
                                    ->required()
                                    ->placeholder('Masukkan Asal Daerah Koresponden'),
                                TextInput::make('jarak')
                                    ->default(0)
                                    ->placeholder('Masukkan Jarak Daerah terhadap tempat Konservasi'),
                                TextInput::make('populasi')
                                    ->default(0)
                                    ->placeholder('Masukkan Jumlah Populasi di Daerah tersebut')
                            ]),

                            
                        Select::make('role_id')
        ->relationship('role','nama_role')
                            ->required()
                            ->label('Role Responden')
                            ->placeholder('-- Pilih Role --')  
                            ->native(false)
                            ->createOptionForm([
                                TextInput::make('nama_role')
                                    ->placeholder('Masukkan Role Koresponden')
                                    ->required(),
                            ]),

                            
                            
                    ])
                    ->columns(2),
                Section::make('Shortcut Button')
                    ->description('Jika Koresponden tidak mengetahui "..." maka klik button dibawah')
                    ->collapsed()
                    ->schema([
                        Actions::make([
                            Action::make('Yes')
                            ->label('Mengetahui')
                            ->icon('mdi-check-circle-outline')
                            ->color('success')
                            ->action(function (Set $set) {
                                $set('q1', 'Ya');
                                $set('q2', 'Ya');
                                $set('q3', 'Ya');
                                $set('q4', 'Ya');
                                $set('q5', 'Ya');
                                $set('q6', 'Ya');
                                $set('q7', 'Ya');
                                $set('q8', 'Ya');
                                $set('q9', 'Ya');
                                $set('q10', 'Ya');
                                $set('q11', 'Ya');
                                $set('q12', 'Ya');
                                $set('q13', 'Ya');
                                $set('q14', 'Ya');
                                $set('ket1', '');
                                $set('ket2', '');
                                $set('ket3', '');
                                $set('ket4', '');
                                $set('ket5', '');
                                $set('ket6', '');
                                $set('ket7', '');
                                $set('ket8', '');
                                $set('ket9', '');
                                $set('ket10', '');
                                $set('ket11', '');
                                $set('ket12', '');
                                $set('ket13', '');
                                $set('ket14', '');
                            }),
                        Action::make('No')
                            ->label('Tidak Mengetahui')
                            ->icon('mdi-alpha-x-circle-outline')
                            ->color('danger')
                            ->action(function (Set $set) {
                                $set('q1', 'Tidak');
                                $set('q2', 'Tidak');
                                    $set('q3', 'Tidak');
                                    $set('q4', 'Tidak');
                                    $set('q5', '');
                                    $set('q6', 'Tidak');
                                    $set('q7', '');
                                    $set('q8', 'Tidak');
                                    $set('q9', 'Tidak');
                                    $set('q10', 'Tidak');
                                    $set('q11', 'Tidak');
                                    $set('q12', 'Tidak');
                                    $set('q13', 'Tidak');
                                    $set('q14', 'Tidak');
                                    $set('ket1', 'NIHIL');
                                    $set('ket2', 'NIHIL');
                                    $set('ket3', 'NIHIL');
                                    $set('ket4', 'NIHIL');
                                    $set('ket5', 'NIHIL');
                                    $set('ket6', 'NIHIL');
                                    $set('ket7', 'NIHIL');
                                    $set('ket8', 'NIHIL');
                                    $set('ket9', 'NIHIL');
                                    $set('ket10', 'NIHIL');
                                    $set('ket11', 'NIHIL');
                                    $set('ket12', 'NIHIL');
                                    $set('ket13', 'NIHIL');
                                    $set('ket14', 'NIHIL');
                                }),
                           
                                
                        ]),
                    ])
                    ->columns(2),
                Section::make('Form A (Terbuka)')
                    ->description('')
                    ->collapsed()
                    ->schema([
                        Fieldset::make()
                            ->schema([
                                Radio::make('q1')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('1. Apakah mengetahui adanya lembaga konservasi penyu? '),
                                TextArea::make('ket1')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([

                                Radio::make('q2')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('2. Apakah mengetahui kapan lembaga konservasi didirikan? '),
                                TextArea::make('ket2')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),

                        Fieldset::make()
                            ->schema([
                                Radio::make('q3')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('3. Apakah mengetahui cakupan wilayah konservasi? '),
                                TextArea::make('ket3')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),

                        Fieldset::make()
                            ->schema([
                                Radio::make('q4')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('4. Pernahkah melihat/menyaksikan langsung kegiatan konservasi? '),
                                TextArea::make('ket4')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q5')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('5. Apakah mengetahui alasan didirikannya lembaga konservasi? '),
                                TextArea::make('ket5')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q6')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('6. Apakah mengetahui cara kerja lembaga konservasi? '),
                                TextArea::make('ket6')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q7')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('7. Apakah mengetahui lembaga konservasi lain? '),
                                TextArea::make('ket7')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                    ])
                    ->columns(1),


                Section::make('Form B (Terbuka)')
                    ->description('')
                    ->collapsed()
                    ->schema([

                        Fieldset::make()
                            ->schema([
                                Radio::make('q8')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('1. Apakah memiliki teman/keluarga yang terlibat kegiatan konservasi? '),
                                TextArea::make('ket8')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q9')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('2. Apakah pernah mendapat undangan kegiatan konservasi? '),
                                TextArea::make('ket9')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q10')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('3. Apakah pernah terlibat kegiatan konservasi? '),
                                TextArea::make('ket10')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q11')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('4. Apakah punya minat bergabung dalam kegiatan konservasi? '),
                                TextArea::make('ket11')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q12')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('5. Apakah mengetahui adanya kegiatan rutin konservasi? '),
                                TextArea::make('ket12')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q13')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('6. Apakah mengetahui waktu & lokasi diselenggarakan? '),
                                TextArea::make('ket13')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
                            ->schema([
                                Radio::make('q14')
                                    ->options([
                                        'Ya' => 'Ya',
                                        'Tidak' => 'Tidak',
                                    ])
                                    ->required()
                                    ->label('7. Apakah kegiatan konservasi berkesan? '),
                                TextArea::make('ket14')
                                    ->autosize()
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                    ])
                    ->columns(1),


                Section::make('Form C (Tertutup)')
                    ->description('')
                    ->collapsed()
                    ->schema([
                        Fieldset::make()
                            ->schema([

                                Radio::make('q15')
                                    ->options([
                                        '1' => '1. Sangat Negatif',
                                        '2' => '2. Negatif',
                                        '3' => '3. Netral',
                                        '4' => '4. Positif',
                                        '5' => '5. Sangat Positif',
                                    ])
                                    ->required()
                                    ->label('1. Apakah menyetujui keberadaan lembaga konservasi? '),
                                TextArea::make('ket15')
                                    ->rows(7)
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),
                        Fieldset::make()
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
                                    ->label('2. Apa tanggapan mengenai kegiatan konservasi yang telah diadakan? '),
                                TextArea::make('ket16')
                                    ->rows(7)
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),

                        Fieldset::make()
                            ->schema([

                                Radio::make('q17')
                                    ->options([
                                        '1' => '1. Sangat Negatif',
                                        '2' => '2. Negatif',
                                        '3' => '3. Netral',
                                        '4' => '4. Positif',
                                        '5' => '5. Sangat Positif',
                                    ])
                                    ->required()
                                    ->label('3. Seberapa efektif keterlibatan masyarakat sekitar? '),
                                TextArea::make('ket17')
                                    ->rows(7)
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),

                        Fieldset::make()
                            ->schema([

                                Radio::make('q18')
                                    ->options([
                                        '1' => '1. Sangat Negatif',
                                        '2' => '2. Negatif',
                                        '3' => '3. Netral',
                                        '4' => '4. Positif',
                                        '5' => '5. Sangat Positif',
                                    ])
                                    ->required()
                                    ->label('4. Adakah gangguan yang dialami selama ini terkait keberadaan lembaga konservasi? '),
                                TextArea::make('ket18')
                                    ->rows(7)
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),

                        Fieldset::make()
                            ->schema([

                                Radio::make('q19')
                                    ->options([
                                        '1' => '1. Sangat Negatif',
                                        '2' => '2. Negatif',
                                        '3' => '3. Netral',
                                        '4' => '4. Positif',
                                        '5' => '5. Sangat Positif',
                                    ])
                                    ->required()
                                    ->label('5. Apakah memiliki usulan atau harapan terhadap kegiatan konservasi? '),
                                TextArea::make('ket19')
                                    ->rows(7)
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),
                            ])
                            ->columns(2),

                        Fieldset::make()
                            ->schema([
                                Radio::make('q20')
                                    ->options([
                                        '1' => '1. Sangat Negatif',
                                        '2' => '2. Negatif',
                                        '3' => '3. Netral',
                                        '4' => '4. Positif',
                                        '5' => '5. Sangat Positif',
                                    ])
                                    ->required()
                                    ->label('6. Adakah keuntungan yang didapat selama ini terkait keberadaan lembaga konservasi? '),
                                TextArea::make('ket20')
                                    ->rows(7)
                                    ->label('Keterangan')
                                    ->placeholder('Keterangan'),

                            ])
                            ->columns(2),
                    ])
                    ->columns(1),

            ]);
    }

    


    public static function table(Table $table): Table
    {
        return $table
            // ->defaultGroup('role_id')
       
            ->groups([
                Group::make('role.nama_role')
                    ->titlePrefixedWithLabel(false)
                    ->label('Role')
                    ->collapsible(),
                Group::make('daerah.nama')
                    ->titlePrefixedWithLabel(false)
                    ->label('Daerah')
                    ->collapsible(),
                Group::make('created_at')
                    ->date()
                    ->label('Tanggal diinput ')
                    ->collapsible(),
    

            ])
            ->columns([
                TextColumn::make('No')
                    ->rowIndex(),
                TextColumn::make('nama')
                    ->label('Nama Responden')
                    ->searchable(),
                TextColumn::make('daerah.nama')
                    ->label('Daerah')
                    ->searchable(),
                TextColumn::make('role.nama_role')
                    ->badge()
                    // ->color(fn (string $state): string => match ($state) {
                    //     'Petugas' => 'success',
                    //     'Pengunjung' => 'danger',
                    //     'Masyarakat ' => 'primary',
                    // })
                    ->searchable()
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('role_id')
                    ->relationship('role','nama_role'),
                    SelectFilter::make('daerah_id')
                    ->relationship('daerah','nama')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActionsPosition(HeaderActionsPosition::Bottom)
            ->headerActions([
                ExportAction::make()
                    ->label('Excel')
                    ->icon('mdi-file-excel-outline')
                    ->color('success')
                    ->exports([
                        ExcelExport::make()
                            ->fromTable()
                    ]),
                ExportAction::make()
                ->exports([
                  ExcelExport::make()->withWriterType(\Maatwebsite\Excel\Excel::CSV),
                  ])
                    ->label('CSV')
                    ->icon('mdi-file-document-outline')
                    ->color('danger')
                    ->exports([
                        ExcelExport::make()
                            ->fromForm()
                    ])
                    
                    
                    

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
