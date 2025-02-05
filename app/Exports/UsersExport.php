<?php
  
namespace App\Exports;
    
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
    
class UsersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::select("id", "first_name", "last_name", "email", "phone_number", 'gender', 'created_at')->get();
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["ID", "First Name", "Last Name", "Email", "Phone Number", 'Gender', 'Added On'];
    }
}
