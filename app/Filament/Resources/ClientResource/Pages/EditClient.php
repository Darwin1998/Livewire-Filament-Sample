<?php

namespace App\Filament\Resources\ClientResource\Pages;

use App\Filament\Resources\ClientResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Money\Money;
use Illuminate\Support\Str;
class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // $data['image'] = [\Illuminate\Support\Str::uuid() => 'storage/app/public'];
        $data['amount'] = $data['amount'] * 100;
        return $data;
    }
    protected function mutateFormDataBeforeFill(array $data): array
    {
        // $data['image'] = [\Illuminate\Support\Str::uuid() => 'storage/app/public'];
        $data['amount'] = $data['amount'] / 100;
        return $data;
       
    
    }    
  


}
