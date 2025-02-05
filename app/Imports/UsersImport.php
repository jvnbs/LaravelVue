<?php
  
namespace App\Imports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Hash;
  
class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    protected $importCallback;

    public function __construct($importCallback)
    {
        $this->importCallback = $importCallback;
    }

    public function model(array $row)
    {
        if ($this->importCallback) {
            call_user_func($this->importCallback, $row);
        }
    }

  
    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            \Log::error("Failed row:", $failure->row());
        }
    }


}