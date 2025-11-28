<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SettingController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();
        $currentYear = date('Y');
        $totalRecords = \App\Models\Recipient::where('tahun', $currentYear)->count();
        
        return view('settings.index', compact('users', 'currentYear', 'totalRecords'));
    }
    
    public function archiveYear(Request $request)
    {
        $validated = $request->validate([
            'year' => 'required|integer|min:2000|max:' . (date('Y') + 10),
        ]);
        
        $year = $validated['year'];
        $currentYear = date('Y');
        
        if ($year >= $currentYear) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak boleh archive tahun semasa atau masa depan',
            ], 400);
        }
        
        // Data already archived by having tahun field
        // This is just a confirmation endpoint
        
        return response()->json([
            'success' => true,
            'message' => "Data tahun {$year} telah diarkibkan",
        ]);
    }
    
    public function newYear()
    {
        $currentYear = date('Y');
        $recordCount = \App\Models\Recipient::where('tahun', $currentYear)->count();
        
        return response()->json([
            'success' => true,
            'currentYear' => $currentYear,
            'recordCount' => $recordCount,
            'message' => "Sistem sudah ready untuk tahun {$currentYear}. Aset baru akan dikaitkan dengan tahun ini.",
        ]);
    }
    
    public function storeUser(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Pengguna berjaya ditambah',
                'user' => $user,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ralat menambah pengguna: ' . $e->getMessage(),
            ], 500);
        }
    }
    
    public function deleteUser(User $user)
    {
        try {
            // Prevent user from deleting themselves
            if ($user->id === auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Anda tidak boleh memadam akaun sendiri',
                ], 403);
            }
            
            $user->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Pengguna berjaya dipadam',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ralat memadam pengguna: ' . $e->getMessage(),
            ], 500);
        }
    }
}
