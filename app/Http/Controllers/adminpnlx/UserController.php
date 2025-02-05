<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Elibyy\TCPDF\Facades\TCPDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Jobs\UpdateUserStatusJob;
use App\Jobs\CreateUserJob;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $modelName = "User";
    protected $sectionName = "User";
    protected $sectionNamePlural = "Users";

    public function __construct(Request $request)
    {
        View::share('modelName', $this->modelName);
        View::share('sectionName', $this->sectionName);
        View::share('sectionNamePlural', $this->sectionNamePlural);
    }

    public function index(Request $request)
    {
        $query = User::query();
    
        $searchArray = $request->all();
    
        $gender = $request->gender;
        $status = $request->status;
        $searchTerm = $request->searchTerm;
    
        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }
    
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }
    
        if ($request->has('searchTerm')) {
            $searchTerm = $request->searchTerm;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('email', 'LIKE', "%$searchTerm%")
                    ->orWhere('phone', 'LIKE', "%$searchTerm%");
            });
        }
    
        $query->where('is_deleted', 0);
        $query->orderBy('id', 'DESC');
        $resultss = $query->get();
        session()->put('resultss', $resultss);
        $results = $query->paginate(10);
        // CreateUserJob::dispatch();

        // $users = User::get();
        // foreach ($users as $result) {
        //     UpdateUserStatusJob::dispatch($result);
        // }

        return view('adminpnlx.'.$this->modelName.'.index', compact('results', 'searchTerm', 'gender', 'status'));
    }
    
    public function create()
    {
        return view('adminpnlx.'.$this->modelName.'.add');
    }

   

    
    public function store(Request $request)
    {
        $formData = $request->all();
    
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'phone_number' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|max:12',
                'gender' => 'required',
            ],
            [
                'firstname.required' => 'The first name is required.',
                'firstname.string' => 'The first name must be a string.',
                'firstname.max' => 'The first name cannot exceed 255 characters.',
                'lastname.required' => 'The last name is required.',
                'lastname.string' => 'The last name must be a string.',
                'lastname.max' => 'The last name cannot exceed 255 characters.',
                'phone_number.required' => 'The phone number is required.',
                'phone_number.numeric' => 'The phone number must be numeric.',
                'phone_number.digits' => 'The phone number must be exactly 10 digits.',
                'email.required' => 'The email address is required.',
                'email.email' => 'The email address must be a valid email.',
                'email.unique' => 'The email address is already taken.',
                'password.required' => 'The password is required.',
                'password.string' => 'The password must be a string.',
                'password.min' => 'The password must be at least 8 characters.',
                'password.max' => 'The password cannot exceed 12 characters.',
                'gender.required' => 'The gender is required.',
            ]
        );
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        try {
            DB::beginTransaction();
            $user = new User();
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->name = ($request->firstname .' '. $request->lastname);
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->image = null;
            $user->description = $request->description;
            $user->save();
            DB::commit(); 
            return redirect()->route($this->modelName . '.index')->with('success', 'User has been created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
    
    
    public function show(string $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = User::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        return view('adminpnlx.'.$this->modelName.'.view', compact('modelDetail'));
    }

   
    public function edit(string $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = User::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        return view('adminpnlx.'.$this->modelName.'.edit', compact('modelDetail'));
    }

    public function update(Request $request, $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = User::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'phone_number' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users,email,' . $modelId, 
                'gender' => 'required',
                'description' => 'nullable|string|max:1000',
            ],
            [
                'firstname.required' => 'The first name is required.',
                'lastname.required' => 'The last name is required.',
                'phone_number.required' => 'The phone number is required.',
                'phone_number.numeric' => 'The phone number must be numeric.',
                'phone_number.digits' => 'The phone number must be exactly 10 digits.',
                'email.required' => 'The email address is required.',
                'email.email' => 'The email address must be valid.',
                'email.unique' => 'The email address is already taken.',
                'gender.required' => 'The gender is required.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $user                = $modelDetail;
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->name = ($request->firstname .' '. $request->lastname);
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->image = null;
            $user->description = $request->description;
            $user->save();
            DB::commit();
            return redirect()->route($this->modelName . '.index')->with('success', 'User has been updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating user: ' . $e->getMessage(), ['stack' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $modelId = base64_decode($id);
            $modelDetail = User::find($modelId);
            if (!$modelDetail) {
                DB::rollBack();
                return redirect()->back()->with('error', 'User not found. Try again.');
            }

            $modelDetail->delete();
            DB::commit();
            return redirect()->route($this->modelName.'.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Try again.');
        }
    }


    public function changeStatus($id, $status)
    {
        $modelId = base64_decode($id);
        $modelDetail = User::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'User not found. Try again.');
        }

        $modelDetail->is_active = $status == 1 ? 0 : 1;  // Update the correct variable
        $modelDetail->save();

        return redirect()->route($this->modelName.'.index')->with('success', 'User status has been updated successfully.');
    }


    public function generatePdf()
    {
        $users = User::get();
        $data = [
            'title' => 'प्रेरणा टेक्नोलॉजीज प्राइवेट लिमिटेड',
            'emoji' => "\u{1F600}",
            'date' => date('m/d/Y'),
            'users' => $users
        ];
        $pdf =  PDF::loadView('adminpnlx.'.$this->modelName.'.pdf-view', $data)
            ->setOption([
                'fontDir' => public_path('/fonts'),
                'fontCache' => public_path('/fonts'),
                'defaultFont' => 'Poppins'
            ]);
        return $pdf->download('users.pdf');
    }

    public function htmlPdf(Request $request)
    {
        $filename = 'html_demo.pdf';
        $data = [
            'title' => 'Generate PDF using Laravel TCPDF'
        ];
        $html = view()->make('adminpnlx.'.$this->modelName.'.pdfSample', $data)->render();
        $pdf = new TCPDF;
        $pdf::SetTitle('Html To Pdf Convert');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
        $pdf::Output(public_path($filename), 'F');
        return response()->download(public_path($filename));
    }



    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }



    public function import(Request $request) 
    {
        return view('adminpnlx.'.$this->modelName.'.import');
    }



    public function importSubmit(Request $request)
    {
        $formData = $request->all();

        $validator = Validator::make(
            $request->all(),
            [
                'file' => 'required|mimes:xlsx,csv,xls|max:10240',
            ],
            [
                'file.required' => 'The file is required.',
                'file.mimes' => 'The file must be a valid Excel or CSV file.',
                'file.max' => 'The file cannot exceed 10 MB.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $addedCount = 0;
            $skippedCount = 0;

            $import = new UsersImport(function ($row) use (&$addedCount, &$skippedCount) {
                if (\App\Models\User::where('email', $row['email'])->exists()) {
                    $skippedCount++;
                } else {
                    \App\Models\User::create([
                        'first_name' => $row['first_name'],
                        'last_name' => $row['last_name'],
                        'name' => ($row['first_name'] . $row['last_name']),
                        'email' => $row['email'],
                        'password' => bcrypt('System@123'),
                    ]);
                    $addedCount++;
                }
            });

            Excel::import($import, $request->file('file'));

            return redirect()->route($this->modelName.'.index')
                ->with('success', "{$addedCount} users added, {$skippedCount} existing emails skipped.");
        } else {
            return back()->withErrors(['file' => 'There was an issue with the uploaded file.'])->withInput();
        }
    }


    public function QrCode(Request $request)
        {
            $directory = public_path('qrcode');
            
            if (!is_dir($directory)) {
                mkdir($directory, 0775, true);
            }

            $filename = time() . '.png';
            $path = $directory . '/' . $filename;

            return QrCode::size(250)->generate('https://www.ptiwebtech.co.uk/crm/dashboard');
            // return QrCode::size(250)
            //          ->backgroundColor(255,55,0)
            //          ->generate('A simple example of QR code');


            // return QrCode::size(500)
            // ->email('hardik@itsolutionstuff.com', 'Welcome to ItSolutionStuff.com!', 'This is !.');

            // return QrCode::phoneNumber('111-222-6666');
            // QrCode::SMS('111-222-6666', 'Body of the message');
        }


}